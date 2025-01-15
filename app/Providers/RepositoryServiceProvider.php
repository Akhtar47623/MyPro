<?php

namespace App\Providers;

use App\Repositories\Interfaces\LikeRepositoryInterface;
use App\Repositories\DatabaseLayer\BlogRepository;
use App\Repositories\DatabaseLayer\CategoryRepository;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\DatabaseLayer\UserRepository;
use App\Repositories\DatabaseLayer\PermissionRepository;
use App\Repositories\DatabaseLayer\RoleRepository;
use App\Repositories\DatabaseLayer\CommentRepository;
use App\Repositories\DatabaseLayer\LikeRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(LikeRepositoryInterface::class, LikeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
