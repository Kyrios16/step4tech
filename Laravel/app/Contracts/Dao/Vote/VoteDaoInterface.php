<?php

namespace App\Contracts\Dao\Vote;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of vote
 */
interface VoteDaoInterface
{
    /**
     * To votes by PostId
     * @param string $id post id
     * @return Object $voteList
     */
    public function getVoteListwithPostId($id);
}