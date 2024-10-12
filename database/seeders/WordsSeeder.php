<?php

namespace Database\Seeders;

use App\Models\Word;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Word::create([
                'course_id' => 'course ' . $i,
                'type_of_word' => 'type' . $i ,
                'meaning_of_word' => 'meaning' . $i,
                'transcription'=>$i,
                'url_image_word' => $i,
            ]);
        }
    }
}
