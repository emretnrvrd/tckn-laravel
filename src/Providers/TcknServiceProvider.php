<?php

namespace Emretnrvrd\TcknLaravel\Providers;

use Illuminate\Support\ServiceProvider;

class TcknServiceProvider extends ServiceProvider
{
    protected array $rules = [
        'Emretnrvrd\TcknLaravel\Rules\TcknValidationRule',
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Lang', 'tckn-laravel');

        $this->publishes([
            __DIR__.'/../Config/tckn.php' => config_path('tckn.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../Lang' => $this->app->langPath('vendor/tckn-laravel'),
        ], 'lang');
        
        $this->registerRules();
    }

    /**
     * Register custom rules to Validator.
     *
     * @return void
     */
    public function registerRules()
    {
        foreach($this->rules as $rule) {
            $ruleInstance = new $rule;
            $this->app['validator']->extend(
                $ruleInstance->alias,
                fn() => $ruleInstance->passes(...func_get_args()),
                $ruleInstance->message()
            );
        }
    }
}
