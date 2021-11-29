<?php

namespace App\Contracts\Dao\Reply;

/**
 * Interface of Data Access Object for user
 */
interface ReplyDaoInterface
{
    /**
     * To reply by post and feedback id
     * @param string $id post id
     * @return Object $reply
     */
    public function getReplyByPostAndFeedbackId($Id);

    /**
     * To create reply
     * 
     * @param $request
     * @param $post_id post id
     * @param $feedback_id feedback id
     */
    public function createReply($request, $post_id, $feedback_id);

    /**
     * To update reply
     * 
     * @param $request
     * @param $id reply id
     * @return $reply updated reply 
     */
    public function updatedReply($request, $id);

    /**
     * To delete reply
     * 
     * @param $id reply id 
     */
    public function deleteReply($id);
}
