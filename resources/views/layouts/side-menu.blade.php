<div class="side-menu-content">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('words*') ? 'active' : '' }}" href="/words">
                Words
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('phrases*') ? 'active' : '' }}" href="/phrases">
                Phrases
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('quiz*') ? 'active' : '' }}" href="/quiz">
                Quiz
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('conjugation*') ? 'active' : '' }}" href="/conjugation">
                Conjugation
            </a>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                Back to Home
            </a>
        </li>
        
        <li class="nav-item mt-3">
            <hr class="my-2">
            <small class="text-muted px-3">サイト情報</small>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('about*') ? 'active' : '' }}" href="/about">
                サイトについて
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="/contact">
                お問い合わせ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('sitemap*') ? 'active' : '' }}" href="/sitemap">
                サイトマップ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('privacy-policy*') ? 'active' : '' }}" href="/privacy-policy">
                プライバシーポリシー
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('terms-of-service*') ? 'active' : '' }}" href="/terms-of-service">
                利用規約
            </a>
        </li>
    </ul>
</div> 
