<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->integer('total_qty');
            $table->integer('shipping_cost')->default(0);
            $table->integer('total_amount');
            $table->longText('note')->nullable();
            $table->enum('status',['pending','finished'])->default('pending');
            $table->date('sale_date')->default(DB::raw('(CURRENT_DATE)'));
            $table->timestamps();
            $table->foreign("customer_id")->references("id")->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
