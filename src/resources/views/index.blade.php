<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Attendance</title>
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
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
        @if(auth()->check())
        <p class="username">{{ auth()->user()->name }}さんお疲れ様です！</p>
        @endif
        <div class="button_grid">
            <form class="start" action="/attendance/start" method="post">
            @csrf
                <button class="start_button" name="start_button" type="submit" @if($Started) disabled @endif>
                    勤務開始
                </button>
            </form>
            <form class="end" action="/attendance/end" method="post">
            @csrf
                <button class="end_button" name="end_button" type="submit" @if(!$Started || $Ended) disabled @endif>
                    勤務終了
                </button>
            </form>
            <form class="leave" action="/break/start" method="post">
            @csrf
                <button class="leave_button" type="submit" @if(!$Started || $RestStarted || $Ended) disabled @endif>休憩開始</button>
            </form>
            <form class="back" action="/break/end" method="post">
            @csrf
                <button class="back_button" type="submit" @if(!$Started || !$RestStarted || $Ended) disabled @endif>休憩終了</button>
            </form>
        </div>
    </div>
</main>
<footer>
    <small>Atte, inc.</small>
</footer>
</body>

</html>