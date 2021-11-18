<?php

namespace App\Http\Controllers\Feedback;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Categories\CategoriesServiceInterface;
use App\Contracts\Services\Feedback\FeedbackServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\createFeedbackRequest;

class FeedbackController extends Controller
{
    private $feedbackInterface;

    /**
     * Class Constructor
     * 
     * @param FeedbackServiceInterface
     */
    public function __construct(FeedbackServiceInterface $feedbackInterface)
    {
        $this->feedbackInterface = $feedbackInterface;
    }
    /**
     * To create feedback
     * 
     * @param Request $request
     */
    public function createFeedback($id, createFeedbackRequest $request)
    {
        $request->validated();
        $feedback = $this->feedbackInterface->createFeedback($request, $id);
        return redirect('/post/detail/' . $id);
    }
}
