<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select("id", "first_name", "last_name", "email", "dob", "you_are",)->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {

        return [
            "ID",
            "First Name",
            "Last Name",
            "Email",
            "dob",
            "you_are"
        ];
    }
}