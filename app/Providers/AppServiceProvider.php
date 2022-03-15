<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\TagContract;
use App\Contracts\Repositories\TagRepository;
use App\Contracts\Services\UserContract;
use App\Contracts\Repositories\UserRepository;
use App\Services\TagService;
use App\Services\UserService;
use App\Repositories\TagRepositoryEloquent;
use App\Repositories\UserRepositoryEloquent;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserContract::class, UserService::class);
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);

        $this->app->bind(TagContract::class, TagService::class);
        $this->app->bind(TagRepository::class, TagRepositoryEloquent::class);
    }
}
