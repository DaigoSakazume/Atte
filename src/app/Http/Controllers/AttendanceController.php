<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{

    public function index()
    {
        $user_id = auth()->id();
        $attendance_id = auth()->id();

        $Started = Attendance::where('user_id', $user_id)
            ->whereDate('start_time', Carbon::today())
            ->latest()
            ->value('start_time');

        $Ended = Attendance::where('user_id', $user_id)
            ->whereDate('end_time', Carbon::today())
            ->latest()
            ->value('end_time');

        $RestStarted = Rest::where('attendance_id', $attendance_id)
        ->whereNull('end_time')
        ->latest()
        ->value('start_time');

        $RestEnded = Rest::where('attendance_id', $attendance_id)
        ->latest()
        ->value('end_time');

        return view('index', compact('Started', 'Ended', 'RestStarted', 'RestEnded'));
    }


    public function start()
    {
        $user_id = auth()->id();
        $attendance_id = auth()->id();

        Attendance::create([
            'user_id' => $user_id,
            'start_time' => now(),
            'date' => now()->toDateString(),
        ]);

        $Started = Attendance::where('user_id', $user_id)
            ->whereDate('start_time', Carbon::today())
            ->latest()
            ->value('start_time');

        $Ended = Attendance::where('user_id', $user_id)
            ->whereDate('end_time', Carbon::today())
            ->latest()
            ->value('end_time');

        $RestStarted = Rest::where('attendance_id', $attendance_id)
        ->whereNull('end_time')
        ->latest()
        ->value('start_time');

        $RestEnded = Rest::where('attendance_id', $attendance_id)
        ->latest()
        ->value('end_time');

        return view('index', compact('Started', 'Ended', 'RestStarted', 'RestEnded'));
    }

    public function end()
    {
        $user_id = auth()->id();
        $attendance_id = auth()->id();

        Attendance::where('user_id', $user_id)
            ->latest()
            ->update([
                'end_time' => now(),
            ]);

        $Started = Attendance::where('user_id', $user_id)
            ->whereDate('start_time', Carbon::today())
            ->latest()
            ->value('start_time');

        $Ended = Attendance::where('user_id', $user_id)
            ->whereDate('end_time', Carbon::today())
            ->latest()
            ->value('end_time');

        $RestStarted = Rest::where('attendance_id', $attendance_id)
        ->whereNull('end_time')
        ->latest()
        ->value('start_time');

        $RestEnded = Rest::where('attendance_id', $attendance_id)
        ->latest()
        ->value('end_time');

        return view('index', compact('Started', 'Ended', 'RestStarted', 'RestEnded'));
    }

    public function breakStart()
    {
        $user_id = auth()->id();
        $attendance_id = auth()->id();

        Rest::create([
            'attendance_id' => $attendance_id,
            'start_time' => now(),
        ]);

        $Started = Attendance::where('user_id', $user_id)
            ->whereDate('start_time', Carbon::today())
            ->latest()
            ->value('start_time');

        $Ended = Attendance::where('user_id', $user_id)
            ->whereDate('end_time', Carbon::today())
            ->latest()
            ->value('end_time');

        $RestStarted = Rest::where('attendance_id', $attendance_id)
        ->whereNull('end_time')
        ->latest()
        ->value('start_time');

        $RestEnded = Rest::where('attendance_id', $attendance_id)
        ->latest()
        ->value('end_time');

        return view('index', compact('Started', 'Ended', 'RestStarted', 'RestEnded'));
    }

    public function breakEnd()
    {
        $user_id = auth()->id();
        $attendance_id = auth()->id();

        Rest::where('attendance_id', $attendance_id)
            ->latest()
            ->update([
                'end_time' => now(),
        ]);

        $Started = Attendance::where('user_id', $user_id)
            ->whereDate('start_time', Carbon::today())
            ->latest()
            ->value('start_time');

        $Ended = Attendance::where('user_id', $user_id)
            ->whereDate('end_time', Carbon::today())
            ->latest()
            ->value('end_time');

        $RestStarted = Rest::where('attendance_id', $attendance_id)
        ->latest()
        ->value('start_time');

        $RestEnded = Rest::where('attendance_id', $attendance_id)
        ->latest()
        ->value('end_time');

        return view('index', compact('Started', 'Ended', 'RestStarted', 'RestEnded'));
    }


    public function attendance(Request $request)
    {
        $attendances = Attendance::Paginate(5);
        $rests = Rest::Paginate(5);

        $selectedDate = $request->input('date', now()->format('Y-m-d'));
        $attendanceDates = Attendance::pluck('date')->unique()->sort();
        $currentIndex = $attendanceDates->search($selectedDate);

        $prevIndex = $currentIndex - 1;
        $nextIndex = $currentIndex + 1;

        $prevDate = isset($attendanceDates[$prevIndex]) ? $attendanceDates[$prevIndex] : null;
        $nextDate = isset($attendanceDates[$nextIndex]) ? $attendanceDates[$nextIndex] : null;


        return view('attendance', [
            'attendances' => $attendances,
            'rests' => $rests,
            'selectedDate' => $selectedDate,
            'prevDate' => $prevDate,
            'nextDate' => $nextDate,
        ]);

    }

    public function work_time($time1, $time2)
    {
        $work_start = \Carbon\Carbon::parse($time1);
        $work_end = \Carbon\Carbon::parse($time2);
        return $work_end->diff($work_start)->format('%H:%I:%S');
    }

    public function rest_time($time3, $time4)
    {
        $rest_start = \Carbon\Carbon::parse($time3);
        $rest_end = \Carbon\Carbon::parse($time4);
        return $rest_end->diff($rest_start)->format('%H:%I:%S');
    }
}
