<?php
namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Events;
use Calendar;

use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
   

   View::composer('', function ($view) {
    $events = Events::get();
    $event_list = [];
    foreach ($events as $key => $event){
        $event_list[] = Calendar::event(
            $event->event_name,
            true,
            new \DateTime($event->start_date),
            new \DateTime($event->end_date)
        );
    }

    $view->with('calendar_details', Calendar::addEvents($event_list));
});

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
