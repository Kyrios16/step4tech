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
}
