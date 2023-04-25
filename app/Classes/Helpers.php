<?php

use App\Card_purchased;
use App\Classes\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

if (!function_exists('generate_tracking_code')) {
    function generate_tracking_code($data)
    {
        $data['tracking_code'] = generate_random_code('int');
        $purchased_count = Card_purchased::where('tracking_code', $data['tracking_code'])->count();
        if ($purchased_count == 0) {
            return Card_purchased::create($data);

        } else
            generate_tracking_code($data);

        return false;
    }
}

if (!function_exists('generate_random_code')) {
    function generate_random_code($type = 'int', $length = 32)
    {
        $output = null;
        if ($type == 'int') {
            $output = random_int(pow(3, 8) + 11111111111, pow(2, 6) + 99999999999);
        } elseif ($type == 'str') {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $output = '';
            for ($i = 0; $i < $length; $i++)
                $output .= $characters[rand(0, $charactersLength - 1)];
            return $output;
        }
        return $output;
    }
}

if (!function_exists('generate_login_accounts')) {
    function generate_login_accounts($id_certificate)
    {
        $data['username'] = $id_certificate;
        $data['password'] = $id_certificate . date('d');
        return $data;
    }
}

if (!function_exists('CheckHash')) {
    function CheckHash(Array $input, $hash)
    {
        if (count($input) == 1)
            $string = implode("", $input[0]) . env('SALT');
        else
            $string = implode("", $input) . env('SALT');


        $true_hash = md5($string);

//        dd($hash, $true_hash, $input, $string);

        if ($hash == $true_hash)
            return true;
        return false;
    }
}

function CheckAccess($permissions, $controller, $access)
{
    if (isset($permissions[$controller])) {
        if ($permissions[$controller][$access] == 1)
            return true;
    }

    return false;
}

function setClearPhone($phone, $phone_code = '')
{
    $clear_phones = null;
    $re = '/^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$/';

    $phone = str_replace(" ", "", $phone);
    preg_match_all($re, $phone, $matches);

    if (isset($matches[2][0])) {
        $clear_phones = $phone_code . $matches[2][0];
    }

    return $clear_phones;
}

function operatorDetector($phone, $phoneCode = 0)
{
    $clearPhone = setClearPhone($phone, $phoneCode);

    $phoneCodes = config('operators.phone-codes');

    if (starts_with($clearPhone, $phoneCodes['mtn'])) {
        return 'mtn';
    }
    else if (starts_with($clearPhone, $phoneCodes['mci'])) {
        return 'mci';

    }else{
        return 'other';
    }

    return null;
}

function operatorDetectorNumber($phone, $phoneCode = 0)
{
    $clearPhone = setClearPhone($phone, $phoneCode);

    $phoneCodes = config('operators.phone-codes');

    if (starts_with($clearPhone, $phoneCodes['mtn'])) {
        return \App\SsoUser::MTN_TYPE;
    }
    else if (starts_with($clearPhone, $phoneCodes['mci'])) {
        return \App\SsoUser::MCI_TYPE;

    }else{
        return \App\SsoUser::OTHERS;
    }

    return null;
}


if (!function_exists('check_empty')) {
    function check_empty($input)
    {
        if ($input->isEmpty())
            return trans('ui.errors.not_found');
    }
}


if (!function_exists('there_have_no_data')) {
    function there_have_no_data($data)
    {
        if ($data->isEmpty()) {
            return "<div class='text-center'><div style='color: #999' class='m-t-50 fs-60pt fa fa-file-text-o'></div></div>
                <div class='text-center m-t-25'> اطلاعاتی برای مشاهده موجود نیست </div >";
        }
    }
}


function to_english_num($string)
{
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

    return $englishNumbersOnly;
}

function convert_to_correct_date_format($date)
{
    $date = DateTime::createFromFormat('Y-m-d', $date);
    return $date->format('Y-m-d');
}

function gregorian_to_jalali($expire_date)
{
    $expire_date = explode('-', to_english_num($expire_date));
    return convert_to_correct_date_format(implode('-', \Morilog\Jalali\CalendarUtils::toGregorian($expire_date[0], $expire_date[1], $expire_date[2])));
}

function jalali_to_gregorian($date)
{
    $date = explode('-', englishNumber($date));

    $contain = \Morilog\Jalali\CalendarUtils::toGregorian($date[0], $date[1], $date[2]);

    $date = DateTime::createFromFormat('Y-m-d', "$contain[0]-$contain[1]-$contain[2]");

    return $date->format('Y-m-d');

}

function englishNumber($string)
{
    $fa_num = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $en_num = range(0, 9);
    $string = str_replace($fa_num, $en_num, $string);

    return $string;
}



if (!function_exists('toPersianNum')) {

    function toPersianNum($number)
    {
        $number = str_replace("1", "۱", $number);
        $number = str_replace("2", "۲", $number);
        $number = str_replace("3", "۳", $number);
        $number = str_replace("4", "۴", $number);
        $number = str_replace("5", "۵", $number);
        $number = str_replace("6", "۶", $number);
        $number = str_replace("7", "۷", $number);
        $number = str_replace("8", "۸", $number);
        $number = str_replace("9", "۹", $number);
        $number = str_replace("0", "۰", $number);
        return $number;
    }
}

if (!function_exists('delete_item')) {
    function delete_item($item, $route)
    {
        return " <div class='modal fade' id='ClickModal-{$item->id}' style='margin-top: 30vh'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                                    <h4 class='alert alert-info  modal-title text-center h-30-px p-t-3' id='custom-width-modalLabel'>" . trans('ui.text.delete_a_record') . "</h4> 
                                </div>
                                <div class='modal-body'>
                                    <h4>" . trans('ui.text.delete_condition') . "</h4>
                                </div>

                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-default waves-effect' data-dismiss='modal'>" . trans('ui.text.close') . "</button>
                                    <form style='display: inline' action='" . route($route, $item->id) . "' method='post'>
                                        " . method_field('delete') . " " .
            csrf_field() . "
                                        <button type='submit' class='btn btn-danger waves-effect remove-data-from-delete-form'>" . trans('ui.text.delete') . "</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>";
    }
}

function generateRandomString($length = 10)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

function Toman($price)
{
    return $price / 10;
}


if (!function_exists('create_hash')) {
    function create_hash($algo = 'md5', $str = false)
    {
        if($str){
            $hash = hash($algo, $str);
        }else{
            $hash = hash('ripemd160', time(). random_bytes(20));
        }
        return $hash;
    }
}
function clean_url($uri)
{
    return str_replace(env('APP_URL'), '', $uri);
}

