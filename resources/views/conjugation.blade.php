@extends('app')

@section('title', '動詞の活用 - studiu u sicilianu')
@section('description', '規則動詞と不規則動詞のシチリア語活用表をまとめました。日常でよく使う動詞の語尾変化を一覧で確認できます。')
@section('keywords', 'シチリア語 動詞活用, Sicilian conjugation, シチリア語 文法')
@section('canonical', route('conjugation'))

@push('structured-data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'DefinedTermSet',
    'name' => 'Sicilian Verb Conjugations',
    'url' => route('conjugation'),
    'inLanguage' => 'scn',
    'hasDefinedTerm' => [
        ['@type' => 'DefinedTerm', 'name' => 'Annari / Jiri', 'description' => '行く (to go) の活用'],
        ['@type' => 'DefinedTerm', 'name' => 'Aviri', 'description' => '持つ (to have) の活用'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<link href="/css/conjugation.css" rel="stylesheet">
<div class="table-container">
    <!-- 動詞の基本形 -->
    <div class="table-group">
        <table class="table-fixed">
            <thead>
            <tr>
                <th>Verb(basics)</th>
                <th>-ari</th>
                <th>-iri</th>
                <th>-iri</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>io</td>
                <td>-u</td>
                <td>-u</td>
                <td>-sciu</td>
            </tr>
            <tr>
                <td>tu</td>
                <td>-i</td>
                <td>-i</td>
                <td>-sci</td>
            </tr>
            <tr>
                <td>iddu / idda</td>
                <td>-a</td>
                <td>-i</td>
                <td>-sci</td>
            </tr>
            <tr>
                <td>nui</td>
                <td>-amu</td>
                <td>-emu</td>
                <td>-emu</td>
            </tr>
            <tr>
                <td>vui</td>
                <td>-ati</td>
                <td>-iti</td>
                <td>-iti</td>
            </tr>
            <tr>
                <td>iddi</td>
                <td>-unu</td>
                <td>-unu</td>
                <td>-sciunu</td>
            </tr>
            </tbody>
        </table>
        <div class="usage-container">
            <p style="font-weight: bold">使用方法</p>
            <p>io maciu, tu manci</p>
            <p>nui pigghiamu, iddi pigghiunu</p>
        </div>
    </div>

    <!-- 不規則に変化するもの -->
    <div class="table-group">
        <table class="table-fixed">
            <thead>
            <tr>
                <th>Annari / Jiri(to go)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>io</td>
                <td>vaju</td>
            </tr>
            <tr>
                <td>tu</td>
                <td>vai</td>
            </tr>
            <tr>
                <td>iddu / idda</td>
                <td>va</td>
            </tr>
            <tr>
                <td>nui</td>
                <td>annamu / jemu</td>
            </tr>
            <tr>
                <td>vui</td>
                <td>annati / jiti</td>
            </tr>
            <tr>
                <td>iddi</td>
                <td>vannu</td>
            </tr>
            </tbody>
        </table>
        <div class="usage-container">
            <p style="font-weight: bold">使用方法</p>
            <p>Comu vaju?</p>
            <p>Vennerdi vaju a Palermu</p>
        </div>
    </div>

    <!-- 不規則に変化するもの　その２ -->
    <div class="table-group">
        <table class="table-fixed">
            <thead>
            <tr>
                <th>Aviri(to have)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>io</td>
                <td>aiu</td>
            </tr>
            <tr>
                <td>tu</td>
                <td>hai</td>
            </tr>
            <tr>
                <td>iddu / idda</td>
                <td>ha / avi</td>
            </tr>
            <tr>
                <td>nui</td>
                <td>avemu</td>
            </tr>
            <tr>
                <td>vui</td>
                <td>aviti</td>
            </tr>
            <tr>
                <td>iddi</td>
                <td>hannu</td>
            </tr>
            </tbody>
        </table>
        <div class="usage-container">
            <p style="font-weight: bold">使用方法</p>
            <p>Quanti anni hai? </p>
            <p>Aiu 28(vinti ottu) hanni</p>
        </div>
    </div>
</div>
@endsection 
