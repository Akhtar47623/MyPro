<?php
namespace App\Repositories\DatabaseLayer;

use App\Models\Comment;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    public function getCommentsByBlog($blogId)
    {
        return Comment::where('blog_id', $blogId)
            ->whereNull('parent_id')
            ->with(['replies', 'likes', 'user'])
            ->latest()
            ->get();
    }

    public function store(array $data): Comment
    {
        return Comment::create($data);
    }

    public function reply(array $data): Comment
    {
        return Comment::create($data);
    }
}
