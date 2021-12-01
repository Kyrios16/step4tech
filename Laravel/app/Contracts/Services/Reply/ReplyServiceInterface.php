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
