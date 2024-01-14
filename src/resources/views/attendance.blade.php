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
            <li>ホーム</li>
            <li>日付一覧</li>
            <li>ログアウト</li>
        </ul>
    </div>
</header>
<main>
    <div class="main_content">
        <p class="date">2021/11/01</p>
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
                @endphp
            <tr>
                <td>{{$attendance->user_id}}</td>
                <td>{{$attendance->start_time}}</td>
                <td>{{$attendance->end_time}}</td>
                <td>{{$rest->start_time}}</td>
                <td>{{$rest->end_time}}</td>
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