<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FingerDevicesControlller;
use  App\Http\Controllers\CandidateControlller;

Route::get('/', function () {
    return view('auth.login');
})->name('welcome');
Route::post('/LoginFaceID', [\App\Http\Controllers\FaceIDController::class,'login'])->name('FaceId.login');

Route::get('attended/{user_id}', '\App\Http\Controllers\AttendanceController@attended' )->name('attended');
Route::get('attended-before/{user_id}', '\App\Http\Controllers\AttendanceController@attendedBefore' )->name('attendedBefore');
Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => ['auth', 'Role'], 'roles' => ['admin']], function () {
    Route::resource('/employees', '\App\Http\Controllers\EmployeeController');
    Route::resource('/employees', '\App\Http\Controllers\EmployeeController');
    Route::resource('/candidates', '\App\Http\Controllers\CandidateController');
    Route::resource('/postJobs', '\App\Http\Controllers\JobsController');
    Route::resource('/interviews', '\App\Http\Controllers\InterController');
    Route::resource('/lvr', '\App\Http\Controllers\lvrController');
    Route::resource('/schT', '\App\Http\Controllers\schTController');
    Route::resource('/ressources', '\App\Http\Controllers\ResController');
    Route::put('/lvr/{id}/accepted', [\App\Http\Controllers\lvrController::class,'accept'])->name('lvr.accept');
    Route::put('/lvr/{id}/declined', [\App\Http\Controllers\lvrController::class,'decline'])->name('lvr.decline');
    Route::put('/candidates/{id}/update-status', [\App\Http\Controllers\CandidateController::class,'updateStatus'])->name('candidates.updateStatus');
    Route::post('/candidates/set-interview', [\App\Http\Controllers\CandidateController::class, 'interview'])->name('candidat.interviews');
    Route::get('/attendance', '\App\Http\Controllers\AttendanceController@index')->name('attendance');
    Route::get('/FaceID', '\App\Http\Controllers\FaceIDController@index')->name('FaceId.index');
    Route::post('/FaceID', '\App\Http\Controllers\FaceIDController@submit')->name('FaceId.submit');


    Route::get('/latetime', '\App\Http\Controllers\AttendanceController@indexLatetime')->name('indexLatetime');
    Route::get('/leave', '\App\Http\Controllers\LeaveController@index')->name('leave');
    Route::get('/overtime', '\App\Http\Controllers\LeaveController@indexOvertime')->name('indexOvertime');

    Route::get('/admin', '\App\Http\Controllers\AdminController@index')->name('admin');

    Route::resource('/schedule', '\App\Http\Controllers\ScheduleController');

    Route::get('/check', '\App\Http\Controllers\CheckController@index')->name('check');
    Route::get('/sheet-report', '\App\Http\Controllers\CheckController@sheetReport')->name('sheet-report');
    Route::post('check-store','\App\Http\Controllers\CheckController@CheckStore')->name('check_store');

    // Fingerprint Devices
    Route::resource('/finger_device', '\App\Http\Controllers\BiometricDeviceController');

    Route::delete('finger_device/destroy', '\App\Http\Controllers\BiometricDeviceController@massDestroy')->name('finger_device.massDestroy');
    Route::get('finger_device/{fingerDevice}/employees/add', '\App\Http\Controllers\BiometricDeviceController@addEmployee')->name('finger_device.add.employee');
    Route::get('finger_device/{fingerDevice}/get/attendance', '\App\Http\Controllers\BiometricDeviceController@getAttendance')->name('finger_device.get.attendance');
    // Temp Clear Attendance route
    Route::get('finger_device/clear/attendance', function () {
        $midnight = \Carbon\Carbon::createFromTime(23, 50, 00);
        $diff = now()->diffInMinutes($midnight);
        dispatch(new ClearAttendanceJob())->delay(now()->addMinutes($diff));
        toast("Attendance Clearance Queue will run in 11:50 P.M}!", "success");

        return back();
    })->name('finger_device.clear.attendance');


});

Route::group(['middleware' => ['auth']], function () {

    // Route::get('/home', 'HomeController@index')->name('home');





});

// Route::get('/attendance/assign', function () {
//     return view('attendance_leave_login');
// })->name('attendance.login');

// Route::post('/attendance/assign', '\App\Http\Controllers\AttendanceController@assign')->name('attendance.assign');


// Route::get('/leave/assign', function () {
//     return view('attendance_leave_login');
// })->name('leave.login');

// Route::post('/leave/assign', '\App\Http\Controllers\LeaveController@assign')->name('leave.assign');


// Route::get('{any}', 'App\http\controllers\VeltrixController@index');
