<?php

use App\Form;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Form::insert([
            [
                'id' => 1,
                'name'          => 'user_form',
                'label'         => 'صفحه ثبت‌نام کاربران',
                'created_at'    =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'    =>'127.0.0.1',
                'creator_id'    =>\App\Admin::SEEDER_ID,
            ],
        ]);
    }
}
