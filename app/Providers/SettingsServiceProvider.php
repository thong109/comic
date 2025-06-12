<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        try {
            $data = Cache::remember('home_api', 3600, function () {
                $response = Http::get('https://otruyenapi.com/v1/api/the-loai');

                if ($response->successful()) {
                    return $response->json();
                }

                return []; // fallback nếu không thành công
            });

            View::share('settings', $data);
        } catch (\Exception $e) {
            View::share('settings', []); // fallback nếu có lỗi
        }
    }
}
