<?php

namespace App\Http\Controllers;

use App\Models\jobs;
use App\Models\candidates;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.postJobs')->with(['jobs'=> jobs::all(),'candidates'=>candidates::all()]);
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
            'name' => 'required|string',
            'description' => 'required|string',
            'salary' => 'required|numeric',
        ]);

        $job = jobs::create($validatedData);

        flash()->success('Success', 'Post Record has been updated successfully!');
        return redirect()->back()->with('success', 'Post record updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(jobs $jobs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit(jobs $jobs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'salary' => 'required|numeric',
        ]);

        $job = jobs::findOrFail($id);
        $job->update($validatedData);

        flash()->success('Success', 'Post Record has been updated successfully!');
        return redirect()->back()->with('success', 'Post record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(jobs $job)
{
    $job->delete();
    flash()->success('Success', 'Job Record has been deleted successfully!');
    return redirect()->back()->with('success');
}
}
