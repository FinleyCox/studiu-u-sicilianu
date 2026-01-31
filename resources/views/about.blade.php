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
    <div class="card page-card">
        <div class="card-body">
                    <h4>サイトの目的</h4>
                    <p>
                        studiu u sicilianuは「シチリア語を勉強する」という意味。<br>
                        シチリア語を学びたい方のための学習支援サイトです。今では話す人も少なくなっている言語ですがシチリアルーツの米国人の中には祖父母の母語を学びたいと考えている人が少なくないとよく聞きます。<br>
                        私は日本人ですが今回シチリア語を学びたい！と思い立った時に日本語での学習リソースがほんとうに少ないことに気づきました。<br>
                        なので自分が学び、楽しい！と思ったことを皆さんにも感じてほしいと思い立ちこのサイトを作成しました
                    </p>
                    <br>
                    <h4>なぜシチリア語?</h4>
                        <p>
                            カンノーリを食べたことからシチリアに興味を持ち、<br>
                            シチリアについて調べているうちにこの地域特有の言語があると知ったことがきっかけです。<br>日本で言うと琉球語のようなものなのかな・・・？
                        </p>
                    <br>

                    <h4>学習コンテンツ</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>単語学習</h5>
                            <p>日常でよく使われるシチリア語の単語</p>
                        </div>
                        <div class="col-md-6">
                            <h5>フレーズ学習</h5>
                            <p>実際の会話で使える実用的なフレーズ</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h5>動詞の活用</h5>
                            <p>動詞の活用を規則動詞と不規則動詞に分けて学習できます。<br>
                                個人的にかなりつまづいています
                            </p>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <h5>クイズ機能</h5>
                            <p>単語クイズを作ってみました</p>
                        </div>
                    </div>

                    <!-- <h4>今後の予定</h4>
                    <p>サイトは継続的に改善・拡張を予定しています：</p>
                    <ul>
                        <li>より多くの単語・フレーズの追加</li>
                        <li>文法解説の充実</li>
                        <li>モバイルアプリの開発</li>
                    </ul> -->

                    <h4>作者について</h4>
                    <div class="card page-card">
                        <div class="card-body">
                            <h4>FinleyCox</h4>
                            <p>言語が大好きでプログラミングと語学学習の両方に情熱を注いでいます！！あと犬も好きです</p>
                        </div>
                    </div>

                    <h4>お問い合わせ</h4>
                    <p>サイトに関するご質問、ご意見・ご要望等がございましたら<a href="{{ route('contact') }}">お問い合わせページ</a>からお気軽にご連絡ください。</p>
        </div>
    </div>
</div>
@endsection
