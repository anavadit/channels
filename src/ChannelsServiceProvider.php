<?php

namespace Rina\Channels;

use Illuminate\Support\ServiceProvider;

class ChannelsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['router']->group(['middleware' => 'web'], function() {
            $this->app['router']->post('channels/save', '\Rina\Channels\ChannelsController@save')->middleware('auth');
        });
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('channels', function($app)
        {
            return new Channels();
        });
    }
}
