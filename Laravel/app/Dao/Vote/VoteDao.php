<?php

namespace App\Dao\Vote;

use App\Models\Vote;
use App\Contracts\Dao\Vote\VoteDaoInterface;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for vote
 */
class VoteDao implements VoteDaoInterface
{
    /**
     * To votes by PostId
     * @param string $id post id
     * @return Object $voteList
     */
    public function getVoteListwithPostId($id) {
        $voteList = DB::select(DB::raw("SELECT votes.user_id
                                        FROM posts
                                        LEFT JOIN votes ON (votes.post_id = posts.id AND posts.id = :postId)                                        
                                        WHERE votes.deleted_at IS NULL  AND user_id IS NOT NULL"), array( "postId" => $id));
        return $voteList;
    }
}