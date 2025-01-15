<?php
namespace App\Repositories\Interfaces;

use App\Models\Like;

interface LikeRepositoryInterface
{
    public function toggleLike($likeableType, $likeableId, $userId): Like;
    public function getLikesCount($likeableType, $likeableId): int;
}
