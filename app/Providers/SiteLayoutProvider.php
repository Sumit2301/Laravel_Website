<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\State;
use App\Course;

class SiteLayoutProvider extends ServiceProvider
{
    public $layout_states;
    public $layout_courses;

    public function register()
    {
        //
    }

    public function boot()
    {
        $this->layout_states   = State::get();
        $this->layout_courses   = Course::get();
        
        view()->composer('layouts.site', function($view) {
            $view->with(['states' => $this->layout_states, 'courses' => $this->layout_courses]);
        });
    }
}