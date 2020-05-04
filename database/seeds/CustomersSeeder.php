<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'nickname' => 'janusz_parawan',
                'first_name' => 'Janusz',
                'last_name' => 'Parawan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nickname' => 'tester',
                'first_name' => 'Adam',
                'last_name' => 'Tester',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nickname' => 'jw420',
                'first_name' => 'Jakub',
                'last_name' => 'Wolfram',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nickname' => 'pudzian180',
                'first_name' => 'Mariusz',
                'last_name' => 'Pudzianowski',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nickname' => 'lipton',
                'first_name' => 'Tech',
                'last_name' => 'Lipton',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        DB::table('customers')->insert($customers);
    }
}
