<?php

namespace App\Exports;

use App\Models\Categories;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoriesExport implements FromCollection, WithHeadings
{
    /**
     * @return categories list
     */
    public function collection()
    {
        return Categories::orderBy('created_at', 'asc')
            ->join('users', 'users.id', '=', 'categories.created_user_id')
            ->select('categories.*', 'users.name as username', 'users.email')
            ->get();
    }

    /**
     * @return posts table column 
     */
    public function headings(): array
    {
        return [
            "Id", "Name", "Created User Id", "Updated User Id", "Deleted User Id",
            "Created_at", "Updated_at", "Created Username", "Email"
        ];
    }
}
