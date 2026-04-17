<?php

namespace App\View\Components;

use App\Models\Model;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModelSelector extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $models = Model::get();
        return view('components.selector', [
            "items"=> $models,
            "name"=>"model_id",
            "placeholder" => "Model"
        ]);
    }
}
