<?php

namespace App\Contracts\Services\Feedback;


/**
 * Interface for user service
 */
interface FeedbackServiceInterface
{
    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getFeedbackbyPostId($Id);
    /**
     * To create feedback
     * 
     * @param $request
     * @param $id
     * @return $feedback created new feedback
     */
    public function createFeedback($request, $id);
    /**
     * To delete feed$feedbackgory
     * 
     * @param $id
     * @return $feedback  
     */
    public function deleteFeedback($id);
    /**
     * To give green_mark
     * 
     * @param Request $request 
     * @return $message 
     */
    public function selectGreenmark($request);
}
