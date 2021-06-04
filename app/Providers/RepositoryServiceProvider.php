<?php

namespace App\Providers;
use App\Repositories\ProductRepositoryInterface; 
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\Eloquent\CategoryRepository; 
use App\Repositories\Eloquent\ProductRepository; 
use App\Repositories\EloquentRepositoryInterface; 
use App\Repositories\UserRepositoryInterface; 
use App\Repositories\Eloquent\UserRepository; 
use App\Repositories\Eloquent\BaseRepository; 
use Illuminate\Support\ServiceProvider; 
use App\Repositories\BrandRepositoryInterface; 
use App\Repositories\Eloquent\BrandRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
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
