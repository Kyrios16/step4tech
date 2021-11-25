<?php

namespace App\Http\Controllers\Reply;

use App\Models\Reply;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Reply\ReplyServiceInterface;
use App\Http\Requests\ReplyCreateRequest;
use Illuminate\Http\Request;


class ReplyController extends Controller
{
    /**
     * reply service interface
     */
    private $replyInterface;


    /**
     * Class Constructor
     * 
     * @param ReplyServiceInterface
     */
    public function __construct(ReplyServiceInterface $replyInterface)
    {
        $this->replyInterface = $replyInterface;
    }

    /**
     * To create reply
     * 
     * @param $request
     * @param $id
     * @return $reply created new reply
     */
    public function createReply(ReplyCreateRequest $request, $post_id, $feedback_id)
    {
        $request->validated();
        $reply = $this->replyInterface->createReply($request, $post_id, $feedback_id);
        return redirect('/post/detail/' . $post_id);
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
        $reply = $this->replyInterface->updateReply($request, $id);
        return response()->json($reply);
    }
    /**
     * To delete reply by id
     *
     * @param  $id reply id
     * @param $feedback_id feedback id
     * @return deleted reply
     */
    public function deleteReply($id)
    {
        $this->replyInterface->deleteReply($id);
        return back();
    }
}