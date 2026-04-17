<?php

namespace App\View\Components;

use App\Models\FuelType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FuelTypeSelector extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string|bool $type=false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $fuelTypes = FuelType::get();
        if($this->type){
            return view('components.radio-selector',[
                "items"=> $fuelTypes,
                "name"=>"fuel_type_id",
                "title" => "Fuel Type"
            ]);
        }
        return view('components.selector',
    [
            "items" => $fuelTypes,
            "name" => "fuel_type_id",
            "placeholder" => "Fuel Type"
    ]);
    }
}
