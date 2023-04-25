<?php

use App\Diploma;
use Illuminate\Database\Seeder;

class DiplomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Diploma::insert([
            ['id' => 1, 'name' => 'ریاضی'],
            ['id' => 2, 'name' => 'تجربی'],
            ['id' => 3, 'name' => 'فنی حرفه ای'],
            ['id' => 4, 'name' => 'کاردانش'],
        ]);
    }
}
