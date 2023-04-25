<?php

use App\Quota;
use Illuminate\Database\Seeder;

class QuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quota::insert([
            ['id'=> '1', 'name' => 'آزاد'],
            ['id'=> '2', 'name' => 'خانواده شهید'],
            ['id'=> '3', 'name' => 'جانباز'],
        ]);
    }
}
