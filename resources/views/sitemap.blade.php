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
<div class="content-wide">
    <h1 class="mb-4">サイトマップ</h1>
    <div class="card page-card">
        <div class="card-body">
                    <p class="mb-4">studiu u sicilianuの全ページを一覧でご確認いただけます。</p>

                    <div class="row">
                        <div class="col-md-6">
                            <h4>メインページ</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="{{ route('home') }}" class="text-decoration-none">
                                        ホーム
                                    </a>
                                </li>
                            </ul>

                            <h4>学習コンテンツ</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="{{ route('words') }}" class="text-decoration-none">
                                        単語
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('words-contains') }}" class="text-decoration-none">
                                        単語検索
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('phrases') }}" class="text-decoration-none">
                                        フレーズ
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('quiz') }}" class="text-decoration-none">
                                        クイズ
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('conjugation') }}" class="text-decoration-none">
                                        動詞の活用
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <h4>サイト情報</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="{{ route('about') }}" class="text-decoration-none">
                                        サイトについて
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('contact') }}" class="text-decoration-none">
                                        お問い合わせ
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('privacy-policy') }}" class="text-decoration-none">
                                        プライバシーポリシー
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('terms-of-service') }}" class="text-decoration-none">
                                        利用規約
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('sitemap') }}" class="text-decoration-none">
                                        サイトマップ
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection
