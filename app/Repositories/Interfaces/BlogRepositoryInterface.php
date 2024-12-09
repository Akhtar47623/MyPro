<?php
namespace App\Repositories\Interfaces;

interface BlogRepositoryInterface
{
    public function getAllBlogs();            // Retrieve all blogs
    public function getBlogById($id);         // Retrieve a single blog by its ID
    public function createBlog(array $data);  // Create a new blog
    public function updateBlog($id, array $data); // Update an existing blog
    public function deleteBlog($id);          // Delete a blog
}
