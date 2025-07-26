<?php

namespace Database\Seeders;

use App\Models\Phrase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhraseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Phrase::create(['japanese' => '食べましょう', 'sicilian' => 'manciamu']);
        Phrase::create(['japanese' => '私は...', 'sicilian' => 'io sugnu...']);
        Phrase::create(['japanese' => '私は...(する)', 'sicilian' => 'lo fazzu u/a...']);
        Phrase::create(['japanese' => '私はシチリア語を話します', 'sicilian' => 'Parri sicilianu']);
        Phrase::create(['japanese' => '私は英語を学びます', 'sicilian' => 'studiu u sicilianu']);
        Phrase::create(['japanese' => 'カルメーラとガブリエレはいますか', 'sicilian' => 'Ci sunnu Carmela e Gabriele?']);
        Phrase::create(['japanese' => 'カルメーラはいますか', 'sicilian' => 'C\'e Carmela?']);
        Phrase::create(['japanese' => '（あなたには）関係ありませんよ', 'sicilian' => 'non sonnu fatti to']);
        Phrase::create(['japanese' => 'この人たちは誰ですか？', 'sicilian' => 'cu su sti cristiani?']);
        Phrase::create(['japanese' => 'ここにいるこの人（男性）は', 'sicilian' => 'Chistu cca e...']);
        Phrase::create(['japanese' => 'ここにいるこの人（女性）は', 'sicilian' => 'Chista cca e...']);
        Phrase::create(['japanese' => 'これらは私のいとこたちです', 'sicilian' => 'Chisti su i me cucini']);
        Phrase::create(['japanese' => 'これは私のいとこです', 'sicilian' => 'Chistu e me cucinu']);
        Phrase::create(['japanese' => 'これは私のいとこのマッテオです', 'sicilian' => 'Iddu e me cucinu Matteo']);
        Phrase::create(['japanese' => 'あなたは寝ないといけません', 'sicilian' => 'Ta gghiri a curcari']);
        Phrase::create(['japanese' => '寝てください', 'sicilian' => 'Va curchiti']);
        Phrase::create(['japanese' => 'これから寝ますか？', 'sicilian' => 'Ti sta ennu a curcari?']);
        Phrase::create(['japanese' => '以前あったことがありますか？', 'sicilian' => 'Ncuntrammu?']);
        Phrase::create(['japanese' => '私も', 'sicilian' => 'puru io']);
        Phrase::create(['japanese' => 'もちろん', 'sicilian' => 'certo']);
        Phrase::create(['japanese' => 'いいね！', 'sicilian' => 'cetto!']);
        Phrase::create(['japanese' => 'こっそり、秘密に', 'sicilian' => 'ammucciuni']);
        Phrase::create(['japanese' => '早く！', 'sicilian' => 'spirugghjati']);
        Phrase::create(['japanese' => 'わかりません', 'sicilian' => 'non ti capiu']);
        Phrase::create(['japanese' => '...に...をかける', 'sicilian' => 'misi...cu(ca)']);
        Phrase::create(['japanese' => '残念ながら寝てません', 'sicilian' => 'pirchi nunnaiu durmutu']);
        Phrase::create(['japanese' => '寝ないといけません', 'sicilian' => 'aiu a dommiri']);
        Phrase::create(['japanese' => '問題ない', 'sicilian' => 'di nienti']);
        Phrase::create(['japanese' => '見せて', 'sicilian' => 'fammi viriri']);
        Phrase::create(['japanese' => '行きましょう！', 'sicilian' => 'iamu']);
        Phrase::create(['japanese' => '知ってる？ / 知ってるよ', 'sicilian' => 'U sai / U sacciu']);
        Phrase::create(['japanese' => 'みて！', 'sicilian' => 'Talia!']);
        Phrase::create(['japanese' => '次の〇〇はいつですか？', 'sicilian' => 'Quannu e u prossimu...']);
        Phrase::create(['japanese' => '今夜誰がきますか？', 'sicilian' => 'Cu veni stasira?']);
    }
}
