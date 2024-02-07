<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Attendance</title>
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}" />
</head>

<body>
<header class="header">
    <div class="header__inner">
        <h1>Atte</h1>
    </div>
    <div class="header__menu">
        <ul>
        @if (Auth::check())
            <li><a href="/">ホーム</a></li>
            <li><a href="/attendance">日付一覧</a></li>
            <li>
                <form class="logout" action="/logout" method="post">
                    @csrf
                    <button class="logout" type="submit">ログアウト</button>
                </form>
            </li>
            @endif
        </ul>
    </div>
</header>
<main>
    <div class="main_content">
        <div class="date">
            <a href="/attendance?date={{ $prevDate }}" class="dateArrow"><</a>
            <span>{{ $selectedDate }}</span>
            <a href="/attendance?date={{ $nextDate }}" class="dateArrow">></a>
        </div>
        <table>
            <tr>
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            @foreach ($attendances as $attendance)
                @php
                    $rest = $rests->where('attendance_id', $attendance->id)->first();
                    $rest_time = \Carbon\Carbon::parse($rest->start_time)->diff(\Carbon\Carbon::parse($rest->end_time))->format('%H:%I:%S');
                    $work_time = \Carbon\Carbon::parse($attendance->start_time)->diff(\Carbon\Carbon::parse($attendance->end_time), $rest_time)->format('%H:%I:%S');
                @endphp
            <tr>
                <td>{{$attendance->user->name}}</td>
                <td>{{$attendance->start_time}}</td>
                <td>{{$attendance->end_time}}</td>
                <td>{{$rest_time}}</td>
                <td>{{$work_time}}</td>
            </tr>
            @endforeach
        </table>
        <div class="paginate">
            {{$attendances, $rests->links() }}
        </div>
    </div>
</main>
<footer>
    <small>Atte, inc.</small>
</footer>
</body>

</html>