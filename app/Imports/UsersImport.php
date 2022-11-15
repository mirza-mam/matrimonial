<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'id'              => $row[0],
            'first_name'     => $row[1],
            'last_name'      => $row[2],
            'email'          => $row[3],
            'dob'            => $row[4],
            'you_are'        => $row[5],
            'gender'        => $row[6],
            // 'height'        => $row[7],
            'marital_status'        => $row[8],
            'caste'        => $row[9],
            'look'        => $row[10],
            'education'        => $row[11],
            'occupation'        => $row[12],
            'income'        => $row[13],
            'religion'        => $row[14],
            'whatsapp'        => $row[15],
            'mobile'        => $row[16],
            'password'       => Hash::make($row[17]),
        ]);
    }
}