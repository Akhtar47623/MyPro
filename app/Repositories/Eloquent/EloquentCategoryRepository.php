<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Str;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function findCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    public function createCategory(array $data)
    {
        dd('here');
        $slug = Str::slug($data['name'], '-');
        if (Category::where('slug', $slug)->exists()) {
            $slug = $this->generateUniqueSlug($slug);
        }
        $data['slug'] = $slug;
        return Category::create($data);
    }

    public function updateCategory($id, array $data)
    {
        $category = $this->findCategoryById($id);
        $category->update($data);
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);
        return $category->delete();
    }

    private function generateUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;

        // Keep appending a number until a unique slug is found
        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
