<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class adminHeaderComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $userName = null;
        if(Auth::check() && Auth::user())
        {
            $userName = Auth::user()->name;
        }
        return view('components.admin-header-component',compact('userName'));
    }
}
