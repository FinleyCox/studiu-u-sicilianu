<div class="side-menu-content">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('words*') || request()->routeIs('words-contains*') ? 'active' : '' }}" href="{{ route('words') }}">
                Words
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('phrases*') ? 'active' : '' }}" href="{{ route('phrases') }}">
                Phrases
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('quiz*') ? 'active' : '' }}" href="{{ route('quiz') }}">
                Quiz
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('conjugation*') ? 'active' : '' }}" href="{{ route('conjugation') }}">
                Conjugation
            </a>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}" href="{{ route('landing') }}">
                Back to Home
            </a>
        </li>
    </ul>
</div> 
