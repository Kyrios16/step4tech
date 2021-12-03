<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromCollection, WithHeadings
{
    /**
     * @return Post list
     */
    public function collection()
    {
        return Post::orderBy('id')
            ->join('users', 'users.id', '=', 'posts.created_user_id')
            ->select('posts.*', 'users.name', 'users.email')
            ->get();
    }

    /**
     * @return posts table column 
     */
    public function headings(): array
    {
        return [
            "Id", "title", "content", "photo", "Created User Id", "Updated User Id", "Deleted User Id",
            "Created_at", "Updated_at", "Created Username", "Email"
        ];
    }
}
