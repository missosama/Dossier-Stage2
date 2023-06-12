<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\candidates;
use App\Models\Latetime;
use App\Models\Attendance;
use App\Models\Schedule;
use App\Models\lvr;
use App\Models\scht;
use App\Models\jobs;



class AdminController extends Controller
{
    public function index()
    {
        $totalEmp =  count(Employee::all());
        $candidates = count(candidates::all());
        $leaveRequest = count(lvr::all());
        $leaveRequestAcc = lvr::where('status', 'accepted')->count();
        $leaveRequestPen = lvr::where('status', 'pending')->count();
        $leaveRequestDec = lvr::where('status', 'declined')->count();
        $scht = count(scht::all());
        $postJob=count(jobs::all());
        $AllAttendance = count(Attendance::whereAttendance_date(date("Y-m-d"))->get());
        $ontimeEmp = count(Attendance::whereAttendance_date(date("Y-m-d"))->whereStatus('1')->get());
        $latetimeEm = count(Attendance::whereAttendance_date(date("Y-m-d"))->whereStatus('0')->get());
        $totalSchedule =  count(Schedule::all());
        $distinctDates = Attendance::distinct()->pluck('attendance_date');
        $presentEmployeesCount = Attendance::select('attendance_date', \DB::raw('count(*) as count'))
        ->where('status', '1')
        ->groupBy('attendance_date')
        ->orderBy('attendance_date')
        ->pluck('count');
        $data = [$totalEmp,$candidates, $leaveRequest,$scht,$postJob,$leaveRequestAcc, $leaveRequestPen,$leaveRequestDec,$AllAttendance,$ontimeEmp,$latetimeEm,$distinctDates,$presentEmployeesCount];

        return view('admin.index')->with(['data' => $data]);
    }

}
