<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function start()
    {
        $now = Carbon::now();
        $now_hour = $now->hour;
        return view('index');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function attendance()
    {
        $attendances = Attendance::Paginate(5);
        $rests = Rest::Paginate(5);

        return view('attendance', [

            'attendances' => $attendances,
            'rests' => $rests,
        ]);
    }
}
