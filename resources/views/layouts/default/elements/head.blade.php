<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('default/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('default/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('default/css/style.css') }}">
</head>