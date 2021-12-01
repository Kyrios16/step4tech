<?php

namespace App\Http\Controllers\Feedback;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Contracts\Services\Feedback\FeedbackServiceInterface;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\createFeedbackRequest;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    /**
     * feedback service interface
     */
    private $feedbackInterface;
    /**
     * post service interface
     */
    private $postServiceInterface;
    /**
     * user service interface
     */
    private $userServiceInterface;

    /**
     * Class Constructor
     * 
     * @param FeedbackServiceInterface
     */
    public function __construct(FeedbackServiceInterface $feedbackInterface, PostServiceInterface $postServiceInterface, UserServiceInterface $userServiceInterface)
    {
        $this->feedbackInterface = $feedbackInterface;
        $this->postServiceInterface = $postServiceInterface;
        $this->userServiceInterface = $userServiceInterface;
    }
    /**
     * To create feedback
     * 
     * @param Request $request
     */
    public function createFeedback($id, createFeedbackRequest $request)
    {
        $request->validated();
        $post = $this->postServiceInterface->getPostById($id);

        $uploadUserId = $post->created_user_id;

        $loginuserId = Auth::user()->id;
        if (Auth::user()->id != $uploadUserId) {
            $user = $this->userServiceInterface->getUserById($uploadUserId);
            $email = $user->email;
            $feedbackInfo = [
                'title' => 'New Feedback Notification',
                'url' => 'http://127.0.0.1:8000/post/detail/' . $id,
                'name' => Auth::user()->name
            ];

            Mail::to($email)->send(new FeedbackMail($feedbackInfo));
        }

        $feedback = $this->feedbackInterface->createFeedback($request, $id);
        return redirect('/post/detail/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Feedback::findOrFail($id);
        return view('post.edit-feedback')->with(['data' => $data]);
    }

    /**
     * To update feedback
     * 
     * @param $request from createFeedbackRequest
     * @param int $id feedback id
     * @return array $feedback updated feedback 
     */
    public function updateFeedback(createFeedbackRequest $request, $id)
    {
        $request->validated();
        $this->feedbackInterface->updateFeedback($request, $id);
        return back();
    }

    /**
     * To delete feedback
     * 
     * @param int $id feedback id
     * @return delete
     */
    public function  deleteFeedback($id)
    {
        return $this->feedbackInterface->deleteFeedback($id);
    }

    /**
     * To give green_mark
     * 
     * @param Request $request 
     * @return $message 
     */
    public function selectGreenmark($feedback_id)
    {
        $greenmark = $this->feedbackInterface->selectGreenmark($feedback_id);
        return back();
    }
}
