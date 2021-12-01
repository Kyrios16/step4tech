<?php

namespace App\Services\Feedback;

use App\Contracts\Dao\Feedback\FeedbackDaoInterface;
use App\Contracts\Services\Feedback\FeedbackServiceInterface;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;

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
        $feedbackList = $this->feedbackDao->getFeedbackbyPostId($Id);
        foreach ($feedbackList as $feedback) {
            $currentDate = new DateTime();
            $startTime = Carbon::parse($currentDate);
            $endTime = Carbon::parse($feedback->created_at);
            $totalDuration = $endTime->diffForHumans($startTime);
            $feedback->time = $totalDuration;
        }
        return $feedbackList;
    }

    /**
     * To create feedback
     * 
     * @param $request
     * @param $id
     * @return $feedback created new feedback
     */
    public function createFeedback($request, $id)
    {
        $feedbackList = DB::table("feedbacks")->get();
        $feedbackid = count($feedbackList) + 1;

        if ($file = $request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $newName = "feedback_" . $feedbackid . "." . $extension;
            $request->photo = $newName;
        }
        return $this->feedbackDao->createFeedback($request, $id);
    }
    /**
     * To delete feed$feedbackgory
     * 
     * @param $id
     * @return $feedback  
     */
    public function deleteFeedback($id)
    {
        return $this->feedbackDao->deleteFeedback($id);
    }
    /**
     * To give green_mark
     * 
     * @param Request $request 
     * @return $message 
     */
    public function selectGreenmark($feedback_id)
    {
        return $this->feedbackDao->selectGreenmark($feedback_id);
    }
}
