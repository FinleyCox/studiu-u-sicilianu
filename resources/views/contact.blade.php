@extends('app')

@section('title', 'お問い合わせ - studiu u sicilianu')
@section('description', 'studiu u sicilianuに関するご質問、ご意見、ご要望はこちらからお問い合わせください。学習内容、バグ報告、機能要望などを受け付けています。')
@section('keywords', 'シチリア語 お問い合わせ, Sicilian contact, studiu u sicilianu support')
@section('canonical', route('contact'))

@push('structured-data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'ContactPage',
    'url' => route('contact'),
    'description' => 'studiu u sicilianuへの問い合わせ窓口',
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'contactType' => 'customer support',
        'email' => 'inter0370@gmail.com',
        'areaServed' => 'JP',
        'availableLanguage' => ['ja', 'it'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="mb-4">お問い合わせ</h1>
            
            <div class="card">
                <div class="card-body">
                    <p class="mb-4">studiu u sicilianuに関するご質問、ご意見、ご要望がございましたら、お気軽にお問い合わせください。</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h3>📧 メールでのお問い合わせ</h3>
                            <p>以下のメールアドレスまでご連絡ください：</p>
                            <div class="alert alert-info">
                                <strong>inter0370@gmail.com</strong>
                            </div>
                            <p class="small text-muted">
                                お問い合わせの際は、以下の情報を含めてください：<br>
                                • お名前（ハンドルネーム可）<br>
                                • お問い合わせの種類<br>
                                • 詳細な内容
                            </p>
                        </div>
                        
                        <div class="col-md-6">
                            <h3>💬 お問い合わせの種類</h3>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="bi bi-question-circle text-primary"></i>
                                    <strong> 学習内容について</strong><br>
                                    <small class="text-muted">単語、フレーズ、文法に関する質問</small>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-bug text-warning"></i>
                                    <strong> バグ報告</strong><br>
                                    <small class="text-muted">サイトの不具合やエラーの報告</small>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-lightbulb text-success"></i>
                                    <strong> 機能要望</strong><br>
                                    <small class="text-muted">新しい機能や改善の提案</small>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-heart text-danger"></i>
                                    <strong> その他</strong><br>
                                    <small class="text-muted">感想、励ましのメッセージなど</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h3>⏰ 返信について</h3>
                    <div class="alert alert-light">
                        <ul class="mb-0">
                            <li>通常、2-3営業日以内に返信いたします</li>
                            <li>内容によっては、返信までにお時間をいただく場合があります</li>
                            <li>迷惑メールフィルターの設定により、返信が届かない場合があります</li>
                            <li>緊急の場合は、件名に「【緊急】」と記載してください</li>
                        </ul>
                    </div>
                    
                    {{-- よくある質問 --}}
                    <h3>📋 よくある質問</h3>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                    Q. アカウント登録は必要ですか？
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    アカウント登録はありません。
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                    Q. モバイルアプリはありますか？
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    現在はウェブサイトのみですが、モバイルアプリの開発も検討中です。
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                    Q. コンテンツの追加予定はありますか？
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    はい、定期的に新しい単語、フレーズ、学習コンテンツを追加しています。
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h3>🔗 関連リンク</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><a href="/about" class="text-decoration-none">サイトについて</a></li>
                                <li><a href="/privacy-policy" class="text-decoration-none">プライバシーポリシー</a></li>
                                <li><a href="/terms-of-service" class="text-decoration-none">利用規約</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><a href="https://github.com/FinleyCox" target="_blank" class="text-decoration-none">GitHub</a></li>
                                <li><a href="https://qiita.com/_anonymous_dog_" target="_blank" class="text-decoration-none">Qiita</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <p class="text-muted">皆様からのご意見・ご要望をお待ちしております！</p>
                        <p class="text-muted"><em>Grazie per il vostro interesse in studiu u sicilianu!</em></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
