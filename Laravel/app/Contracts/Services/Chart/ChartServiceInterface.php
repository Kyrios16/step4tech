<?php

namespace App\Contracts\Services\Chart;

/**
 * Interface for Services of Chart
 */
interface ChartServiceInterface
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

    /**
     * To get daily post count and data
     * 
     * @return $dailyPostDataArr daily post data array list
     */
    public function getDailyPostData();
}
