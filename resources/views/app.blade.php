<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>@yield('title', 'studiu u sicilianu - シチリア語学習サイト')</title>
    <meta name="description" content="@yield('description', 'studiu u sicilianuは、シチリア語を学ぶための学習支援サイトです。単語、フレーズ、クイズ、動詞の活用など、段階的にシチリア語を学習できます。')">
    <meta name="keywords" content="シチリア語, 学習, イタリア語, 言語学習, 単語, フレーズ, クイズ, 動詞活用">
    <meta name="author" content="Ai Nakajima">
    <meta property="og:title" content="@yield('title', 'studiu u sicilianu - シチリア語学習サイト')">
    <meta property="og:description" content="@yield('description', 'studiu u sicilianuは、シチリア語を学ぶための学習支援サイトです。単語、フレーズ、クイズ、動詞の活用など、段階的にシチリア語を学習できます。')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title', 'studiu u sicilianu - シチリア語学習サイト')">
    <meta name="twitter:description" content="@yield('description', 'studiu u sicilianuは、シチリア語を学ぶための学習支援サイトです。単語、フレーズ、クイズ、動詞の活用など、段階的にシチリア語を学習できます。')">
    <!-- jQueryを先に読み込ませてからトースター-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- toastr CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="/css/nav.css" rel="stylesheet">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5173189590303230"
     crossorigin="anonymous"></script>
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
        
        .main-content {
            margin-left: 0;
            transition: margin-left 0.5s;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .main-content .container {
            margin-left: 0;
            max-width: 100%;
            width: 100%;
            box-sizing: border-box;
            background-color: transparent;
            display: block;
            z-index: 1;
            margin-top: 0;
            padding: 20px;
            flex: 1;
        }
        
        @media (min-width: 768px) {
            .main-content {
                margin-left: 250px;
            }
            
            .main-content .container {
                max-width: 900px;
                margin: 0 auto;
                padding: 20px;
            }
        }
        
        .footer {
            width: 100%;
            background-color: rgb(243, 240, 240);
            padding: 20px 0;
            margin-top: auto;
            z-index: 1;
            position: static;
        }
        
        .footer .container {
            margin-left: 0;
            max-width: 100%;
        }
        
        @media (min-width: 768px) {
            .footer .container {
                margin-left: 250px;
                max-width: calc(100% - 250px);
            }
        }
        .text-left {
            padding-top: 12px;
            font-size: 12px;
            text-decoration: none;
        }
        .sidenav {
            height: 100%;
            width: 250px;
            background-color: rgb(182, 216, 218);
            overflow-x: hidden;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: -250px;
            z-index: 1000;
            transition: left 0.3s ease;
        }
        
        .sidenav.active {
            left: 0;
        }
        
        @media (min-width: 768px) {
            .sidenav {
                left: 0;
            }
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
        
        /* ハンバーガーメニューボタン */
        .hamburger-btn {
            display: block;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: rgb(182, 216, 218);
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        @media (min-width: 768px) {
            .hamburger-btn {
                display: none;
            }
        }
        
        .hamburger-btn:hover {
            background: rgb(126, 190, 193);
        }
        
        .hamburger-btn .bar {
            width: 25px;
            height: 3px;
            background-color: #333;
            margin: 5px 0;
            transition: 0.3s;
            display: block;
        }
        
        /* オーバーレイ */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        
        .sidebar-overlay.active {
            display: block;
        }
        
        @media (min-width: 768px) {
            .sidebar-overlay {
                display: none !important;
            }
        }
        
        /* 戻るボタン */
        .back-btn {
            display: none;
            position: fixed;
            top: 80px;
            left: 20px;
            z-index: 1000;
            background: rgb(126, 190, 193);
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #333;
            font-size: 14px;
            font-weight: 500;
        }
        
        .back-btn:hover {
            background: rgb(182, 216, 218);
            transform: translateX(-2px);
        }
        
        .back-btn i {
            margin-right: 5px;
        }
        
        /* オーバーレイ */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        
        /* レスポンシブデザイン - タブレット */
        @media (max-width: 1024px) {
            .sidenav {
                width: 200px;
            }
            
            .container {
                margin-left: 200px;
                max-width: calc(100% - 200px);
            }
        }
        
        /* レスポンシブデザイン - モバイル */
        @media (max-width: 768px) {
            .hamburger-btn {
                display: block;
            }
            
            .back-btn {
                display: block;
            }
            
            .sidenav {
                width: 280px;
                height: 100%;
                position: fixed;
                left: -280px;
                top: 0;
                transition: left 0.3s ease;
                z-index: 1001;
                background-color: rgb(182, 216, 218);
                padding: 20px 15px;
            }
            
            .sidenav.active {
                left: 0;
            }
            
            .container {
                margin-left: 0;
                max-width: 100%;
                margin-top: 80px;
                padding: 0 15px;
            }
            
            .header {
                font-size: 28px;
                margin-bottom: 15px;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
        }
        
        /* 小さいスマホ用 */
        @media (max-width: 480px) {
            .sidenav {
                width: 260px;
                left: -260px;
            }
            
            .container {
                padding: 0 10px;
                margin-top: 70px;
            }
            
            .header {
                font-size: 24px;
                margin-bottom: 10px;
            }
            
            .hamburger-btn {
                top: 15px;
                left: 15px;
                padding: 8px;
            }
            
            .back-btn {
                top: 70px;
                left: 15px;
                padding: 6px 10px;
                font-size: 13px;
            }
        }
        
        /* 超小さいスマホ用 */
        @media (max-width: 360px) {
            .sidenav {
                width: 240px;
                left: -240px;
            }
            
            .container {
                padding: 0 8px;
                margin-top: 60px;
            }
            
            .header {
                font-size: 20px;
                margin-bottom: 8px;
            }
            
            .back-btn {
                top: 60px;
                left: 12px;
                padding: 5px 8px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- ハンバーガーメニューボタン -->
    <button class="hamburger-btn" id="hamburgerBtn">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </button>
    
    <!-- 戻るボタン -->
    <button class="back-btn" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>戻る
    </button>
    
    <!-- オーバーレイ -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <div class="sidenav" id="sidenav">
        <div class="side-menu">
            {{-- User display --}}
            {{-- @auth
            <p class="w-100 mb-3">
                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}さん
            </p>
            @else
            <p class="w-100 mb-3">
                <i class="bi bi-person-circle"></i> Guest
            </p>
            @endauth --}}
            @include('layouts.side-menu')
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="header">
                <p>studiu u sicilianu</p>
            </div>
            @yield('content')
        </div>
    </div>
    
    <div class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h6 class="fw-bold mb-3">studiu u sicilianu</h6>
                    <p class="small text-muted mb-3">シチリア語学習を支援するウェブサイト</p>
                    <div class="d-flex gap-3">
                        <a href="https://github.com/FinleyCox" target="_blank" class="text-reset text-decoration-none">
                            <i class="bi bi-github"></i> GitHub
                        </a>
                        <a href="https://qiita.com/_anonymous_dog_" target="_blank" class="text-reset text-decoration-none">
                            <i class="bi bi-file-text"></i> Qiita
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold mb-3">サイト情報</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="/about" class="text-reset text-decoration-none">サイトについて</a></li>
                        <li class="mb-2"><a href="/contact" class="text-reset text-decoration-none">お問い合わせ</a></li>
                        <li class="mb-2"><a href="/sitemap" class="text-reset text-decoration-none">サイトマップ</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold mb-3">法的情報</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="/privacy-policy" class="text-reset text-decoration-none">プライバシーポリシー</a></li>
                        <li class="mb-2"><a href="/terms-of-service" class="text-reset text-decoration-none">利用規約</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center small text-muted">
                <p class="mb-1">&copy; {{ date('Y') }} studiu u sicilianu. All rights reserved.</p>
                <p class="mb-0">Created by <a href="https://github.com/FinleyCox" target="_blank" class="text-reset text-decoration-none">FinleyCox</a></p>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/user-menu.js"></script>
    
    <!-- ハンバーガーメニュー機能 -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            const sidenav = document.getElementById('sidenav');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            
            // ハンバーガーボタンクリック時の処理
            hamburgerBtn.addEventListener('click', function() {
                sidenav.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
                document.body.style.overflow = sidenav.classList.contains('active') ? 'hidden' : '';
            });
            
            // オーバーレイクリック時の処理
            sidebarOverlay.addEventListener('click', function() {
                sidenav.classList.remove('active');
                sidebarOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });
            
            // ESCキーでのサイドバー閉じる
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && sidenav.classList.contains('active')) {
                    sidenav.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
            
            // 画面サイズ変更時の処理
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    sidenav.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });
    </script>
</body>
</html>
