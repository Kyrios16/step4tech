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
            ->select(
                'posts.id',
                'posts.title',
                'posts.content',
                'posts.photo',
                'posts.created_at',
                'posts.updated_at',
                'users.name',
                'users.email'
            )
            ->get();
    }

    /**
     * @return posts table column 
     */
    public function headings(): array
    {
        return [
            "Id", "title", "content", "photo",
            "Created_at", "Updated_at", "Created Username", "Email"
        ];
    }
}
