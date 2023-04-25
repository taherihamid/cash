<?php

use App\Nationality;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nationality::insert([
            ['id' => 1, 'name' => 'ایرانی'],
            ['id' => 2, 'name' => 'غیر ایرانی'],
        ]);
    }
}
