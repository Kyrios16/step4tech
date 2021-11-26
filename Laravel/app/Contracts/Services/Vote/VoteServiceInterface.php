<?php

namespace App\Contracts\Services\Vote;


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
