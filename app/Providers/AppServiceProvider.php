<?php

namespace RW940cms\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use DB;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {

        $agora = Carbon::now('-3:00');
        date_default_timezone_set('America/Sao_Paulo');
        setlocale(LC_TIME, 'pt-br');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
   
}
