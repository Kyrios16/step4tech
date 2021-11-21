<?php

namespace App\Dao\Chart;

use App\Contracts\Dao\Chart\ChartDaoInterface;
use App\Models\Post;

class ChartDao implements ChartDaoInterface
{
    /**
     * To get all dates of created at
     * 
     * @return $postsDates dates list
     */
    public function getDailyPostCount()
    {

        $postsDates = Post::orderBy('created_at', 'asc')->pluck('created_at');
        return $postsDates;
    }
}
