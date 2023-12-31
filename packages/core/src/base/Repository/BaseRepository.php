<?php

namespace QH\Core\Base\Repository;

abstract class BaseRepository implements RepositoryInterface
{
    //model muốn tương tác
    protected $model;

    //khởi tạo
    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->orderByDesc('id')->get();
    }
    public function getAllA()
    {
        return $this->model->get();
    }
    public function getActive(){
        return $this->model->where('status','active')->get();
    }
    public function getActiveP($n = 5){
        return $this->model->where('status','active')->paginate($n);
    }

    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function findBySlug($slug)
    {
        $result = $this->model->where('slug', $slug)->first();

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }


    public function update($model, $attributes = [])
    {
        $result = $this->find($model->id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($model)
    {
        $result = $this->find($model->id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }


}
