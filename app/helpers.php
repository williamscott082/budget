<?php

if (!function_exists('format_date')) {
    /**
     * @return mixed
     */
    function format_date($year, $month, $day, $format = 'Y-m-d')
    {
        return \Carbon\Carbon::parse($year . '-' . ltrim($day, '0') . '-' . ltrim($month, '0'))->format($format);
    }
}
