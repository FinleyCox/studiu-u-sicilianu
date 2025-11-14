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
        // Word::truncate();
        Word::query()->delete();

        $csvPath = database_path('seeders/words.csv');
        if (! file_exists($csvPath)) {
            throw new \RuntimeException("words.csv が見つかりません: {$csvPath}");
        }

        // 1行ずつ読み込みながら登録 (大きなCSVでもメモリを圧迫しない)
        if (($handle = fopen($csvPath, 'r')) === false) {
            throw new \RuntimeException("words.csv を開けませんでした: {$csvPath}");
        }

        $header = fgetcsv($handle);
        $expectedHeader = ['japanese', 'sicilian', 'category'];
        if ($header === false || array_map('trim', $header) !== $expectedHeader) {
            fclose($handle);
            throw new \RuntimeException('words.csv のヘッダーが想定と異なります。');
        }

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) < 3 || trim($row[0]) === '') {
                continue; // 空行などは無視
            }

            [$japanese, $sicilian, $category] = $row;
            Word::create([
                'japanese' => trim($japanese),
                'sicilian' => trim($sicilian),
                'category' => (int) trim($category),
            ]);
        }

        fclose($handle);
    }
}
