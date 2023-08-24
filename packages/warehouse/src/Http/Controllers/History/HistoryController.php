<?php

namespace QH\Warehouse\Http\Controllers\History;

use App\Http\Controllers\Controller;
use QH\Warehouse\Repositories\History\Interfaces\HistoryRepositoryInterface;

class HistoryController extends Controller
{
    protected $historyRepo;

    public function __construct(HistoryRepositoryInterface $historyRepository)
    {
        $this->historyRepo = $historyRepository;
    }

    public function index()
    {
        return view('admin.warehouse.history.index', [
            'title' => 'Histories',
            'histories' => $this->historyRepo->getAllHistories()
        ]);
    }
}
