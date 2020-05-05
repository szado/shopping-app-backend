<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Karty graficzne',
            'Procesory',
            'Płyty główne',
            'Pamięci RAM',
            'Obudowy',
            'Zasilacze',
            'Dyski SSD',
            'Dyski HDD',
            'Chłodzenie CPU'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
