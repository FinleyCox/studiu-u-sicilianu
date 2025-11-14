@extends('app')

@section('title', 'サイトマップ - studiu u sicilianu')
@section('description', 'studiu u sicilianuの全ページを一覧でご確認いただけます。学習コンテンツ、ユーザー機能、サイト情報など、すべてのページへのリンクを提供しています。')
@section('keywords', 'シチリア語 サイトマップ, studiu u sicilianu sitemap')
@section('canonical', route('sitemap'))

@push('structured-data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'SiteNavigationElement',
    'name' => 'studiu u sicilianu sitemap',
    'url' => route('sitemap'),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="mb-4">サイトマップ</h1>
            
            <div class="card">
                <div class="card-body">
                    <p class="mb-4">studiu u sicilianuの全ページを一覧でご確認いただけます。</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h3>🏠 メインページ</h3>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="/" class="text-decoration-none">
                                        <i class="bi bi-house"></i> ホーム
                                    </a>
                                    <br><small class="text-muted">サイトのトップページ</small>
                                </li>
                            </ul>
                            
                            <h3>📚 学習コンテンツ</h3>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="/words" class="text-decoration-none">
                                        <i class="bi bi-book"></i> 単語
                                    </a>
                                    <br><small class="text-muted">シチリア語の単語を学習</small>
                                </li>
                                <li class="mb-2">
                                    <a href="/words-contains" class="text-decoration-none">
                                        <i class="bi bi-search"></i> 単語検索
                                    </a>
                                    <br><small class="text-muted">単語を検索して学習</small>
                                </li>
                                <li class="mb-2">
                                    <a href="/phrases" class="text-decoration-none">
                                        <i class="bi bi-chat-quote"></i> フレーズ
                                    </a>
                                    <br><small class="text-muted">実用的なフレーズを学習</small>
                                </li>
                                <li class="mb-2">
                                    <a href="/quiz" class="text-decoration-none">
                                        <i class="bi bi-question-circle"></i> クイズ
                                    </a>
                                    <br><small class="text-muted">学習内容をクイズで復習</small>
                                </li>
                                <li class="mb-2">
                                    <a href="/conjugation" class="text-decoration-none">
                                        <i class="bi bi-arrow-repeat"></i> 動詞の活用
                                    </a>
                                    <br><small class="text-muted">動詞の活用を学習</small>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="col-md-6">
                            {{-- ユーザー機能 --}}
                            {{-- <h3>👤 ユーザー機能</h3>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="/login" class="text-decoration-none">
                                        <i class="bi bi-box-arrow-in-right"></i> ログイン
                                    </a>
                                    <br><small class="text-muted">アカウントにログイン</small>
                                </li>
                                <li class="mb-2">
                                    <a href="/register" class="text-decoration-none">
                                        <i class="bi bi-person-plus"></i> 新規登録
                                    </a>
                                    <br><small class="text-muted">新しいアカウントを作成</small>
                                </li>
                                <li class="mb-2">
                                    <a href="/favourites" class="text-decoration-none">
                                        <i class="bi bi-heart"></i> お気に入り
                                    </a>
                                    <br><small class="text-muted">お気に入りの単語・フレーズ（要ログイン）</small>
                                </li>
                                <li class="mb-2">
                                    <a href="/user-menu" class="text-decoration-none">
                                        <i class="bi bi-person"></i> ユーザーメニュー
                                    </a>
                                    <br><small class="text-muted">アカウント設定（要ログイン）</small>
                                </li>
                            </ul> --}}
                            
                            <h3>ℹ️ サイト情報</h3>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="/about" class="text-decoration-none">
                                        <i class="bi bi-info-circle"></i> サイトについて
                                    </a>
                                    <br><small class="text-muted">サイトの目的と特徴</small>
                                </li>
                                <li class="mb-2">
                                    <a href="/contact" class="text-decoration-none">
                                        <i class="bi bi-envelope"></i> お問い合わせ
                                    </a>
                                    <br><small class="text-muted">ご質問・ご要望</small>
                                </li>
                                <li class="mb-2">
                                    <a href="/privacy-policy" class="text-decoration-none">
                                        <i class="bi bi-shield-check"></i> プライバシーポリシー
                                    </a>
                                    <br><small class="text-muted">個人情報の取り扱い</small>
                                </li>
                                <li class="mb-2">
                                    <a href="/terms-of-service" class="text-decoration-none">
                                        <i class="bi bi-file-text"></i> 利用規約
                                    </a>
                                    <br><small class="text-muted">サイト利用の条件</small>
                                </li>
                                <li class="mb-2">
                                    <a href="/sitemap" class="text-decoration-none">
                                        <i class="bi bi-diagram-3"></i> サイトマップ
                                    </a>
                                    <br><small class="text-muted">このページ</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h3>🔍 学習の進め方</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center p-3 border rounded">
                                <i class="bi bi-1-circle-fill text-primary" style="font-size: 2rem;"></i>
                                <h5 class="mt-2">基礎学習</h5>
                                <p class="small">単語とフレーズから始めましょう</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 border rounded">
                                <i class="bi bi-2-circle-fill text-success" style="font-size: 2rem;"></i>
                                <h5 class="mt-2">実践練習</h5>
                                <p class="small">クイズで理解度を確認</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 border rounded">
                                <i class="bi bi-3-circle-fill text-warning" style="font-size: 2rem;"></i>
                                <h5 class="mt-2">応用学習</h5>
                                <p class="small">動詞の活用をマスター</p>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h3>📱 外部リンク</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>開発者情報</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="https://github.com/FinleyCox" target="_blank" class="text-decoration-none">
                                        <i class="bi bi-github"></i> GitHub
                                    </a>
                                    <br><small class="text-muted">ソースコードとプロジェクト情報</small>
                                </li>
                                <li class="mb-2">
                                    <a href="https://qiita.com/_anonymous_dog_" target="_blank" class="text-decoration-none">
                                        <i class="bi bi-file-text"></i> Qiita
                                    </a>
                                    <br><small class="text-muted">技術記事とブログ</small>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>学習リソース</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <small class="text-muted">シチリア語に関する追加の学習リソースは、お問い合わせページからご相談ください。</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <p class="text-muted">効率的な学習のために、サイトマップを活用してください！</p>
                        <p class="text-muted"><em>Buona fortuna con il vostro studio del siciliano!</em></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
