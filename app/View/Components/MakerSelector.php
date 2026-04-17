<?php

namespace App\View\Components;

use App\Models\Maker;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MakerSelector extends Component
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
        $makers = Maker::get();
        return view('components.selector',[
            "items" => $makers,
            "name" => "maker_id",
            "placeholder" => "Maker"
        ]);
    }
}
