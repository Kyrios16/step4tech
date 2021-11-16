<?php

namespace App\Dao\Feedback;

use App\Contracts\Dao\Feedback\FeedbackDaoInterface;
use Illuminate\Support\Facades\DB;

/**
 * Data Access Object for User
 */
class FeedbackDao implements FeedbackDaoInterface
{
    /**
     * To feedbacks by PostId
     * @param string $id post id
     * @return Object $feedback
     */
    public function getFeedbackbyPostId($Id)
    {
        $feedbackList = DB::select(DB::raw("SELECT feedbacks.content, feedbacks.photo, users.name, users.profile_img
        FROM feedbacks,users
        WHERE users.id = feedbacks.created_user_id
        AND feedbacks.post_id = $Id
        GROUP BY feedbacks.id
        ORDER BY feedbacks.updated_at DESC"));
        return $feedbackList;
    }
}
