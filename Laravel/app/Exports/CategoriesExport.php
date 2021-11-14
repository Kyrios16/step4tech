<?php

namespace App\Exports;

use App\Models\Categories;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoriesExport implements FromCollection
{
    /**
     * @return categories list
     */
    public function collection()
    {
        return Categories::all();
    }
}
