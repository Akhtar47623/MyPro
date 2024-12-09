<?php
namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class EloquentBlogRepository implements BlogRepositoryInterface
{
    protected $categoryRepository;

    // Inject CategoryRepositoryInterface into BlogRepository
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function getAllBlogs()
    {
        return Blog::with('category', 'author')->latest()->get();
    }

    public function getBlogById($id)
    {
        return Blog::with('category', 'comments')->findOrFail($id);
    }

    public function createBlog(array $data)
    {

        return Blog::create($data);
    }

    public function updateBlog($id, array $data)
    {
        $blog = Blog::findOrFail($id);
        $blog->update($data);
        return $blog;
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return true;
    }
    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }
}
