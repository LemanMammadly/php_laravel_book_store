<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\SubCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class FrontHeaderComponent extends Component
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
        $categories = Category::all();
        $username = null;
        if(Auth::user())
        {
            $username = Auth::user()->name;
        }
        return view('components.front-header-component',compact('categories','username'));
    }
}
