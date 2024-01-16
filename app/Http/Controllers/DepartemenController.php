<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departemen = Departemen::all();
        return view('departemens.index', compact('departemen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departemens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required',

        ]);

        Departemen::create($request->all());

        return redirect()->route('departemens.index')
            ->with('success', 'Departemen created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function show(Departemen $departemen)
    {
        return view('departemens.show', compact('departemen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function edit(Departemen $departemen)
    {
        return view('departemens.edit', compact('departemen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departemen $departemen)
    {

        $request->validate([
            'nama_departemen' => 'required',

        ]);

        $departemen->update($request->all());

        return redirect()->route('departemens.index')
            ->with('success', 'Departemen updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departemen  $departemens
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departemen $departemen)
    {

        $departemen->delete();

        return redirect()->route('departemens.index')
            ->with('success', 'Departemen deleted successfully');
    }
}
