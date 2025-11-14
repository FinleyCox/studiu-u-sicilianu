@extends('app')

@section('title', 'プライバシーポリシー - studiu u sicilianu')
@section('description', 'studiu u sicilianuのプライバシーポリシーです。個人情報の収集、利用、保護について詳しく説明しています。')
@section('keywords', 'シチリア語 プライバシーポリシー, Sicilian privacy policy')
@section('canonical', route('privacy-policy'))

@push('structured-data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'PrivacyPolicy',
    'url' => route('privacy-policy'),
    'name' => 'studiu u sicilianu privacy policy',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<div class="content-wide">
    <h1 class="mb-4">プライバシーポリシー</h1>
    <div class="card page-card">
        <div class="card-body">
                    <p class="text-muted">最終更新日: {{ date('Y年m月d日') }}</p>

                    <h4>1. はじめに</h4>
                    <p>studiu u sicilianu（以下「当サイト」）は、ユーザーの個人情報の保護を重要な責務と考え、以下のプライバシーポリシーに従って適切に取り扱います。</p>

                    <h4>2. 収集する情報</h4>
                    <h4>2.1 ユーザーが提供する情報</h4>
                    <ul>
                        <li>アカウント登録時のメールアドレス</li>
                        <li>ユーザー名</li>
                    </ul>

                    <h4>2.2 自動的に収集される情報</h4>
                    <ul>
                        <li>IPアドレス</li>
                        <li>ブラウザ情報</li>
                        <li>アクセス日時</li>
                        <li>ページビュー情報</li>
                        <li>クッキー情報</li>
                    </ul>

                    <h4>3. 情報の利用目的</h4>
                    <p>収集した情報は以下の目的で利用します：</p>
                    <ul>
                        <li>サービスの提供・運営</li>
                        <li>ユーザー認証</li>
                        <li>サイトの改善・分析</li>
                        <li>不正利用の防止</li>
                        <li>広告の配信（Google AdSense）</li>
                    </ul>

                    <h4>4. 第三者との情報共有</h4>
                    <p>当サイトは、以下の場合を除き、ユーザーの個人情報を第三者と共有することはありません：</p>
                    <ul>
                        <li>ユーザーの同意がある場合</li>
                        <li>法令に基づく場合</li>
                        <li>Google AdSenseなどの広告配信サービス（匿名化された情報のみ）</li>
                    </ul>

                    <h4>5. クッキーの使用</h4>
                    <p>当サイトでは、以下の目的でクッキーを使用します：</p>
                    <ul>
                        <li>ユーザー認証の維持</li>
                        <li>サイトの利用状況の分析</li>
                        <li>広告の配信</li>
                        <li>ユーザー体験の向上</li>
                    </ul>
                    <p>ブラウザの設定でクッキーを無効にすることができますが、一部の機能が利用できなくなる場合があります。</p>

                    <h4>6. Google AdSenseについて</h4>
                    <p>当サイトでは、Google AdSenseを使用して広告を配信しています。Google AdSenseは、ユーザーの興味に基づいた広告を表示するためにクッキーを使用します。</p>
                    <p>Google AdSenseのクッキーを無効にするには、<a href="https://www.google.com/settings/ads" target="_blank">Google広告設定</a>にアクセスしてください。</p>

                    <h4>7. データの保存期間</h4>
                    <p>ユーザーの個人情報は、アカウントが削除されるまで保存されます。アカウント削除後は、適切な期間内に削除します。</p>

                    <h4>8. データの保護</h4>
                    <p>当サイトは、ユーザーの個人情報を適切に保護するため、適切なセキュリティ対策を講じています。</p>

                    <h4>9. ユーザーの権利</h4>
                    <p>ユーザーは以下の権利を有します：</p>
                    <ul>
                        <li>個人情報の開示請求</li>
                        <li>個人情報の訂正・削除請求</li>
                        <li>アカウントの削除</li>
                    </ul>

                    <h4>10. プライバシーポリシーの変更</h4>
                    <p>当サイトは、必要に応じてプライバシーポリシーを変更する場合があります。重要な変更がある場合は、サイト上で通知します。</p>

                    <h4>11. お問い合わせ</h4>
                    <p>プライバシーポリシーに関するお問い合わせは、<a href="/contact">お問い合わせページ</a>からご連絡ください。</p>
        </div>
    </div>
</div>
@endsection
