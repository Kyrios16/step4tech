<?php

namespace App\Services\Reply;

use App\Contracts\Dao\Reply\ReplyDaoInterface;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\Reply\ReplyServiceInterface;
use Carbon\Carbon;
use DateTime;

/**
 * Reply Service class
 */
class ReplyService implements ReplyServiceInterface
{
    /**
     * reply Dao
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
     * To Replys by PostId
     * @param string $id post id
     * @return Object $Reply
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
     * To create reply
     * 
     * @param $request
     * @param $post_id post id
     * @param $feedback_id feedback id
     * @return created new reply
     */
    public function createReply($request, $post_id, $feedback_id)
    {
        return $this->replyDao->createReply($request, $post_id, $feedback_id);
    }

    /**
     * To update reply
     * 
     * @param $request
     * @param $id found reply id
     * @return $cate updated reply
     */
    public function updateReply($request, $id)
    {
        return $this->replyDao->updateReply($request, $id);
    }

    /**
     * To delete reply
     * 
     * @param $id
     * @return $feedback  
     */
    public function deleteReply($id)
    {
        return $this->replyDao->deleteReply($id);
    }
}
