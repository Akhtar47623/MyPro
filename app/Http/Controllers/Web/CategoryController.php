<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        // $categories = $this->categoryRepository->getAllCategories();
        return view('admin.Categories.index');
    }

    public function create()
    {
        return view('admin.Categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->categoryRepository->createCategory($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->findCategoryById($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->categoryRepository->updateCategory($id, $data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $this->categoryRepository->deleteCategory($id);

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
