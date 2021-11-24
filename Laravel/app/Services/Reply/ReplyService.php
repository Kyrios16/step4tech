<?php

namespace App\Services\Reply;

use App\Contracts\Dao\Reply\ReplyDaoInterface;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\Reply\ReplyServiceInterface;
use Carbon\Carbon;
use DateTime;

/**
 * User Service class
 */
class ReplyService implements ReplyServiceInterface
{
    /**
     * user Dao
     */
    private $replyDao;

    /**
     * Class Constructor
     * @param ReplyDaoInterface
     * @return
     */
    public function __construct(ReplyDaoInterface $replyDao)
    {
        $this->replyDao = $replyDao;
    }

    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getReplyByPostAndFeedbackId($Id)
    {
        $replies = $this->replyDao->getReplyByPostAndFeedbackId($Id);
        foreach ($replies as $reply) {
            $currentDate = new DateTime();
            $startTime = Carbon::parse($currentDate);
            $endTime = Carbon::parse($reply->created_at);
            $totalDuration = $endTime->diffForHumans($startTime);
            $reply->time = $totalDuration;
        }

        return $replies;
    }
    /**
     * To create feedback
     * 
     * @param $request
     * @param $id
     * @return $feedback created new feedback
     */
    public function createReply($request, $post_id, $feedback_id)
    {
        return $this->replyDao->createReply($request, $post_id, $feedback_id);
    }
    /**
     * To delete feed$feedbackgory
     * 
     * @param $id
     * @return $feedback  
     */
    public function deleteReply($id)
    {
        return $this->replyDao->deleteReply($id);
    }
}
