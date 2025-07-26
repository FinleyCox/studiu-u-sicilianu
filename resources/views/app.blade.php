<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>studiu u sicilianu</title>
    <!-- jQueryを先に読み込ませてからトースター-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- toastr CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="/css/nav.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather&display=swap');
        
        body {
            font-family: 'Merriweather', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .header {
            text-align: center;
            display: block;
            font-size: 40px;
            margin-bottom: 20px;
        }
        .container {
            margin-left: 395px;
            max-width: 900px;
            width: 100%;
            box-sizing: border-box;
            background-color: linear-gradient(135deg, #eeecf1, #e7eaf0);
            display: block;
            z-index: 1;
            margin-top: 40px;
        }
        .footer {
            width: 100%;
            background-color: rgb(243, 240, 240);
            display: flex;
            justify-content: center;
            padding: 10px 0;
            margin-top: auto;
            z-index: 1;
            position: static;
        }
        .text-left {
            padding-top: 12px;
            font-size: 12px;
            text-decoration: none;
        }
        .sidenav {
            height: 100%;
            width: 15%;
            background-color: rgb(182, 216, 218);
            overflow-x: hidden;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
        }
        .side-menu {
            color: #555151;
            border-radius: 9px;
            background-color: rgb(126, 190, 193);
        }
        
        .side-menu .nav-link {
            color: #000000 !important;
            text-decoration: none;
        }
        
        .side-menu .nav-link:hover {
            color: #333333 !important;
            background-color: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
    <div class="sidenav">
        <div class="side-menu">
            @auth
            <p class="w-100 mb-3">
                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}さん
            </p>
            @else
            <p class="w-100 mb-3">
                <i class="bi bi-person-circle"></i> Guest
            </p>
            @endauth
            @include('layouts.side-menu')
        </div>
    </div>
    
    <div class="container">
        <div class="header">
            <p>studiu u sicilianu</p>
        </div>
        @yield('content')
    </div>
    

    

    
    @if(request()->is('/'))
    <div class="footer">
        <div class="text-left">
            <a class="text-reset fw-bold footer-a" href="https://github.com/FinleyCox" target="_blank">Created by AiN</a> 👈Click to GitHub<br>
            <a class="text-reset fw-bold footer-a" href="https://qiita.com/_anonymous_dog_" target="_blank">@_anonymous_dog_</a> 👈Click to my Qiita account<br>
            <p><a class="text-reset fw-bold footer-a" href="javascript:void(0)">inter0370@gmail.com</a> 👈For Contact</p>
        </div>
    </div>
    @endif
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/user-menu.js"></script>
</body>
</html>
