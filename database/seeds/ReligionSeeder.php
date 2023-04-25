<?php

use App\Cult;
use App\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        Religion::insert([
                ['id' => '1','name' => 'اسلام'],
                ['id' => '2','name' => 'مسیحیت'],
                ['id' => '3','name' => 'یهودی'],
                ['id' => '4','name' => 'و غیره'],
            ]
        );

            Cult::insert([
                ['religion_id'=> '1', 'name' => 'شیعه'],
                ['religion_id'=> '1', 'name' => 'شیعه'],
                ['religion_id'=> '2', 'name' => 'کاتولیک'],
                ['religion_id'=> '2', 'name' => 'پروتستان'],
            ]);
    }
}
