<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\LikeRepositoryInterface;

class CommentController extends Controller
{
    protected $commentRepository;
    protected $likeRepository;

    public function __construct(
        CommentRepositoryInterface $commentRepository,
        LikeRepositoryInterface $likeRepository
    ) {
        $this->commentRepository = $commentRepository;
        $this->likeRepository = $likeRepository;
    }

    // Add a comment
    public function store(Request $request)
    {

        $request->validate([
            'content' => 'required|string|max:500',
            'blog_id' => 'required|exists:blogs,id',
        ]);

        $this->commentRepository->store([
            'content' => $request->content,
            'blog_id' => $request->blog_id,
            'user_id' => auth()->id(),
        ]);

        return response()->json(['success' => true, 'message' => 'Comment added successfully!']);
    }

    // Add a reply
    public function reply(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'blog_id' => 'required|exists:blogs,id',
            'parent_id' => 'required|exists:comments,id',
        ]);

        $this->commentRepository->reply([
            'content' => $request->content,
            'blog_id' => $request->blog_id,
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
        ]);

        return back()->with('success', 'Reply added successfully!');
    }

    // Like or Unlike a comment
    public function like(Request $request, $commentId)
    {
        $this->likeRepository->toggleLike(Comment::class, $commentId, auth()->id());

        return response()->json(['success' => true]);
    }
}
