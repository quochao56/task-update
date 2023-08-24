<?php

namespace App\Jobs;

use App\Mail\OrderMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $sale;
    /**
     * Create a new job instance.
     */
    public function __construct($sale)
    {
        $this->sale = $sale;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $recipientEmail = $this->sale->customer->email;

        if (!empty($recipientEmail)) {
            \Log::info('Recipient Email:', ['email' => $recipientEmail]);
            Mail::to($recipientEmail)->send(new OrderMail($this->sale));
        } else {
            \Log::error('Recipient Email is empty or null.');
        }
    }
}
