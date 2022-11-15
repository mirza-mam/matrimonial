<?php

use Illuminate\Support\Carbon;

date_default_timezone_set("Asia/Karachi");
ini_set('memory_limit', '1024M');

if (!function_exists('pre')) {
    function pre($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

if (!function_exists('age_counter')) {
    function age_counter($date)
    {
        $age = \Carbon\Carbon::now()->diffInYears($date);
        return $age.' Years';
    }
}