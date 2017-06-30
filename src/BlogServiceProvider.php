<?php

namespace Kntpva\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'Blog');
        include __DIR__ . '/routes.php';
        $this->publishes([
            __DIR__.'/Migrations' => database_path('migrations')
        ], 'migrations');
//        View::addNamespace('blog', __DIR__.'/../../views');

        $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];
        $kernel->pushMiddleware('Illuminate\Session\Middleware\StartSession::class');

    }
}