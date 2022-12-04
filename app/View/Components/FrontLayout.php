<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\Component;

class FrontLayout extends Component
{
    public $title;
    public $settings;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null)
    {
        $settings = Setting::get();
        foreach($settings as $setting){
            $this->settings = $setting;

        }
        $this->title = $title ?? config('app.name');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.front');
    }
}
