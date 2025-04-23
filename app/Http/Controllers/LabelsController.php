<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = Label::select('id', 'name')->get();

        return view('labels.index', ['labels' => $labels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('labels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|min:3',
        ]);

        $label = new Label();
        $label->name = $validatedData['name'];
        $label->save();

        return redirect('/labels')->with('success', 'Das Label <b>&quot;' . $label->name . '&quot;</b> wurde erfolgreich gespeichert.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $label = Label::findOrFail($id);
        $songs = DB::table('songs')->select('id','title','band','labels_id_ref','created_at','updated_at')->where('labels_id_ref', '=', $id)->get();

        if($songs->isEmpty()) $songs = NULL;

        return view('labels.show', [
            'label' => $label,
            'songs' => $songs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $label = Label::findOrFail($id);

        return view('labels.edit', ['label' => $label]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $label = Label::find($id);

        $validatedData = $request->validate([
            'name' => 'required|min:3',
        ]);

        $label->name = $validatedData['name'];

        $label->save();

        return redirect('/labels')->with('success', 'Das Label <b>&quot;' . $label->name . '&quot;</b> wurde erfolgreich gespeichert.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {

        // $label = Label::find($id);
        // Check if the label is used in any songs
        if ($label->songs()->count() > 0) {
            // If it is, do not delete the label and return an error message
            return redirect('labels')->with('error', 'Das Label <b>&quot;' . $label->name . '&quot;</b> kann nicht gelöscht werden, da noch Songs zugeordnet sind.');
        }
        
        // Delete the label 
        $label->delete();
        return redirect('labels')->with('success', 'Das Label <b>&quot;' . $label->name . '&quot;</b> wurde gelöscht.');
    }
}
