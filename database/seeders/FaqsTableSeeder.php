<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'id' => '1',
            'question' => 'how can i book a room.',
            'answer' => 'It is very simple process. create an account here and click book now button which room you choice here.'
        ]);

        Faq::create([
            'id' => '2',
            'question' => 'how can i book a room.',
            'answer' => 'Sorry, We will update it very soon.'
        ]);

        Faq::create([
            'id' => '3',
            'question' => 'how can i book a room.',
            'answer' => 'It is very simple process. create an account here and click book now button which room you choice here.'
        ]);
    }
}
