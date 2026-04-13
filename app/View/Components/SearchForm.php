<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use App\Models\Maker;

class SearchForm extends Component
{
    public function render()
    {
        return view('components.home.search-form', [
            'makers' => Maker::all()
        ]);
    }
}
