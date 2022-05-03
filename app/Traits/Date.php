<?php

namespace App\Traits;


use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

trait Date
{
    function convertNumbers($srting, $toPersian = false)
    {
        $en_num = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $fa_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        if ($toPersian) return str_replace($en_num, $fa_num, $srting);
        else return str_replace($fa_num, $en_num, $srting);
    }

    public function convertDate($date): string
    {
        $date = $this->convertNumbers($date);
        $date = explode('/', $date);
        $date = Verta::getGregorian($date[0], $date[1], $date[2]);
        $date = $date[0] . "-" . $date[1] . "-" . $date[2];

        $date = Carbon::createFromFormat('Y-m-d', $date)->toDateString();
        return $date;
    }

    public function convertToGoregian($start_date)
    {
        $start_day = explode(' ', $start_date);
        $start_day = $start_day[0];
        $start_day = explode('-', $start_day);
        $start_day = Verta::getJalali($start_day[0], $start_day[1], $start_day[2]);
        $start_day = $this->convertNumbers($start_day, true);
        return $start_day = $start_day[0] . '/' . $start_day[1] . '/' . $start_day[2];
    }

    public function convertToJalali($start_date)
    {
        $start_day = explode(' ', $start_date);
        $start_day = $start_day[0];
        $start_day = explode('-', $start_day);
        $start_day = Verta::getJalali($start_day[0], $start_day[1], $start_day[2]);
        $start_day = $this->convertNumbers($start_day, true);
        return $start_day = $start_day[0] . '/' . $start_day[1] . '/' . $start_day[2];
    }

}
