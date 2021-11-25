<?php

namespace App\Dao\Reply;

use App\Contracts\Dao\Reply\ReplyDaoInterface;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

/**
 * Data Access Object for User
 */
class ReplyDao implements ReplyDaoInterface
{
    /**
     * To Replys by PostId
     * @param string $id post id
     * @return Object $Reply
     */
    public function getReplyByPostAndFeedbackId($Id)
    {
        $replies = DB::select(DB::raw(
            "SELECT replies.created_user_id, replies.id as replyId, replies.content,
                replies.created_at, replies.photo, replies.feedback_id,
                users.name, users.profile_img, feedbacks.id 
            FROM replies, users, feedbacks
            WHERE users.id = replies.created_user_id
            AND replies.deleted_at is NULL
            AND replies.post_id = $Id
            AND replies.feedback_id = feedbacks.id
            GROUP BY replyId
            ORDER BY replies.created_at DESC"
        ));

        return $replies;
    }

    /**
     * To create reply
     * 
     * @param $request
     * @param $id
     * @return $reply created new reply
     */
    public function createReply($request, $post_id, $feedback_id)
    {
        $replies = DB::table("replies")->get();
        $replyId = count($replies) + 1;
        $reply = new Reply();

        if ($file = $request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $newName = "feedback_" . $replyId . "." . $extension;
            $destinationPath = public_path() . '/images/replies/';
            $file->move($destinationPath, $newName);
            $reply->photo = $newName;
        }
        $reply->content = $request->content;
        $reply->post_id = $post_id;
        $reply->feedback_id = $feedback_id;
        $reply->created_user_id = Auth::user()->id ?? 1;
        $reply->updated_user_id = Auth::user()->id ?? 1;
        $reply->save();

        return $reply;
    }

    /**
     * To delete reply
     * 
     * @param $id reply id
     * @return $reply  
     */
    public function deleteReply($id)
    {
        $reply = Reply::find($id);
        $reply->deleted_user_id = Auth::user()->id ?? 1;
        $reply->deleted_at = now();
        $reply->save();

        return $reply;
    }
}
