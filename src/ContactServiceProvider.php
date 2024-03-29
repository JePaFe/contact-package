<?php


namespace JePaFe\Contact;


use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'contact');
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/contact'),
        ], 'contact-views');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->mergeConfigFrom(__DIR__ . '/../config/contact.php', 'contact');
        $this->publishes([
            __DIR__ . '/../config/contact.php' => config_path('contact.php'),
        ], 'contact-config');
    }

    public function register()
    {

    }
}
