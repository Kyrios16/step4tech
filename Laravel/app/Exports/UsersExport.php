<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return users list
     */
    public function collection()
    {
        return User::all();
    }

    /**
     * @return users table column 
     */
    public function headings(): array
    {
        return [
            "Id", "Name", "Email", "Profile", "Cover",
            "GitHub", "LinkedIn", "Bio", "DOB", "Phone", "Position", "Role",
            "Created User Id", "Updated User Id", "Deleted User Id",
            "Created_at", "Updated_at"
        ];
    }
}
