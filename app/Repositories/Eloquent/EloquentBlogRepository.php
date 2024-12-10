<?php
namespace App\Repositories\Eloquent;

use App\Models\Blog;
use Illuminate\Support\Str;
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
        $slug = Str::slug($data['title'], '-');
        if (Blog::where('slug', $slug)->exists()) {
            $slug = $this->generateUniqueSlug($slug);
        }
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = $slug;
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
    private function generateUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;

        // Keep appending a number until a unique slug is found
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
