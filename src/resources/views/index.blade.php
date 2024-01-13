@extends('layouts.app')

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
            <li>ホーム</li>
            <li>日付一覧</li>
            <li>ログアウト</li>
        </ul>
    </div>
</header>
<main>
    <div class="main_content">
        <p class="username">福場凛太郎さんお疲れ様です！</p>
        <div class="button_grid">
            <form class="start" action="/attendance/start" method="post">
            @csrf
                <button class="start_button" type="submit">勤務開始</button>
            </form>
            <form class="end" action="/attendance/end" method="post">
            @csrf
                <button class="end_button" type="submit">勤務終了</button>
            </form>
            <form class="leave" action="/break/start" method="post">
            @csrf
                <button class="leave_button" type="submit">休憩開始</button>
            </form>
            <form class="back" action="/break/end" method="post">
            @csrf
                <button class="back_button" type="submit">休憩終了</button>
            </form>
        </div>
    </div>
</main>
<footer>
    <small>Atte, inc.</small>
</footer>
</body>

</html>