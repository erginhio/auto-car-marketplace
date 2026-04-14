<?php

namespace App\Http\Controllers;

use App\Models\Maker;
use Illuminate\Http\Request;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $makers = Maker::paginate(12);

        return view('makers.index', compact('makers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('makers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:makers,name',
        ]);

        Maker::create($validated);

        return redirect()
            ->route('makers.index')
            ->with('success', 'Maker created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maker $maker)
    {
        return view('makers.show', compact('maker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maker $maker)
    {
        return view('makers.edit', compact('maker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maker $maker)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:makers,name,' . $maker->id,
        ]);

        $maker->update($validated);

        return redirect()
            ->route('makers.index')
            ->with('success', 'Maker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maker $maker)
    {
        // delete all cars under each model
        foreach ($maker->models as $model) {
            $model->cars()->delete();
        }

        // delete all models
        $maker->models()->delete();

        // delete maker
        $maker->delete();

        return redirect()
            ->route('makers.index')
            ->with('success', 'Maker, models, and cars deleted successfully.');
    }
}
