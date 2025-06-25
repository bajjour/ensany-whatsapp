<?php
namespace EnsanyWhatsapp;

use Illuminate\Support\ServiceProvider;
use EnsanyWhatsapp\Services\WhatsappService;

class EnsanyWhatsappServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(WhatsappService::class, function ($app) {
            return new WhatsappService(
                config('ensany-whatsapp.api-key'),
                config('ensany-whatsapp.device-id')
            );
        });

        $this->mergeConfigFrom(__DIR__.'/../config/ensany-whatsapp.php', 'ensany-whatsapp');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/ensany-whatsapp.php' => config_path('ensany-whatsapp.php'),
        ], 'ensany-whatsapp-config');
    }
}
