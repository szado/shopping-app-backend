<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offers')->insert([
            'category_id' => 1,
            'customer_id' => 1,
            'title' => 'GeForce RTX 2080TI 12GB RAM',
            'description' => 'Super wydajna karta ze wszystkim',
            'price' => 5800.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('offers')->insert([
            'category_id' => 1,
            'customer_id' => 1,
            'title' => 'GeForce RTX 2070 TI 8GB RAM',
            'description' => 'Wydajna karta',
            'price' => 2500.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('offers')->insert([
            'category_id' => 1,
            'customer_id' => 1,
            'title' => 'RTX 2060 6GB RAM',
            'description' => 'Karta graficzna dla mniej wymagających',
            'price' => 1749.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('offers')->insert([
            'category_id' => 2,
            'customer_id' => 2,
            'title' => 'Ryzen 3800X',
            'description' => '8 rdzeni 16 wątkow',
            'price' => 1500.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('offers')->insert([
            'category_id' => 2,
            'customer_id' => 3,
            'title' => 'Intel Core i7 9700K',
            'description' => '8 rdzeni 16 wątków',
            'price' => 1849.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('offers')->insert([
            'category_id' => 4,
            'customer_id' => 3,
            'title' => 'Pamięć RAM 16GB 3600mhz',
            'description' => 'CL32 szybka pamięc',
            'price' => 389.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('offers')->insert([
            'category_id' => 4,
            'customer_id' => 4,
            'title' => 'Pamięć RAM 32GB 2800mhz',
            'description' => 'Pamięć CL30 z taktowanie 2800mhz',
            'price' => 749.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
