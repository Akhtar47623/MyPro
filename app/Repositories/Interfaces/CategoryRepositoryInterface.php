<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function getAllCategories();

    public function findCategoryById($id);

    public function createCategory(array $data);

    public function updateCategory($id, array $data);

    public function deleteCategory($id);
}
