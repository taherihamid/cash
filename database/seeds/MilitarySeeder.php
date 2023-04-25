<?php

use Illuminate\Database\Seeder;

class MilitarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Military_service_status::insert([
            ['id' => 1, 'name' => 'پایان خدمت'],
            ['id' => 2, 'name' => 'معاف'],
            ['id' => 3, 'name' => 'مشمول'],
        ]);
    }
}
