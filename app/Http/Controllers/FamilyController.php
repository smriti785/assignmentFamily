<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $families = Family::parent()->first();
        return view('family.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('family.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:families',
            'parent_id' => 'nullable|exists:families,id',
        ]);
        // dd($validatedData);
        if($validatedData == true) {
            $family = new Family;
            $family->name = $request->name;
            $family->parent_id = $request->parent_id;
            $family->save();
            return redirect()->route('family.index')->with('success', 'Family created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
        $family = Family::get();
        return view('family.show', compact('family'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit(Family $family, $id)
    {
        $family = Family::find($id);
        return view('family.edit', compact('family'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'parent_id' => 'required|exists:families,id',
        ]);
        if($validatedData == true) {
            $family = Family::find($id);
            $family->name = $request->name;
            $family->parent_id = $request->parent_id;
            $family->save();
            return redirect()->route('family.index')->with('success', 'Family updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy(Family $family, $id)
    {
        $family = Family::where('id', $id)->delete();
        return back()->with('success', 'Family deleted successfully');
    }
}
