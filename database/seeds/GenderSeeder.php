<?php

use App\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::insert([
            ['id' => 1, 'name' => 'آقا'],
            ['id' => 2, 'name' => 'خانم'],
        ]);
    }
}
