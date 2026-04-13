<?php

namespace App\View\Components;

use App\Models\CarType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarTypeSelector extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct( public string|bool $type=false)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $carTypes = CarType::get();
        if($this->type){
            return view('components.radio-selector',[
                "items"=> $carTypes,
                "name"=>"car_type_id",
                "title" => "Car Type"
            ]);
        }
        return view('components.selector',[
            "items"=> $carTypes,
            "name"=>"car_type_id",
            "placeholder" => "Car Type"
        ]);
    }
}
