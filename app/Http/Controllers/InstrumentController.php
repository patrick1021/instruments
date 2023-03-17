<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instrument;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruments = Instrument::orderBy('name')->get();
        return view('instruments.index', compact('instruments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instruments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $instrument = new Instrument();
        $instrument->name = $request->input('name');
        $instrument->type = $request->input('type');
        $instrument->description = $request->input('description');
        $instrument->save();
        return redirect()->route('instruments.index')->with('success','Instrument has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instrument = Instrument::find($id);
        return view('instruments.show', compact('instrument'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $instrument = Instrument::find($id);
        return view('instruments.edit', compact('instrument'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
        ]);
        
        $instrument = Instrument::find($id);
        $instrument->name = $request->input('name');
        $instrument->type = $request->input('type');
        $instrument->description = $request->input('description');
        $instrument->save();
        return redirect()->route('instruments.index')->with('success','Instrument has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instrument = Instrument::find($id);
        $instrument->delete();
        return redirect()->route('instruments.index')->with('success','Instrument has been deleted successfully');
    }
}
