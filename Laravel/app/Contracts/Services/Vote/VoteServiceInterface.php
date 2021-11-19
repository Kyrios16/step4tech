<?php

namespace App\Contracts\Services\Vote;

use Illuminate\Http\Request;

/**
 * Interface for vote service
 */
interface VoteServiceInterface
{
    /**
     * To votes by PostId
     * @param string $id post id
     * @return Object $voteList
     */
    public function getVoteListwithPostId($id);
}