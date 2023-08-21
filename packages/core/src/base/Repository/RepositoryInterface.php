<?php

namespace QH\Core\Base\Repository;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);
    /**
     * Get one
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = []);

    /**
     * Update
     * @param $slug
     * @param array $attributes
     * @return mixed
     */
    public function update($slug, $attributes = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($slug);


}
