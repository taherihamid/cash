<?php

use App\Physical_condition;
use Illuminate\Database\Seeder;

class PhysicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Physical_condition::insert([
            ['id' => 1, 'name' => 'سالم'],
            ['id' => 2, 'name' => 'ناسالم'],
        ]);
    }
}
