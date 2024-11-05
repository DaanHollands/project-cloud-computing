<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ziekenhuis - @yield('title')</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
        }
        .flex-center {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 48px;
            margin-bottom: 30px;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 18px;
            font-weight: 600;
            text-decoration: none;
            text-transform: uppercase;
        }
        .links > a:hover {
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
