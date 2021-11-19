<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Chart\ChartServiceInterface;
use App\Models\Post;
use DateTime;

class ChartDataController extends Controller
{

    private $chartInterface;

    /**
     * Class Constructor
     * 
     * @param ChartServiceInterface
     */
    public function __construct(ChartServiceInterface $chartInterface)
    {
        $this->chartInterface = $chartInterface;
    }

    /**
     * To get all dates of created at
     * 
     * @return $postsDates dates list
     */
    public function getAllDates()
    {
        return  $this->chartInterface->getAllDates();
    }

    /**
     * To get post count by date
     * 
     * @param $day
     * @return $dailyPostCount array
     */
    public function getDailyPostCount($day)
    {
        return  $this->chartInterface->getDailyPostCount($day);
    }

    /**
     * To get daily post count and data
     * 
     * @return $dailyPostDataArr daily post data array list
     */
    public function getDailyPostData()
    {
        return  $this->chartInterface->getDailyPostData();
    }
}
