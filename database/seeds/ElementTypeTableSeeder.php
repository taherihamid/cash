<?php

use Illuminate\Database\Seeder;
use App\ElementType;

class ElementTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $element_types = [
            [
                'id'                =>1,
                'name'              => 'text',
                'has_default_value' => false,
                'created_at'        =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'        =>'127.0.0.1',
                'creator_id'        =>\App\Admin::SEEDER_ID,
            ],
            [
                'id'                =>2,
                'name'              => 'text_area',
                'has_default_value' => false,
                'created_at'        =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'        =>'127.0.0.1',
                'creator_id'        =>\App\Admin::SEEDER_ID,
            ],
            [
                'id'                =>3,
                'name'              => 'password',
                'has_default_value' => false,
                'created_at'        =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'        =>'127.0.0.1',
                'creator_id'        =>\App\Admin::SEEDER_ID,
            ],
            [
                'id'                =>4,
                'name'              => 'hidden',
                'has_default_value' => false,
                'created_at'        =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'        =>'127.0.0.1',
                'creator_id'        =>\App\Admin::SEEDER_ID,
            ],
            [
                'id'                =>5,
                'name'              => 'checkbox',
                'has_default_value' => true,
                'created_at'        =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'        =>'127.0.0.1',
                'creator_id'        =>\App\Admin::SEEDER_ID,
            ],
            [
                'id'                =>6,
                'name'              => 'radio',
                'has_default_value' => true,
                'created_at'        =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'        =>'127.0.0.1',
                'creator_id'        =>\App\Admin::SEEDER_ID,
            ],
            [
                'id'                =>7,
                'name'              => 'file',
                'has_default_value' => false,
                'created_at'        =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'        =>'127.0.0.1',
                'creator_id'        =>\App\Admin::SEEDER_ID,
            ],
            [
                'id'                =>8,
                'name'              => 'number',
                'has_default_value' => false,
                'created_at'        =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'        =>'127.0.0.1',
                'creator_id'        =>\App\Admin::SEEDER_ID,
            ],
            [
                'id'                =>9,
                'name'              => 'select',
                'has_default_value' => true,
                'created_at'        =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'        =>'127.0.0.1',
                'creator_id'        =>\App\Admin::SEEDER_ID,
            ],
            [
                'id'                =>10,
                'name'              => 'datetime',
                'has_default_value' => false,
                'created_at'        =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'        =>'127.0.0.1',
                'creator_id'        =>\App\Admin::SEEDER_ID,
            ],
            [
                'id'                =>11,
                'name'              => 'nested select',
                'has_default_value' => true,
                'created_at'        =>\Carbon\Carbon::now()->toDateString(),
                'creator_ip'        =>'127.0.0.1',
                'creator_id'        =>\App\Admin::SEEDER_ID,
            ]
        ];

        ElementType::insert($element_types);

    }
}
