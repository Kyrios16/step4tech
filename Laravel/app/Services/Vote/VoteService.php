<?php

namespace App\Services\Vote;

use App\Contracts\Dao\Vote\VoteDaoInterface;
use Illuminate\Http\Request;
use App\Contracts\Services\Vote\VoteServiceInterface;

/**
 * Service class for vote.
 */
class VoteService implements VoteServiceInterface
{
    /**
     * vote dao
     */
    private $voteDao;
    /**
     * Class Constructor
     * @param VoteDaoInterface
     * @return
     */
    public function __construct(VoteDaoInterface $voteDao)
    {
        $this->voteDao = $voteDao;
    }

    /**
     * To votes by PostId
     * @param string $id post id
     * @return Object $voteList
     */
    public function getVoteListwithPostId($id) {
        return $this->voteDao->getVoteListwithPostId($id);
    }
}