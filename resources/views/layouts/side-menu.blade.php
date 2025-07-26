<div class="side-menu-content">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="/words">
                <i class="bi bi-book"></i> Words
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/phrases">
                <i class="bi bi-chat-quote"></i> Phrases
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/quiz">
                <i class="bi bi-question-circle"></i> Quiz
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/conjugation">
                <i class="bi bi-arrow-repeat"></i> Conjugation
            </a>
        </li>
        @auth
        <li class="nav-item">
            <a class="nav-link" href="/favourites">
                <i class="bi bi-heart"></i> Favourites
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user-menu">
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
            <a class="nav-link" href="/login">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">
                <i class="bi bi-person-plus"></i> Register
            </a>
        </li>
        @endauth
        
        <li class="nav-item mt-3">
            <a class="nav-link" href="/">
                <i class="bi bi-house"></i> Back to Home
            </a>
        </li>
    </ul>
</div> 