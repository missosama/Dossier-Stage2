<?php

namespace App\Http\Controllers;

use App\Models\lvr;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LvrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lvrs=lvr::all();
        $employes=Employee::all();
        return view('admin.lvr',compact('lvrs','employes'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lvr  $lvr
     * @return \Illuminate\Http\Response
     */
    public function show(lvr $lvr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lvr  $lvr
     * @return \Illuminate\Http\Response
     */
    public function edit(lvr $lvr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lvr  $lvr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lvr $lvr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lvr  $lvr
     * @return \Illuminate\Http\Response
     */
    public function destroy(lvr $lvr)
    {
        //
    }
    public function decline($id){
        $request = lvr::findOrFail($id);
        $request->status = 'declined';
        $request->save();

        // Add any additional logic or notifications here
        flash()->success('Success','Request declined!');
        return redirect()->back()->with('success', 'Leave request declined.');
    }
    public function accept($id){
        $request = lvr::findOrFail($id);
        $request->status = 'accepted';
        $request->save();

        // Add any additional logic or notifications here
        flash()->success('Success','Request Accepted!');
        return redirect()->back()->with('success', 'Leave request accepted.');
    }
}
