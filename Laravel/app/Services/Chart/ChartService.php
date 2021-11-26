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
     * To get daily posts count list 
     * 
     * @return $postsDates dates array list
     */
    public function getDailyPostCount()
    {
        $postsDates = $this->chartDao->getDailyPostCount();
        $dateArr = array();
        if (count($postsDates->toArray()) > 0) {
            $dateArr = [
                'Mon' => 0,
                'Tue' => 0,
                'Wed' => 0,
                'Thu' => 0,
                'Fri' => 0,
                'Sat' => 0,
                'Sun' => 0,
            ];
            foreach ($postsDates as $postsDate) {
                $date = new DateTime($postsDate);
                $dateName = $date->format(format: 'D');
                $dateArr[$dateName]++;
            }
        }
        return $dateArr;
    }
}
