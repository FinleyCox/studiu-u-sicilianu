<div class="side-menu-content">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('words*') ? 'active' : '' }}" href="/words">
                <i class="bi bi-book"></i> Words
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('phrases*') ? 'active' : '' }}" href="/phrases">
                <i class="bi bi-chat-quote"></i> Phrases
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('quiz*') ? 'active' : '' }}" href="/quiz">
                <i class="bi bi-question-circle"></i> Quiz
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('conjugation*') ? 'active' : '' }}" href="/conjugation">
                <i class="bi bi-arrow-repeat"></i> Conjugation
            </a>
        </li>
        {{-- Auth related navigation --}}
        {{-- @auth
        <li class="nav-item">
            <a class="nav-link {{ request()->is('favourites*') ? 'active' : '' }}" href="/favourites">
                <i class="bi bi-heart"></i> Favourites
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('user-menu*') ? 'active' : '' }}" href="/user-menu">
                <i class="bi bi-person"></i> User Menu
            </a>
        </li>
        <li class="nav-item">
            <form method="POST" action="/logout" style="display: inline;">
                @csrf
                <button type="submit" class="nav-link btn btn-link" style="border: none; background: none; padding: 0;">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link {{ request()->is('login*') ? 'active' : '' }}" href="/login">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('register*') ? 'active' : '' }}" href="/register">
                <i class="bi bi-person-plus"></i> Register
            </a>
        </li>
        @endauth --}}
        
        <li class="nav-item mt-3">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                <i class="bi bi-house"></i> Back to Home
            </a>
        </li>
        
        <li class="nav-item mt-3">
            <hr class="my-2">
            <small class="text-muted px-3">サイト情報</small>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('about*') ? 'active' : '' }}" href="/about">
                <i class="bi bi-info-circle"></i> サイトについて
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="/contact">
                <i class="bi bi-envelope"></i> お問い合わせ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('sitemap*') ? 'active' : '' }}" href="/sitemap">
                <i class="bi bi-diagram-3"></i> サイトマップ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('privacy-policy*') ? 'active' : '' }}" href="/privacy-policy">
                <i class="bi bi-shield-check"></i> プライバシーポリシー
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('terms-of-service*') ? 'active' : '' }}" href="/terms-of-service">
                <i class="bi bi-file-text"></i> 利用規約
            </a>
        </li>
    </ul>
</div> 