<?php
namespace App\Repositories\DatabaseLayer;

use App\Models\Like;
use App\Repositories\Interfaces\LikeRepositoryInterface;

class LikeRepository implements LikeRepositoryInterface
{
    public function toggleLike($likeableType, $likeableId, $userId): Like
    {
        $existingLike = Like::where('likeable_type', $likeableType)
            ->where('likeable_id', $likeableId)
            ->where('user_id', $userId)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            return null;
        }

        return Like::create([
            'likeable_type' => $likeableType,
            'likeable_id' => $likeableId,
            'user_id' => $userId,
        ]);
    }

    public function getLikesCount($likeableType, $likeableId): int
    {
        return Like::where('likeable_type', $likeableType)
            ->where('likeable_id', $likeableId)
            ->count();
    }
}
