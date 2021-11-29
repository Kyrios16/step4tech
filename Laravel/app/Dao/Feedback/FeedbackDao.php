<?php

namespace App\Dao\Feedback;

use App\Contracts\Dao\Feedback\FeedbackDaoInterface;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
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
        $feedbackList = DB::select(DB::raw("SELECT feedbacks.created_user_id,feedbacks.id,feedbacks.content, feedbacks.photo, users.name, users.profile_img,feedbacks.created_at
        FROM feedbacks,users
        WHERE users.id = feedbacks.created_user_id
        AND feedbacks.deleted_at is NULL
        AND feedbacks.post_id = $Id
        GROUP BY feedbacks.id
        ORDER BY feedbacks.updated_at DESC"));

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
        $feedback = new Feedback();

        if ($file = $request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $newName = "feedback_" . $feedbackid . "." . $extension;
            $destinationPath = public_path() . '/images/feedbacks/';
            $file->move($destinationPath, $newName);
            $feedback->photo = $newName;
        }
        $feedback->content = $request->content;
        $feedback->post_id = $id;
        $feedback->created_user_id = Auth::user()->id ?? 1;
        $feedback->updated_user_id = Auth::user()->id ?? 1;
        $feedback->save();
        return $feedback;
    }

    /**
     * To update feedback
     * 
     * @param $request
     * @param $id feedback id
     * @return $feedback updated feedback 
     */
    public function updateFeedback($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            $feedback = Feedback::findOrFail($id);
            if ($file = $request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $newName = "feedback_" . $id . "." . $extension;
                $destinationPath = public_path() . '/images/replies/';
                $file->move($destinationPath, $newName);
                $feedback->photo = $newName;
            }
            $feedback->content = $request->content;
            $feedback->created_user_id = Auth::user()->id ?? 1;
            $feedback->updated_user_id = Auth::user()->id ?? 1;
            $feedback->save();
        });
    }

    /**
     * To delete $feedback
     * 
     * @param $id
     * @return $feedback  
     */
    public function deleteFeedback($id)
    {
        $feedback = Feedback::find($id);
        $feedback->deleted_user_id = Auth::user()->id ?? 1;
        $feedback->deleted_at = now();
        $feedback->save();

        return $feedback;
    }
}
