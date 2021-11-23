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
        return Categories::all();
    }

    /**
     * @return posts table column 
     */
    public function headings(): array
    {
        return [
            "Id", "Name", "Created User Id", "Updated User Id", "Deleted User Id",
            "Created_at", "Updated_at"
        ];
    }
}
