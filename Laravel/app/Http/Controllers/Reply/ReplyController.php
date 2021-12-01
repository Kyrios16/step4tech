<?php

namespace App\Http\Controllers\Reply;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Reply\ReplyServiceInterface;
use App\Http\Requests\ReplyCreateRequest;
use App\Models\Reply;

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
     * @param $request from ReplyCreateRequest
     * @param $id
     * @return $reply created new reply
     */
    public function createReply(ReplyCreateRequest $request, $post_id, $feedback_id)
    {
        $request->validated();
        $reply = $this->replyInterface->createReply($request, $post_id, $feedback_id);
        return redirect()->route('detail.post', [$post_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Reply::findOrFail($id);
        return view('post.edit-reply')->with(['data' => $data]);
    }

    /**
     * To update reply
     * 
     * @param $request from ReplyCreateRequest
     * @param $id reply id
     * @return back()
     */
    public function updatedReply(ReplyCreateRequest $request, $id)
    {
        $request->validated();
        $this->replyInterface->updatedReply($request, $id);
        return back();
    }

    /**
     * To delete reply by id
     *
     * @param  $id reply id
     * @return deleted reply
     */
    public function deleteReply($id)
    {
        return $this->replyInterface->deleteReply($id);
    }
}
