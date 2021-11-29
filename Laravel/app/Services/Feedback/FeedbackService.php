<?php

namespace App\Services\Feedback;

use App\Contracts\Dao\Feedback\FeedbackDaoInterface;
use App\Contracts\Services\Feedback\FeedbackServiceInterface;
use Carbon\Carbon;
use DateTime;

/**
 * User Service class
 */
class FeedbackService implements FeedbackServiceInterface
{
    /**
     * user Dao
     */
    private $feedbackDao;

    /**
     * Class Constructor
     * @param FeedbackDaoInterface
     * @return
     */
    public function __construct(FeedbackDaoInterface $feedbackDao)
    {
        $this->feedbackDao = $feedbackDao;
    }

    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getFeedbackbyPostId($Id)
    {
        $feedbackList = $this->feedbackDao->getFeedbackbyPostId($Id);
        foreach ($feedbackList as $feedback) {
            $currentDate = new DateTime();
            $startTime = Carbon::parse($currentDate);
            $endTime = Carbon::parse($feedback->created_at);
            $totalDuration = $endTime->diffForHumans($startTime);
            $feedback->time = $totalDuration;
        }
        return $feedbackList;
    }

    /**
     * To create feedback
     * 
     * @param $request
     * @param $id
     * @return $feedback created new feedback
     */
    public function createFeedback($request, $id)
    {
        return $this->feedbackDao->createFeedback($request, $id);
    }

    /**
     * To update feedback
     * 
     * @param $request
     * @param $id feedback id
     * @return $feedback updated feedback 
     */
    public function updateFeedback($request, $id)
    {
        return $this->feedbackDao->updateFeedback($request, $id);
    }

    /**
     * To delete feed$feedbackgory
     * 
     * @param $id
     * @return $feedback  
     */
    public function deleteFeedback($id)
    {
        return $this->feedbackDao->deleteFeedback($id);
    }
}
