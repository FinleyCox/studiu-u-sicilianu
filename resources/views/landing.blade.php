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

            <!-- Right Side: Lists -->
            <div class="right-section">
                <!-- My Mini Apps -->
                <h2 class="section-title">My Mini Apps</h2>
                <ul class="service-list">
                    <li>
                        <a href="{{ route('home') }}"><strong>studiu u sicilianu</strong></a>
                        <span>シチリア語学習支援プラットフォーム。単語、フレーズ、クイズで楽しく学習できます。</span>
                    </li>
                </ul>

                <!-- My Service -->
                <h2 class="section-title">My Service</h2>
                <ul class="service-list">
                    <li>
                        <a href="https://riki-ai.tech" target="_blank" rel="noopener noreferrer"><strong>riki-ai.tech</strong></a>
                        <span>エリアのトレンドをAIで分析。最新情報をチェックできます</span>
                    </li>
                </ul>

                <!-- My Tech Blog -->
                <h2 class="section-title">My Tech Blog</h2>
                <ul class="service-list">
                    <li>
                        <a href="{{ route('blog.index') }}"><strong>Tech Blog</strong></a>
                        <span>開発日記や技術スタックについての記事を書いています。</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
