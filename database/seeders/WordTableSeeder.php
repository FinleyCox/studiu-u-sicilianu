<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Word;

class WordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 一度全削除
        Word::truncate();
        // 新しく入れる 1: objects,people 2:prepositions 3:verbs,adverbs,adjectives 4:directions 5:time 6:numbers
        // Word::create(['japanese' => '車', 'sicilian' => 'machina', 'category' => 1]);
        // Word::create(['japanese' => 'バイク', 'sicilian' => 'motu', 'category' => 1]);
        // Word::create(['japanese' => '電車', 'sicilian' => 'trenu', 'category' => 1]);
        // Word::create(['japanese' => '~と', 'sicilian' => 'cu / ca', 'category' => 2]);
        // Word::create(['japanese' => '今夜', 'sicilian' => 'stasira', 'category' => 5]);
        // Word::create(['japanese' => '午後の', 'sicilian' => 'i sira', 'category' => 5]);
        // Word::create(['japanese' => '美しい', 'sicilian' => 'beddu / bedda', 'category' => 3]);
        // Word::create(['japanese' => '残念ながら', 'sicilian' => 'sfortunatamente', 'category' => 3]);
        // Word::create(['japanese' => '夜の', 'sicilian' => 'buonanotti', 'category' => 5]);
        // Word::create(['japanese' => '寝る', 'sicilian' => 'dormiti', 'category' => 3]);
        // Word::create(['japanese' => '夢みる', 'sicilian' => 'sunnai', 'category' => 3]);
        // Word::create(['japanese' => '待つ', 'sicilian' => 'spettu', 'category' => 3]);
        // Word::create(['japanese' => 'キスする', 'sicilian' => 'vasari', 'category' => 3]);
        // Word::create(['japanese' => '君を', 'sicilian' => 'to', 'category' => 1]);
        // Word::create(['japanese' => '噛む', 'sicilian' => 'muzzicari', 'category' => 3]);
        // Word::create(['japanese' => '硬い', 'sicilian' => 'duru', 'category' => 3]);
        // Word::create(['japanese' => '顔', 'sicilian' => 'facci', 'category' => 1]);
        // Word::create(['japanese' => '1,1番目', 'sicilian' => 'unu, primu', 'category' => 6]);
        // Word::create(['japanese' => '2,2番目', 'sicilian' => 'dui, seccunu', 'category' => 6]);
        // Word::create(['japanese' => '3,3番目', 'sicilian' => 'tri, terzu', 'category' => 6]);
        // Word::create(['japanese' => '4,4番目', 'sicilian' => 'quattru, quartu', 'category' => 6]);
        // Word::create(['japanese' => '5,5番目', 'sicilian' => 'cincu, quintu', 'category' => 6]);
        // Word::create(['japanese' => '6,6番目', 'sicilian' => 'sei, sestu', 'category' => 6]);
        // Word::create(['japanese' => '7,7番目', 'sicilian' => 'setti, settimu', 'category' => 6]);
        // Word::create(['japanese' => '8,8番目', 'sicilian' => 'ottu, ottavu', 'category' => 6]);
        // Word::create(['japanese' => '9,9番目', 'sicilian' => 'novi, nonu', 'category' => 6]);
        // Word::create(['japanese' => '10,10番目', 'sicilian' => 'deci, decimu', 'category' => 6]);
        // Word::create(['japanese' => '11', 'sicilian' => 'unnici', 'category' => 6]);
        // Word::create(['japanese' => '12', 'sicilian' => 'dudici', 'category' => 6]);
        // Word::create(['japanese' => '13', 'sicilian' => 'tridici', 'category' => 6]);
        // Word::create(['japanese' => '14', 'sicilian' => 'quattrordici', 'category' => 6]);
        // Word::create(['japanese' => '15', 'sicilian' => 'chinnici', 'category' => 6]);
        // Word::create(['japanese' => '16', 'sicilian' => 'sidici', 'category' => 6]);
        // Word::create(['japanese' => '17', 'sicilian' => 'diciassetti', 'category' => 6]);
        // Word::create(['japanese' => '18', 'sicilian' => 'diciottu', 'category' => 6]);
        // Word::create(['japanese' => '19', 'sicilian' => 'diciannovi', 'category' => 6]);
        // Word::create(['japanese' => '20', 'sicilian' => 'vinti', 'category' => 6]);
        // Word::create(['japanese' => '21', 'sicilian' => 'vintiunu', 'category' => 6]);
        // Word::create(['japanese' => '22', 'sicilian' => 'vintidui', 'category' => 6]);
        // Word::create(['japanese' => '23', 'sicilian' => 'vintitri', 'category' => 6]);
        // Word::create(['japanese' => '30', 'sicilian' => 'trenta', 'category' => 6]);
        // Word::create(['japanese' => '40', 'sicilian' => 'quaranta', 'category' => 6]);
        // Word::create(['japanese' => '50', 'sicilian' => 'cinquanta', 'category' => 6]);
        // Word::create(['japanese' => '60', 'sicilian' => 'sissanta', 'category' => 6]);
        // Word::create(['japanese' => '70', 'sicilian' => 'sittanta', 'category' => 6]);
        // Word::create(['japanese' => '80', 'sicilian' => 'ottanta', 'category' => 6]);
        // Word::create(['japanese' => '90', 'sicilian' => 'novanta', 'category' => 6]);
        // Word::create(['japanese' => '100', 'sicilian' => 'centu', 'category' => 6]);
        // Word::create(['japanese' => '1000,1000番目', 'sicilian' => 'milli, milesimu', 'category' => 6]);
        // Word::create(['japanese' => '1001', 'sicilian' => 'milli unu', 'category' => 6]);
        // Word::create(['japanese' => '2000', 'sicilian' => 'dumila', 'category' => 6]);
        // Word::create(['japanese' => 'ここ', 'sicilian' => 'cca', 'category' => 4]);
        // Word::create(['japanese' => 'あそこ', 'sicilian' => 'dda', 'category' => 4]);
        // Word::create(['japanese' => 'これ', 'sicilian' => 'chistu, chista', 'category' => 4]);
        // Word::create(['japanese' => 'これら', 'sicilian' => 'chisti cca', 'category' => 4]);
        // Word::create(['japanese' => 'あれ', 'sicilian' => 'chiddu, chidda', 'category' => 4]);
        // Word::create(['japanese' => 'あれら', 'sicilian' => 'chiddi dda', 'category' => 4]);
        // Word::create(['japanese' => '真っ直ぐ', 'sicilian' => 'rittu', 'category' => 4]);
        // Word::create(['japanese' => '右', 'sicilian' => 'destra', 'category' => 4]);
        // Word::create(['japanese' => '左', 'sicilian' => 'sinistra', 'category' => 4]);
        // Word::create(['japanese' => '食べる', 'sicilian' => 'manciari', 'category' => 3]);
        // Word::create(['japanese' => '飲む', 'sicilian' => 'biviri', 'category' => 3]);
        // Word::create(['japanese' => '支払う', 'sicilian' => 'pagari', 'category' => 3]);
        // Word::create(['japanese' => '取る', 'sicilian' => 'pigghiari', 'category' => 3]);
        // Word::create(['japanese' => '欲しい、したい', 'sicilian' => 'voliri', 'category' => 3]);
        // Word::create(['japanese' => '理解する', 'sicilian' => 'capiri', 'category' => 3]);
        // Word::create(['japanese' => '持つ', 'sicilian' => 'aviri', 'category' => 3]);
        // Word::create(['japanese' => '行く', 'sicilian' => 'annari, jiri', 'category' => 3]);
    }
}
