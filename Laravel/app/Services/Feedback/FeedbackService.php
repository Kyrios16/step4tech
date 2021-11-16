<?php

namespace App\Services\Feedback;

use App\Contracts\Dao\Feedback\FeedbackDaoInterface;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\Feedback\FeedbackServiceInterface;

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
        return $this->feedbackDao->getFeedbackbyPostId($Id);
    }
}
