<?php

namespace App\Http\Controllers;

use App\Models\schT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class schTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules=schT::all();
        return view('admin.schT', compact('schedules'));
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
            'name'=>'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i',
        ]);

        $scheduleTraining = schT::create([
            'name'=>$validatedData['name'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'time_in' => $validatedData['time_in'],
            'time_out' => $validatedData['time_out'],
        ]);

        flash()->success('Success','Trainig schedule Record has been created successfully !');
        return redirect()->back()->with('success', 'Schedule Training created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\schT  $schT
     * @return \Illuminate\Http\Response
     */
    public function show(schT $schT)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\schT  $schT
     * @return \Illuminate\Http\Response
     */
    public function edit(schT $schT)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\schT  $schT
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id)
     {
         $validatedData = $request->validate([
             'name' => 'required',
             'start_date' => 'required',
             'end_date' => 'required',
             'time_in' => 'required',
             'time_out' => 'required',
         ]);

         $scheduleTraining = schT::findOrFail($id);
         $scheduleTraining->name = $validatedData['name'];
         $scheduleTraining->start_date = $validatedData['start_date'];
         $scheduleTraining->end_date = $validatedData['end_date'];
         $scheduleTraining->time_in = $validatedData['time_in'];
         $scheduleTraining->time_out = $validatedData['time_out'];

         $scheduleTraining->save();

         flash()->success('Success', 'Training schedule record has been updated successfully!');
         return redirect()->back()->with('success', 'Schedule Training updated successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\schT  $schT
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scheduleTraining = schT::findOrFail($id);
        $scheduleTraining->delete();

        flash()->success('Success', 'Training schedule has been deleted successfully!');
        return redirect()->back()->with('success', 'Schedule Training deleted successfully');
    }
}
