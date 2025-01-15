<?php
namespace App\Repositories\Interfaces;

use App\Models\Comment;

interface CommentRepositoryInterface
{
    public function getCommentsByBlog($blogId);
    public function store(array $data): Comment;
    public function reply(array $data): Comment;
}
