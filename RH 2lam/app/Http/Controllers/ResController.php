<?php

namespace App\Http\Controllers;

use App\Models\ressources;
use App\Models\schT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules=schT::all();
        $ressources=ressources::all();
        return view('admin.ressources',compact('ressources','schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'file' => 'required',
            'schT_id' => 'required|exists:schT,id',
        ]);

        $ressource = new ressources();
        $ressource->name = $validatedData['name'];
        $ressource->file = $validatedData['file'];
        $ressource->schT_id = $validatedData['schT_id'];
        $ressource->save();

        flash()->success('Success', 'Ressource has been added successfully!');
        return redirect()->back()->with('success', 'Ressource added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ressources  $ressources
     * @return \Illuminate\Http\Response
     */
    public function show(ressources $ressources)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ressources  $ressources
     * @return \Illuminate\Http\Response
     */
    public function edit(ressources $ressources)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ressources  $ressources
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'file' => 'required',
            'scht_id' => 'required|exists:schT,id',
        ]);

        $resource = ressources::findOrFail($id);
        $resource->name = $validatedData['name'];
        $resource->file = $validatedData['file'];
        $resource->schT_id = $validatedData['scht_id'];
        $resource->save();

        flash()->success('Success', 'Ressource has been updated successfully!');
        return redirect()->back()->with('success', 'Resource updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ressources  $ressources
     * @return \Illuminate\Http\Response
     */
    public function destroy(ressources $ressources)
    {
        //
    }
}
