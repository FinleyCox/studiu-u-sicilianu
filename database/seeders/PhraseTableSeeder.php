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
        Phrase::query()->delete();

        $csvPath = database_path('seeders/phrases.csv');
        if (! file_exists($csvPath)) {
            throw new \RuntimeException(\"phrases.csv が見つかりません: {$csvPath}\");
        }

        if (($handle = fopen($csvPath, 'r')) === false) {
            throw new \RuntimeException(\"phrases.csv を開けませんでした: {$csvPath}\");
        }

        $header = fgetcsv($handle);
        $expectedHeader = ['japanese', 'sicilian'];
        if ($header === false || array_map('trim', $header) !== $expectedHeader) {
            fclose($handle);
            throw new \RuntimeException('phrases.csv のヘッダーが想定と異なります。');
        }

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) < 2 || trim($row[0]) === '') {
                continue;
            }

            [$japanese, $sicilian] = $row;
            Phrase::create([
                'japanese' => trim($japanese),
                'sicilian' => trim($sicilian),
            ]);
        }

        fclose($handle);
    }
}
