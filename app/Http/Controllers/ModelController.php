<?php

namespace App\Http\Controllers;


use App\Models\Maker;
use App\Models\Model;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    /**
     * Display a listing of models
     */
    public function index()
    {
        $models = Model::with('maker')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('models.index', compact('models'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $makers = Maker::orderBy('name')->get();

        return view('models.create', compact('makers'));
    }

    /**
     * Store new model
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'maker_id' => ['required', 'exists:makers,id'],
            'year' => ['nullable', 'integer', 'min:1900', 'max:' . date('Y')],
        ]);

        Model::create($validated);

        return redirect()
            ->route('models.index')
            ->with('success', 'Model created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit(Model $model)
    {
        $makers = Maker::orderBy('name')->get();

        return view('models.edit', compact('model', 'makers'));
    }

    /**
     * Update model
     */
    public function update(Request $request, Model $model)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'maker_id' => ['required', 'exists:makers,id'],
            'year' => ['nullable', 'integer', 'min:1900', 'max:' . date('Y')],
        ]);

        $model->update($validated);

        return redirect()
            ->route('models.index')
            ->with('success', 'Model updated successfully.');
    }

    /**
     * Delete model
     */
    public function destroy(Model $model)
    {
        // delete all cars under this model
        $model->cars()->delete();

        // delete model
        $model->delete();

        return redirect()
            ->route('models.index')
            ->with('success', 'Model and all related cars deleted successfully.');
    }
}
