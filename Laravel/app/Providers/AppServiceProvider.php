<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Auth\AuthDaoInterface', 'App\Dao\Auth\AuthDao');
        $this->app->bind('App\Contracts\Dao\Post\PostDaoInterface', 'App\Dao\Post\PostDao');
        $this->app->bind('App\Contracts\Dao\Categories\CategoriesDaoInterface', 'App\Dao\Categories\CategoriesDao');
        $this->app->bind('App\Contracts\Dao\User\UserDaoInterface', 'App\Dao\User\UserDao');
        $this->app->bind('App\Contracts\Dao\Feedback\FeedbackDaoInterface', 'App\Dao\Feedback\FeedbackDao');
        $this->app->bind('App\Contracts\Dao\Vote\VoteDaoInterface', 'App\Dao\Vote\VoteDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Auth\AuthServiceInterface', 'App\Services\Auth\AuthService');
        $this->app->bind('App\Contracts\Services\Post\PostServiceInterface', 'App\Services\Post\PostService');
        $this->app->bind('App\Contracts\Services\Categories\CategoriesServiceInterface', 'App\Services\Categories\CategoriesService');
        $this->app->bind('App\Contracts\Services\User\UserServiceInterface', 'App\Services\User\UserService');
        $this->app->bind('App\Contracts\Services\Feedback\FeedbackServiceInterface', 'App\Services\Feedback\FeedbackService');
        $this->app->bind('App\Contracts\Services\Vote\VoteServiceInterface', 'App\Services\Vote\VoteService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
