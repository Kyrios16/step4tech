<?php

namespace App\Contracts\Dao\Chart;

interface ChartDaoInterface
{
    /**
     * To get daily posts count list
     * 
     * @return $postsDates dates list
     */
    public function getDailyPostCount();
}
