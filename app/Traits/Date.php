<?php

namespace App\Traits;

trait Date
{
    public static function explodeDateTime($sign=' ',$data)
    {
        $explode = explode($sign,$data);

        $result = [];

        $result['date'] = $explode[0];
        $result['time'] = $explode[1];

        return $result;
    }
    public static function DbToOriginal($sign,$data)
    {
        $explode = explode($sign,$data);

        $month = '';

        if($explode[1] == '1')
        {
            $month = __('common.jan');
        }
        elseif($explode[1] == '2')
        {
            $month = __('common.feb');
        }
        elseif($explode[1] == '3')
        {
            $month = __('common.mar');
        }
        elseif($explode[1] == '4')
        {
            $month = __('common.apr');
        }
        elseif($explode[1] == '5')
        {
            $month = __('common.may');
        }
        elseif($explode[1] == '6')
        {
            $month = __('common.jun');
        }
        elseif($explode[1] == '7')
        {
            $month = __('common.july');
        }
        elseif($explode[1] == '8')
        {
            $month = __('common.aug');
        }
        elseif($explode[1] == '9')
        {
            $month = __('common.sep');
        }
        elseif($explode[1] == '10')
        {
            $month = __('common.oct');
        }
        elseif($explode[1] == '11')
        {
            $month = __('common.nov');
        }
        elseif($explode[1] == '12')
        {
            $month = __('common.dec');
        }


        $result = $explode[2].' '. $month.' '. $explode[0];

        return $result;
    }
    public static function DbToOriginalforTimer($sign,$data)
    {
        $explode = explode($sign,$data);

        $month = '';

        if($explode[1] == '1')
        {
            $month = __('common.jan');
        }
        elseif($explode[1] == '2')
        {
            $month = __('common.feb');
        }
        elseif($explode[1] == '3')
        {
            $month = __('common.mar');
        }
        elseif($explode[1] == '4')
        {
            $month = __('common.apr');
        }
        elseif($explode[1] == '5')
        {
            $month = __('common.may');
        }
        elseif($explode[1] == '6')
        {
            $month = __('common.jun');
        }
        elseif($explode[1] == '7')
        {
            $month = __('common.july');
        }
        elseif($explode[1] == '8')
        {
            $month = __('common.aug');
        }
        elseif($explode[1] == '9')
        {
            $month = __('common.sep');
        }
        elseif($explode[1] == '10')
        {
            $month = __('common.oct');
        }
        elseif($explode[1] == '11')
        {
            $month = __('common.nov');
        }
        elseif($explode[1] == '12')
        {
            $month = __('common.dec');
        }


        $result = $month.' '. $explode[2].', '. $explode[0];

        return $result;
    }

    public static function twelveHrTime(String $data)
    {
        return date('h:i:s a', strtotime($data));
    }

    public static function originalToDB($sign,$data)
    {
        $explode = explode($sign,$data);

        if($explode[1] == 'Jan')
        {
            $month = '1';
        }
        elseif($explode[1] == 'Feb')
        {
            $month = '2';
        }
        elseif($explode[1] == 'Mar')
        {
            $month = '3';
        }
        elseif($explode[1] == 'Apr')
        {
            $month = '4';
        }
        elseif($explode[1] == 'May')
        {
            $month = '5';
        }
        elseif($explode[1] == 'Jun')
        {
            $month = '6';
        }
        elseif($explode[1] == 'Jul')
        {
            $month = '7';
        }
        elseif($explode[1] == 'Aug')
        {
            $month = '8';
        }
        elseif($explode[1] == 'Sep')
        {
            $month = '9';
        }
        elseif($explode[1] == 'Oct')
        {
            $month = '10';
        }
        elseif($explode[1] == 'Nov')
        {
            $month = '11';
        }
        elseif($explode[1] == 'Dec')
        {
            $month = '12';
        }

        $result = $explode[2].'-'.$month.'-'.$explode[0];

        return $result;
    }

    public static function getYear($sign, $date)
    {
        $explode = explode($sign, $date);

        return $explode['0'];
    }
    public static function getMonth($sign, $date)
    {
        $explode = explode($sign, $date);

        return $explode['1'];
    }
    public static function getDay($sign, $date)
    {
        $explode = explode($sign, $date);

        return $explode['2'];
    }
    public static function getHours($sign, $date)
    {
        $explode = explode($sign, $date);

        return $explode['0'];
    }
    public static function getMin($sign, $date)
    {
        $explode = explode($sign, $date);

        return $explode['1'];
    }
    public static function getSec($sign, $date)
    {
        $explode = explode($sign, $date);

        return $explode['2'];
    }
}
