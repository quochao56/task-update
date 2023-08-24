<?php

namespace QH\Warehouse\Repositories\History\Elements;

use QH\Core\Base\Repository\BaseRepository;
use QH\Warehouse\Models\History\History;
use QH\Warehouse\Repositories\History\Interfaces\HistoryRepositoryInterface;

class HistoryRepository extends BaseRepository implements HistoryRepositoryInterface
{


    public function getModel()
    {
        return History::class;
    }

    public function getAllHistories()
    {
        return $this->model->orderByDesc('created_at')->paginate(5);
    }
}
