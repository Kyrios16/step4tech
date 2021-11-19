<?php

namespace App\Services\Chart;

use App\Contracts\Dao\Chart\ChartDaoInterface;
use App\Contracts\Services\Chart\ChartServiceInterface;
use DateTime;

/**
 * Chart Service class
 */
class ChartService implements ChartServiceInterface
{
    /**
     * Chart Dao
     */
    private $chartDao;

    /**
     * Class Constructor
     * @param ChartDaoInterface
     * @return
     */
    public function __construct(ChartDaoInterface $chartDaoInterface)
    {
        $this->chartDao = $chartDaoInterface;
    }

    /**
     * To get all dates of created at
     * 
     * @return $postsDates dates array list
     */
    public function getAllDates()
    {
        $postsDates = $this->chartDao->getAllDates();
        $dateArr = array();
        if (!empty($postsDates)) {
            foreach ($postsDates as $postsDate) {
                $date = new DateTime($postsDate);
                $dateNo = $date->format(format: 'd');
                $dateName = $date->format(format: 'D');
                $dateArr[$dateNo] = $dateName;
            }
        }
        return $dateArr;
    }

    /**
     * To get post count by date
     * 
     * @param $day
     * @return $dailyPostCount array
     */
    public function getDailyPostCount($day)
    {
        return $this->chartDao->getDailyPostCount($day);
    }

    /**
     * To get daily post count and data
     * 
     * @return $dailyPostDataArr daily post data array list
     */
    public function getDailyPostData()
    {
        $dailyPostCountArr = array();
        $dateNameArr = array();
        $dateArr = $this->getAllDates();
        if (!empty($dateArr)) {
            foreach ($dateArr as $dateNo => $dateName) {
                $dailyPostCount = $this->getDailyPostCount($dateNo);
                array_push($dailyPostCountArr, $dailyPostCount);
                array_push($dateNameArr, $dateName);
            }
        }

        $max_no = max($dailyPostCountArr);
        $max = round(($max_no + 10 / 2) / 10) * 10;
        $dailyPostDataArr = array(
            'days' => $dateNameArr,
            'post_count_data' => $dailyPostCountArr,
            'max' => $max
        );
        return $dailyPostDataArr;
    }
}
