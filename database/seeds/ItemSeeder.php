<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => str_random(255),
            'phone' => mt_rand(1234567890, 9999999999),
            'key' => str_random(25)
        ]);
    }
}
