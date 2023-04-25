<?php

use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
           [
               'id'           =>1,
               'position'     =>1,
               'title'        => 'تماس تلفنی',
               'description'  => 'در صورت مواجه شدن با هرگونه مشکل، می‌توانید در روزهای شنبه تا چهارشنبه از ساعت ۸:۰۰ صبح الی ۱۲:۰۰ و ۱۳:۰۰ الی ۱۶:۰۰ با شماره تلفن گویای مرکز سنجش و پذیرش تماس حاصل فرمایید.',
               'link_text'    =>'تلفن گویا: ۴۷۴۳ - ۰۲۱',
               'link_url'     =>null,
               'created_at'   =>\Carbon\Carbon::now()->toDateString(),
               'creator_ip'   =>'127.0.0.1',
               'creator_id'   =>\App\Admin::SEEDER_ID,
               'deleter_ip'   =>null,
               'updater_ip'   =>null,
               'updater_id'   =>null,
               'deleter_id'   =>null,
               'updated_at'   =>null,
               'deleted_at'   =>null,
           ],
           [
               'id'           =>2,
               'position'     =>2,
               'title'        => 'ارتباط اینترنتی (سامانه پرسش و پاسخ)',
               'description'  => 'داوطلب گرامی درصورت طرح سوال در این قسمت، پس از گذشت حداکثر ۷۲ ساعت اداری می‌توانید پاسخ خود را دریافت نمایید.',
               'link_text'    =>'ورود به سامانه پرسش و پاسخ',
               'link_url'     =>'http://iauec.ac.ir/administrative-and-financial/%D9%BE%D8%B1%D8%B3%D8%B4-%D9%88-%D9%BE%D8%A7%D8%B3%D8%AE/',
               'created_at'        =>\Carbon\Carbon::now()->toDateString(),
               'creator_ip'        =>'127.0.0.1',
               'creator_id'        =>\App\Admin::SEEDER_ID,
               'deleter_ip'        =>null,
               'updater_ip'        =>null,
               'updater_id'        =>null,
               'deleter_id'        =>null,
               'updated_at'        =>null,
               'deleted_at'        =>null,
           ],
           [
               'id'           =>3,
               'position'     =>3,
               'title'        => 'مراجعه حضوری',
               'description'  => 'در صورت مواجه شدن با هرگونه مشکل، می‌توانید در روزهای شنبه تا چهارشنبه از ساعت ۸:۰۰ صبح الی ۱۲:۳۰ و ۱۳:۳۰ الی ۱۶:۰۰ به مرکز سنجش و پذیرش مراجعه نمایید.',
               'link_text'    =>'آدرس: تهران، انتهای بزرگراه شهید ستاری، میدان دانشگاه، سازمان مرکزی دانشگاه آزاد اسلامی (مرکز سنجش و پذیرش)',
               'link_url'     =>null,
               'created_at'   =>\Carbon\Carbon::now()->toDateString(),
               'creator_ip'   =>'127.0.0.1',
               'creator_id'   =>\App\Admin::SEEDER_ID,
               'deleter_ip'   =>null,
               'updater_ip'   =>null,
               'updater_id'   =>null,
               'deleter_id'   =>null,
               'updated_at'   =>null,
               'deleted_at'   =>null,
           ],
           [
               'id'            =>4,
               'position'      =>4,
               'title'         => 'روابط عمومی',
               'description'   => 'وب‌سایت روابط عمومی مرکز سنجش و پذیرش دانشگاه آزاد اسلامی',
               'link_text'     =>'مشاهده وب‌سایت روابط عمومی',
               'link_url'      =>'https://www.iau.ac.ir',
               'created_at'    =>\Carbon\Carbon::now()->toDateString(),
               'creator_ip'    =>'127.0.0.1',
               'creator_id'    =>\App\Admin::SEEDER_ID,
               'deleter_ip'    =>null,
               'updater_ip'    =>null,
               'updater_id'    =>null,
               'deleter_id'    =>null,
               'updated_at'    =>null,
               'deleted_at'    =>null,
           ],

       ];

       \App\ContactUs::insert($data);
    }
}
