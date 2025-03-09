<template>
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
</template>
<script>
    export default {
        name: "Conjugation"
    }
</script>

<style scoped>
    .table-container {
        background-color: #fff;
        display: flex;
        justify-content: space-around;
    }
    /* 太字にする */
    th, td {
        font-weight: bold;
        font-size: 24px;
    }
    /* ボーダー */
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
    .usage-container {
        text-align: left;
    }
    .back-container {
        text-align: center;
    }
</style>
