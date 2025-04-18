<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
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
        // ログイン画面
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // 会員登録（STEP1）
        Fortify::registerView(function () {
            return view('auth.register.step1');
        });
    }
}
