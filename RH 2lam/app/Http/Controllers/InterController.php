<?php

namespace App\Http\Controllers;

use App\Models\interviews;
use App\Models\jobs;
use App\Models\candidates;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.interviews')->with(['jobs'=> jobs::all(),'interviews'=>interviews::all(),'candidates'=>candidates::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
        ]);

        $interview = interviews::create($validatedData);

        flash()->success('Success', 'Interview Record has been updated successfully!');
        return redirect()->back()->with('success', 'Post record updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\interviews  $interviews
     * @return \Illuminate\Http\Response
     */
    public function show(interviews $interviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\interviews  $interviews
     * @return \Illuminate\Http\Response
     */
    public function edit(interviews $interviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\interviews  $interviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'date' => 'required|date',
        'time' => 'required',
        'location' => 'required',
    ]);

    $interview = interviews::findOrFail($id);
    $interview->update($validatedData);

    flash()->success('Success', 'Interview record has been updated successfully!');
    return redirect()->back()->with('success', 'Interview record updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\interviews  $interviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(interviews $interview)
    {
        $interview->delete();
        flash()->success('Success','Interview Record has been Deleted successfully !');
        return redirect()->back()->with('success');
    }
}
