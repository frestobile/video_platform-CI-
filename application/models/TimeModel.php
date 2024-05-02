<?php
class TimeModel extends CI_Model{
    protected $timezone;
    public function __construct(){
        parent::__construct();
        if(isset($_SESSION['TIMEZONE']))
        {
            $this->timezone = $_SESSION['TIMEZONE'];
        }else{
            $this->timezone = 'UM15';
        }
        $this->load->helper('date');
    }

    public function getting_datetime($timestamp = null, $pattns = '-'){
        if(!$timestamp) $timestamp = time();
        $timezone = $this->timezone;
        $daylight_saving = TRUE;

        $datestring = '%Y'.$pattns.'%m'.$pattns.'%d %H:%i:%s';
        $time = gmt_to_local($timestamp, $timezone, $daylight_saving);
        //return mdate($datestring, $time);
        return date('Y-m-d H:i:s');
    }

    public function getting_dates($timestamp = null, $pattns = '-'){
        if(!$timestamp) $timestamp = time();
        $timezone = $this->timezone;
        $daylight_saving = TRUE;

        $datestring = '%Y'.$pattns.'%m'.$pattns.'%d';
        $time = gmt_to_local($timestamp, $timezone, $daylight_saving);
        return mdate($datestring, $time);
    }

    public function getting_times($timestamp = null){
        if(!$timestamp) $timestamp = time();
        $timezone = $this->timezone;
        $daylight_saving = TRUE;

        $datestring = '%H:%i:%s';
        $time = gmt_to_local($timestamp, $timezone, $daylight_saving);
        return mdate($datestring, $time);
    }

    public function getting_timestamp(){
        $timestamp = time();
        // $timezone  = 'UP6';
        $timezone = $this->timezone;
        $daylight_saving = TRUE;

        $time = gmt_to_local($timestamp, $timezone, $daylight_saving);
        return $time;
    }

    public function setting_timestamp($timestamp){
        $timezone = $this->timezone;
        $daylight_saving = TRUE;

        $time = gmt_to_local($timestamp, $timezone, $daylight_saving);
        return $time;
    }

    public function getting_diff_timestamp($set_date, $diffday = 0){
        list($year, $month, $day)    = explode('-', $set_date);
        $cur_stamp = mktime(0, 0, 0, $month, $day, $year);
        return $cur_stamp + 24 * 3600 * ($diffday);
    }

    public function getting_diff_dates($set_date, $diffday = 0){
        list($year, $month, $day)    = explode('-', $set_date);
        $cur_stamp = mktime(0, 0, 0, $month, $day, $year);
        $timestamp = $cur_stamp + 24 * 3600 * ($diffday);
        return $this->getting_dates($timestamp);
    }

    // A function that calculates the day of the week for that day
    public function getting_day_week($year, $month, $day){
        // Get the year, month, first hour of the day, and the day of the week
        $current_time = mktime(0, 0, 0, $month, $day, $year);
        $current_week = date('w', $current_time);
        return (int)$current_week;
    }

    // A function that calculates the number of weeks of the month
    public function getting_week_order($year, $month, $day){
        // Get current year, month, first hour of day, and day of the week
        $current_time = mktime(0, 0, 0, $month, $day, $year);
        $current_week = date('w', $current_time);

        // Get current year, first hour of month, and day of the month
        $first_time = mktime(0, 0, 0, $month, 1, $year);
        $first_week = date('w', $first_time);

        // Current year, week value of month 1 is determined as 1
        $week_diff = 1;

        // Get Sunday's first hour of the week, one day of the month, current year
        $first_sundaytime = $first_time - 24 * 3600 * $first_week;

        // Get early hours of current year, month and day Sunday
        $current_sundaytime = $current_time - 24 * 3600 * $current_week;
        $week_value = $week_diff + ($current_sundaytime - $first_sundaytime) / (24 * 3600 * 7);

        //  $smonth = date('n', $current_sundaytime);
        //  $sday = date('j', $current_sundaytime);
        //  $syear = date('Y', $current_sundaytime);

        //  $week_value = $week_diff + (mktime(0, 0, 0, $smonth, $sday, $syear) - $first_sundaytime) / (24 * 3600 * 7);
        return (int)$week_value;
    }

    public function getting_week_first($year, $month){
        //Get current year, first hour of month, and day of the month
        $first_time = mktime(0, 0, 0, $month, 1, $year);
        $first_week = date('w', $first_time);
        $cur_time = $first_time - (24 * 3600 * $first_week);
        return date("Y-n-j", $cur_time);
    }

    public function getting_week_date($year, $month, $weeks){
        // Get current year, first hour of month, and day of the month
        $first_time = mktime(0, 0, 0, $month, 1, $year);
        $first_week = date('w', $first_time);
        $cur_time = $first_time + 24 * 3600 * (($weeks - 1) * 7 - $first_week);
        return date("Y-n-j", $cur_time);
    }

    // A function that calculates how many weeks are in the month
    public function getting_week_count($year, $month){
        // Get current year, first hour of month, and day of the month
        $first_time = mktime(0, 0, 0, $month, 1, $year);
        $first_week = date('w', $first_time);

        // The current year, the first hour of the Margal Temple of the month, and the day of the week
        $last_day = date('t', mktime(0, 0, 0, $month, 1, $year));
        $last_time = mktime(0, 0, 0, $month, $last_day, $year);
        $last_week = date('w', $last_time);

        // Get Sunday's first hour of the week, one day of the month, current year
        $first_sundaytime = $first_time - 24 * 3600 * $first_week;

        // Get early hours of current year, month and day Sunday
        $last_sundaytime = $last_time - 24 * 3600 * $last_week;

        // Get current year, number of weeks of month
        $smonth = date('n', $last_sundaytime);
        $sday = date('j', $last_sundaytime);
        $syear = date('Y', $last_sundaytime);

        $week_count = ceil((mktime(0, 0, 0, $smonth, $sday, $syear) - $first_sundaytime) / (24 * 3600 * 7));

        // The main value is determined based on the value of the week in the current year and month.

        if($first_week != 0 || $last_week != 0) $week_diff1 = 1; else $week_diff1 = 0;
        if($last_week == 0) $week_diff1 = 0;

        $week_count +=  $week_diff1 ;

        return $week_count;
    }

    public function getting_week($year, $month, $day){
        $week_day = array('Sun', 'Mon', 'Tus' ,'Web', 'Thu', 'Fri', 'Sat');
        $week_num = $this->getting_day_week($year, $month, $day);
        return $week_day[$week_num];
    }
}