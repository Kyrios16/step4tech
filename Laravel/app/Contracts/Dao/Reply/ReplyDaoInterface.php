<?php

namespace App\Contracts\Dao\Reply;


/**
 * Interface of Data Access Object for user
 */
interface ReplyDaoInterface
{
    /**
     * To reply by PostId
     * @param string $id post id
     * @return Object $reply
     */
    public function getReplyByPostAndFeedbackId($Id);
    /**
     * To create feedback
     * 
     * @param $request
     * @param $id
     * @return $feedback created new feedback
     */
    public function createReply($request, $post_id, $feedback_id);
    /**
     * To delete feed$feedbackgory
     * 
     * @param $id
     * @return $feedback  
     */
    public function deleteReply($id);
}
