@extends('app')

@section('title', 'サイトについて - studiu u sicilianu')
@section('description', 'studiu u sicilianuについて詳しく紹介します。シチリア語学習サイトの目的、特徴、学習コンテンツ、今後の予定などを説明しています。')
@section('keywords', 'studiu u sicilianu とは, シチリア語 サイト概要, Sicilian language project')
@section('canonical', route('about'))

@push('structured-data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'url' => route('about'),
    'name' => 'About studiu u sicilianu',
    'description' => 'シチリア語学習サイトの目的と特徴',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<div class="content-wide">
    <h1 class="mb-4">studiu u sicilianu について</h1>
    <div class="card page-card">
        <div class="card-body">
                    <h2>サイトの目的</h2>
                    <p>
                        studiu u sicilianuは「シチリア語を勉強する」という意味。<br>
                        シチリア語を学びたい方のための学習支援サイトです。今では話す人も少なくなっている言語ですがシチリアルーツの米国人の中には学びたいと考えている人が少なくありません。<br>
                        また、私は日本人ですが今回シチリア語を学びたい！と考えた時、日本語での学習リソースが非常に少ないことに気づきました。<br>
                        なので自分が学んだことを人にも知ってもらって、どんどん使ってもらおう！と思い立ちこのサイトを作成しました
                    </p>

                    <h2>なぜシチリア語?</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>貴重な言語であるため</h3>
                            <p>シチリア語は、ユネスコの「消滅の危機にある言語」に分類されており次世代に残すべき貴重な文化的遺産です。</p>
                        </div>
                        <div class="col-md-6">
                            <h3>独特な文化</h3>
                            <p>
                                カンノーリを初めて食べたことからシチリアに興味を持ち、<br>
                                シチリアについて調べているうちにこの地域特有の言語がある（今ではあまり話されてないが）と知ったことがきっかけです
                            </p>
                        </div>
                    </div>

                    <h2>サイトの特徴</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center mb-3">
                                <i class="bi bi-book-fill text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h4>体系的学習</h4>
                            <p>単語、フレーズ、動詞の活用など、段階的に学習できる構成になっています。</p>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center mb-3">
                                <i class="bi bi-question-circle-fill text-success" style="font-size: 2rem;"></i>
                            </div>
                            <h4>インタラクティブ</h4>
                            <p>クイズ形式で楽しく学習でき、理解度を確認しながら進められます。</p>
                        </div>
                    </div>

                    <h2>学習コンテンツ</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>単語学習</h3>
                            <p>日常でよく使われるシチリア語の単語を、日本語と対照して学習できます。発音記号も併記しています。</p>
                        </div>
                        <div class="col-md-6">
                            <h3>フレーズ学習</h3>
                            <p>実際の会話で使える実用的なフレーズを、シチリア語と日本語で学習できます。</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h3>動詞の活用</h3>
                            <p>シチリア語の動詞の活用を規則動詞と不規則動詞に分けて学習できます。</p>
                        </div>
                        <div class="col-md-6">
                            <h3>クイズ機能</h3>
                            <p>学習した内容をクイズ形式で復習し、理解度を確認できます。</p>
                        </div>
                    </div>

                    <h2>技術について</h2>
                    <p>このサイトは以下の技術を使用して構築されています（2025-11-14現在）：</p>
                    <ul>
                        <li><strong>バックエンド:</strong> Laravel 11 (PHP)</li>
                        <li><strong>フロントエンド:</strong> Vue.js 3, Bootstrap 5</li>
                        <li><strong>データベース:</strong> SQLite</li>
                        <li><strong>デプロイ:</strong> Render (Docker)</li>
                    </ul>

                    <h2>今後の予定</h2>
                    <p>サイトは継続的に改善・拡張を予定しています：</p>
                    <ul>
                        <li>より多くの単語・フレーズの追加</li>
                        <li>文法解説の充実</li>
                        <li>モバイルアプリの開発</li>
                    </ul>

                    <h2>作者について</h2>
                    <div class="card bg-light">
                        <div class="card-body">
                            <h4>Ai Nakajima</h4>
                            <p>言語が大好きでプログラミングと語学学習の両方に情熱を注いでいます！！あと犬も好きです</p>
                            <div class="d-flex gap-3">
                                <a href="https://github.com/FinleyCox" target="_blank" class="btn btn-outline-dark">
                                    <i class="bi bi-github"></i> GitHub
                                </a>
                                <a href="https://qiita.com/_anonymous_dog_" target="_blank" class="btn btn-outline-primary">
                                    <i class="bi bi-file-text"></i> Qiita
                                </a>
                            </div>
                        </div>
                    </div>

                    <h2>お問い合わせ</h2>
                    <p>サイトに関するご質問、ご意見・ご要望等がございましたら<a href="/contact">お問い合わせページ</a>からお気軽にご連絡ください。</p>

                    <div class="text-center mt-4">
                        <p class="text-muted"><em>Insiemi, esploriamo il bellissimo mondo della lingua siciliana!</em></p>
                    </div>
        </div>
    </div>
</div>
@endsection
