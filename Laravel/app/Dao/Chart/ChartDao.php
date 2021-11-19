<?php

namespace App\Dao\Chart;

use App\Contracts\Dao\Chart\ChartDaoInterface;
use App\Models\Post;
use DateTime;

class ChartDao implements ChartDaoInterface
{
    /**
     * To get all dates of created at
     * 
     * @return $postsDates dates list
     */
    public function getAllDates()
    {

        $postsDates = Post::orderBy('created_at', 'asc')->pluck('created_at');
        $postsDates = json_decode($postsDates);
        return $postsDates;
    }

    /**
     * To get post count by date
     * 
     * @param $day
     * @return $dailyPostCount array
     */
    public function getDailyPostCount($day)
    {
        $dailyPostCount = Post::whereDay('created_at', $day)->get()->count();
        return $dailyPostCount;
    }
}
