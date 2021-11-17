<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostsExport implements FromCollection
{
    /**
     * @return Post list
     */
    public function collection()
    {
        return Post::all();
    }
}
