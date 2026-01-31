<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finley Cox</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="profile-layout">
            <!-- Left Side: Profile -->
            <div class="profile-section">
                <img src="{{ asset('images/finley-cox.png') }}" alt="Finley Cox" class="profile-img">
                <h1 class="profile-name">Finley Cox</h1>
                <div class="profile-bio">
                    <p>Software & Mobile Developer & Language Learner.</p>
                    <p>Creating apps that bridge technology and culture.</p>
                </div>
            </div>

            <!-- Right Side: Mini Apps -->
            <div class="apps-section">
                <h2 class="section-title">My Mini Apps</h2>
                <div class="apps-grid">
                    <!-- Studiu u Sicilianu Card -->
                    <a href="{{ route('home') }}" class="app-card">
                        <div class="app-title">studiu u sicilianu</div>
                        <div class="app-desc">
                            シチリア語学習支援プラットフォーム。単語、フレーズ、クイズで楽しく学習できます。
                        </div>
                        <div class="app-link-text">Open App &rarr;</div>
                    </a>

                    <!-- Placeholder for future apps -->
                    <!-- 
                    <a href="#" class="app-card">
                        <div class="app-title">Another App</div>
                        <div class="app-desc">Description coming soon...</div>
                        <div class="app-link-text">Open App &rarr;</div>
                    </a> 
                    -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
