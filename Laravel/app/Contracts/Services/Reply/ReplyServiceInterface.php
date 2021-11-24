<?php

namespace App\Contracts\Services\Reply;


/**
 * Interface for reply service
 */
interface ReplyServiceInterface
{
    /**
     * To get reply by id
     * @param string $id reply id
     * @return Object $reply reply object
     */
    public function getReplyByPostAndFeedbackId($Id);

    /**
     * To create reply
     * 
     * @param $request
     * @param $id
     * @return $reply created new reply
     */
    public function createReply($request, $post_id, $feedback_id);

    /**
     * To delete reply
     * 
     * @param $id
     * @return $reply  
     */
    public function deleteReply($id);
}
