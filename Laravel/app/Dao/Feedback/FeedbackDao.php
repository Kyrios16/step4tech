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
        $feedbackList = DB::select(DB::raw("SELECT 
        feedbacks.created_user_id,
        feedbacks.id,
        feedbacks.content,
        feedbacks.green_mark, 
        feedbacks.photo, 
        users.name, 
        users.profile_img,
        feedbacks.created_at
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
        return DB::transaction(function () use ($request, $id) {
            $feedback = new Feedback();
            if ($file = $request->hasFile('photo')) {
                $file = $request->file('photo');
                $destinationPath = public_path() . '/images/feedbacks/';
                $file->move($destinationPath, $request->photo);
                $feedback->photo = $request->photo;
            }
            $feedback->content = $request->content;
            $feedback->post_id = $id;
            $feedback->green_mark = false;
            $feedback->created_user_id = Auth::user()->id ?? 1;
            $feedback->updated_user_id = Auth::user()->id ?? 1;
            $feedback->save();
        });
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
                $destinationPath = public_path() . '/images/feedbacks/';
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
        return DB::transaction(function () use ($id) {
            $feedback = Feedback::find($id);
            $feedback->deleted_user_id = Auth::user()->id ?? 1;
            $feedback->deleted_at = now();
            $feedback->save();
        });
    }
    /**
     * To give green_mark
     * 
     * @param Request $request
     * @return $message 
     */
    public function selectGreenmark($feedback_id)
    {
        return DB::transaction(function () use ($feedback_id) {
            $feedback = Feedback::find($feedback_id);
            if ($feedback->green_mark == true) {
                Feedback::where('id', $feedback_id)
                    ->update(['green_mark' => false]);
            } else {

                Feedback::where('id', $feedback_id)
                    ->update(['green_mark' => true]);
            }
            Feedback::where('id', '!=', $feedback_id)
                ->where('post_id', $feedback->post_id)
                ->update(['green_mark' => false]);
        });
    }
}
