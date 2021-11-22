<?php

namespace App\Contracts\Services\Chart;

/**
 * Interface for Services of Chart
 */
interface ChartServiceInterface
{
    /**
     * To get  daily posts count list
     * 
     * @return $postsDates dates list
     */
    public function getDailyPostCount();
}
