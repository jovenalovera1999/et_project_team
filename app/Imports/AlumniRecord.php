<?php

namespace App\Imports;

use App\Models\alumni_records;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Hash;

class AlumniRecord implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [
            'name'=> $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'],
            'email'=> $row['email'],
            'user_type'=> 'Alumni',
            'password' => Hash::make('123'),
        ];

        $user = DB::table('users')->insertGetId($data);

        return new alumni_records([
            'user_id' => $user,
            'first_name' => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'last_name' => $row['last_name'],
            'gender' => $row['gender'],
            'contact' => $row['contact'],
            'email' => $row['email'],
            'home_address' => $row['home_address'],
            'present_address' => $row['present_address'],
            'school_graduated' => $row['school_graduated'],
            'batch_no' => $row['batch_no'],
            'pending_offer' => $row['pending_offer'],
            'employment_status' => $row['employment_status'],
            'company_name' => $row['company_name'],
            'company_location' => $row['company_location'],
            'job_title' => $row['job_title'],
            'date_hired' => $row['date_hired'],
            'scholarship_sponsor' => $row['scholarship_sponsor'],
            'work_arrangement' => $row['work_arrangement'],
        ]);
    }
}
