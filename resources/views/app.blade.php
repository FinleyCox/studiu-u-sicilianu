<!DOCTYPE html>
<html lang="ja">
<head>
    @php
        $defaultTitle = 'studiu u sicilianu - シチリア語学習サイト';
        $defaultDescription = 'studiu u sicilianuは、シチリア語を学ぶための学習支援サイトです。単語、フレーズ、クイズ、動詞の活用など、段階的にシチリア語を学習できます。';
        $defaultKeywords = 'シチリア語, シチリア語学習, イタリア語, 言語学習, 単語, フレーズ, クイズ, 動詞活用';
        $title = trim($__env->yieldContent('title')) ?: $defaultTitle;
        $description = trim($__env->yieldContent('description')) ?: $defaultDescription;
        $keywords = trim($__env->yieldContent('keywords')) ?: $defaultKeywords;
        $canonical = trim($__env->yieldContent('canonical')) ?: url()->current();
        $ogImage = trim($__env->yieldContent('og_image')) ?: asset('og-image.svg');
        $structuredWebsite = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'studiu u sicilianu',
            'url' => url('/'),
            'inLanguage' => 'ja',
            'description' => $description,
        ];
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="author" content="FinleyCox">
    <meta name="theme-color" content="#7ebed1">
    <link rel="canonical" href="{{ $canonical }}">
    <link rel="alternate" hreflang="ja-JP" href="{{ $canonical }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:site_name" content="studiu u sicilianu">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:alt" content="studiu u sicilianuのシチリア語学習コンテンツ">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <script type="application/ld+json">
        {!! json_encode($structuredWebsite, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    @stack('structured-data')
    @stack('head')
    <!-- jQueryを先に読み込ませてからトースター-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- toastr CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="/css/nav.css" rel="stylesheet">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5173189590303230"
     crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap');

        :root {
            --bg-body: #ffffff;
            --bg-content: #ffffff;
            --bg-sidebar: #fafafa;
            --bg-footer: #fafafa;
            --text-main: #1a1a1a;
            --text-muted: #666666;
            --border-color: #eeeeee;
            --link-color: #1a1a1a;
            --link-hover: #555555;
            --sidebar-width: 250px;
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg-body: #121212;
                --bg-content: #121212;
                --bg-sidebar: #181818;
                --bg-footer: #181818;
                --text-main: #e0e0e0;
                --text-muted: #a0a0a0;
                --border-color: #333333;
                --link-color: #e0e0e0;
                --link-hover: #ffffff;
            }
        }

        body {
            font-family: 'Noto Sans JP', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            line-height: 1.6;
        }

        a {
            color: var(--link-color);
            text-decoration: underline;
            text-underline-offset: 4px;
        }

        a:hover {
            color: var(--link-hover);
        }

        .header {
            text-align: center;
            display: block;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1rem;
        }

        .main-content {
            margin-left: 0;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: var(--bg-content);
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
            padding: 2rem;
            flex: 1;
        }

        @media (min-width: 768px) {
            .main-content {
                margin-left: var(--sidebar-width);
            }

            .main-content .container {
                max-width: 800px; /* More readable width for text */
                margin: 0 auto;
            }
        }

        .footer {
            width: 100%;
            background-color: var(--bg-footer);
            border-top: 1px solid var(--border-color);
            padding: 3rem 0;
            margin-top: auto;
            color: var(--text-muted);
        }

        .footer .container {
            margin-left: 0;
            max-width: 100%;
        }

        @media (min-width: 768px) {
            .footer .container {
                margin-left: var(--sidebar-width);
                max-width: calc(100% - var(--sidebar-width));
            }
        }

        .sidenav {
            height: 100%;
            width: var(--sidebar-width);
            background-color: var(--bg-sidebar);
            border-right: 1px solid var(--border-color);
            overflow-x: hidden;
            padding-top: 2rem;
            position: fixed;
            top: 0;
            left: calc(var(--sidebar-width) * -1);
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
            color: var(--text-main);
            background-color: transparent;
            padding: 0 1rem;
        }

        .side-menu .nav-link {
            color: var(--text-main) !important;
            text-decoration: none;
            display: block;
            padding: 0.5rem 0;
        }

        .side-menu .nav-link:hover {
            color: var(--link-hover) !important;
            text-decoration: underline;
            background-color: transparent;
        }

        /* Hamburger Button - Minimalist */
        .hamburger-btn {
            display: block;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: transparent;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            padding: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--text-main);
        }

        @media (min-width: 768px) {
            .hamburger-btn {
                display: none;
            }
        }

        .hamburger-btn:hover {
            background-color: var(--bg-sidebar);
        }

        .hamburger-btn .bar {
            width: 20px;
            height: 2px;
            background-color: var(--text-main);
            margin: 4px 0;
            display: block;
        }

        /* Back Button - Minimalist */
        .back-btn {
            display: none;
            position: fixed;
            top: 4rem; /* Adjusted for cleaner spacing */
            left: 1rem;
            z-index: 1000;
            background: transparent;
            border: none;
            padding: 0.5rem 0;
            cursor: pointer;
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .back-btn:hover {
            color: var(--text-main);
            transform: none; /* Removed movement */
            text-decoration: underline;
        }

        .back-btn i {
            margin-right: 0.5rem;
        }

        /* Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3); /* Lighter overlay */
            z-index: 999;
            backdrop-filter: blur(2px); /* Slight blur for modern feel */
        }

        .sidebar-overlay.active {
            display: block;
        }

        @media (min-width: 768px) {
            .sidebar-overlay {
                display: none !important;
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidenav {
                width: 280px; /* Slightly wider on mobile for touch */
                left: -280px;
            }
            
            .container {
                margin-top: 3rem;
                padding: 1rem;
            }
            
            .header {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }
            
            .back-btn {
                display: block;
            }
        }

        .content-wide {
            max-width: 1000px;
            width: 100%;
            margin: 0 auto;
            padding: 2rem;
            box-sizing: border-box;
        }

        /* Minimalist Alert Overrides */
        .alert {
            background-color: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-main);
            border-radius: 4px;
        }
        
        .alert-info {
            background-color: transparent;
            border-color: var(--text-main); /* Or keep it neutral */
        }

        .alert-light {
            background-color: transparent;
            border-color: var(--border-color);
        }

        .page-card {
            border: 1px solid var(--border-color);
            background-color: var(--bg-content);
            border-radius: 4px; /* Minimal radius */
            padding: 1.5rem;
            margin-bottom: 1.5rem;
             /* No shadow */
             box-shadow: none;
        }
    </style>
</head>
<body @hasSection('body_attributes'){!! trim($__env->yieldContent('body_attributes')) !!}@endif>
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
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold mb-3">サイト情報</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('about') }}" class="text-reset text-decoration-none">サイトについて</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}" class="text-reset text-decoration-none">お問い合わせ</a></li>
                        <li class="mb-2"><a href="{{ route('sitemap') }}" class="text-reset text-decoration-none">サイトマップ</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold mb-3">法的情報</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('privacy-policy') }}" class="text-reset text-decoration-none">プライバシーポリシー</a></li>
                        <li class="mb-2"><a href="{{ route('privacy-policy') }}#adsense-policy" class="text-reset text-decoration-none">広告とクッキーの取扱い</a></li>
                        <li class="mb-2"><a href="{{ route('terms-of-service') }}" class="text-reset text-decoration-none">利用規約</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center small text-muted">
                <p class="mb-1">&copy; {{ date('Y') }} studiu u sicilianu. All rights reserved.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/user-menu.js?v={{ filemtime(public_path('js/user-menu.js')) }}"></script>

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
