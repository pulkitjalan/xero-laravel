<?php

namespace PulkitJalan\Xero;

use Illuminate\Support\ServiceProvider;
use XeroPHP\Application\PartnerApplication;
use XeroPHP\Application\PrivateApplication;
use XeroPHP\Application\PublicApplication;

class XeroServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['XeroPrivate'] = function ($app) {
            return $app[PrivateApplication::class];
        };

        $this->app['XeroPublic'] = function ($app) {
            return $app[PublicApplication::class];
        };

        $this->app['XeroPartner'] = function ($app) {
            return $app[PartnerApplication::class];
        };

        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('xero.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'xero');

        $this->app->singleton(PrivateApplication::class, function ($app) {
            return new PrivateApplication($app['config']['xero']);
        });

        $this->app->singleton(PublicApplication::class, function ($app) {
            return new PublicApplication($app['config']['xero']);
        });

        $this->app->singleton(PartnerApplication::class, function ($app) {
            return new PartnerApplication($app['config']['xero']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            PrivateApplication::class,
            PublicApplication::class,
            PartnerApplication::class,
            'XeroPrivate',
            'XeroPublic',
            'XeroPartner',
        ];
    }
}