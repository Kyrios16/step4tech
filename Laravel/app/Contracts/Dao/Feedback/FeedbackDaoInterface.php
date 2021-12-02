<?php

namespace App\Contracts\Dao\Feedback;


/**
 * Interface of Data Access Object for user
 */
interface FeedbackDaoInterface
{
    /**
     * To feedbacks by PostId
     * @param string $id post id
     * @return Object $feedback
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
     * To update feedback
     * 
     * @param $request
     * @param $id feedback id
     * @return $feedback updated feedback 
     */
    public function updateFeedback($request, $id);
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
    public function selectGreenmark($feedback_id);
}
