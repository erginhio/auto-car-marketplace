<?php

namespace App\View\Components;

use App\Models\State;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StateSelector extends Component
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
        $states = State::get();
        return view('components.selector',[
            "items"=>$states,
            "name"=>"state_id", 
            "placeholder"=>"State/Region"
        ]);
    }
}
