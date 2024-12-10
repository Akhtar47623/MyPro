<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class BlogController extends Controller
{
    protected $blogRepository;
    protected $categoriesRepository;

    public function __construct(BlogRepositoryInterface $blogRepository,CategoryRepositoryInterface $categoriesRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index()
    {
        $blogs = $this->blogRepository->getAllBlogs();
        return view('admin.Blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = $this->blogRepository->getBlogById($id);
        return view('admin.Blogs.view', compact('blog'));
    }

    public function create()
    {
        $categories = $this->categoriesRepository->getAllCategories();
        return view('admin.Blogs.create',compact('categories'));

    }

    public function store(BlogStoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['path'] = uploadImage($request, 'image');
        };
        $this->blogRepository->createBlog($data);
        alert()->success('Blog created successfully!')->persistent('Close')->autoClose(1000);
        return redirect()->route('blogs.index');
    }


    public function edit($id)
    {
        $blog = $this->blogRepository->getBlogById($id);
        $categories=$this->categoriesRepository->getAllCategories();
        return view('admin.Blogs.edit', compact('blog', 'categories'));
    }

    public function update(BlogUpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['path'] = uploadImage($request, 'image');
        };
        $this->blogRepository->updateBlog($id, $data);
        alert()->success('Blog Updated successfully!')->persistent('Close')->autoClose(1000);
        return redirect()->route('blogs.index');
    }

    public function destroy($id)
    {
        $this->blogRepository->deleteBlog($id);
        alert()->error('Blog has been Deleted!')->persistent('Close')->autoClose(2000);
        return redirect()->route('blogs.index');
    }
}
