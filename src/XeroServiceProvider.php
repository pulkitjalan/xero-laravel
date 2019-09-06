<?php

namespace PulkitJalan\Xero;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use XeroPHP\Application\PublicApplication;
use XeroPHP\Application\PartnerApplication;
use XeroPHP\Application\PrivateApplication;
use Illuminate\Contracts\Support\DeferrableProvider;

class XeroServiceProvider extends ServiceProvider implements DeferrableProvider
{
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
            return new PrivateApplication(Arr::get($app['config'], 'xero'));
        });

        $this->app->singleton(PublicApplication::class, function ($app) {
            return new PublicApplication(Arr::get($app['config'], 'xero'));
        });

        $this->app->singleton(PartnerApplication::class, function ($app) {
            return new PartnerApplication(Arr::get($app['config'], 'xero'));
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
