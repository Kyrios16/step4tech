<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Chart\ChartServiceInterface;

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
     * To get daily posts count list
     * 
     * @return $postsDates data array
     */
    public function getDailyPostCount()
    {
        $dates =  $this->chartInterface->getDailyPostCount();
        return response()->json($dates);
    }
}
