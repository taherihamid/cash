<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    protected $toTruncate =
        [
            'genders', 'religions', 'cults', 'cities', 'provinces',
            'physical_condition', 'military_service_status', 'quotas',
            'diploma', 'nationalities', 'majors'
        ];

    public function run()
    {

//        foreach ($this->toTruncate as $table) {
//            DB::table($table)->truncate();
//        }
//
//        factory(\App\Announcement::class, 15)->create();
//        factory(\App\Major::class, 10)->create();
//
//        $this->call(DiplomaSeeder::class);
//        $this->call(CitiesSeeder::class);
//        $this->call(GenderSeeder::class);
//        $this->call(ReligionSeeder::class);
//        $this->call(PhysicalSeeder::class);
//        $this->call(MilitarySeeder::class);
//        $this->call(QuotaSeeder::class);
//        $this->call(NationalitySeeder::class);
//        $this->call(SystemSeeder::class);
        $this->call(InvoiceSeeder::class);

    }
}
