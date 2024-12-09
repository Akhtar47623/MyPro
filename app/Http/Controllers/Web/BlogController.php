<?php
namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        // $blogs = $this->blogRepository->getAllBlogs();
        return view('admin.Blogs.index');
    }

    public function show($id)
    {
        $blog = $this->blogRepository->getBlogById($id);
        return view('blogs.show', compact('blog'));
    }

    public function create()
    {
        $categories = $this->blogRepository->getAllCategories();
        return view('admin.Blogs.create',compact('categories'));

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'auther' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);
        $data['user_id'] = auth()->user()->id;
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $data['path'] = $imagePath; // Add image path to the data array
        }

        // Save blog via repository
        $this->blogRepository->createBlog($data);

        // Redirect to the blog index with success message
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }


    public function edit($id)
    {
        $blog = $this->blogRepository->getBlogById($id);
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $this->blogRepository->updateBlog($id, $data);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy($id)
    {
        $this->blogRepository->deleteBlog($id);

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }
}
