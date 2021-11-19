<?php

namespace App\Contracts\Dao\Chart;

interface ChartDaoInterface
{
    /**
     * To get all dates of created at
     * 
     * @return $postsDates dates list
     */
    public function getAllDates();

    /**
     * To get post count by date
     * 
     * @param $day
     * @return $dailyPostCount array
     */
    public function getDailyPostCount($day);
}
