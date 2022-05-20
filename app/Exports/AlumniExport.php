<?php

namespace App\Exports;

use App\Models\alumni_records;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class AlumniExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return[
            'Id','First Name','Middle Name','Last Name','Gender','Contact','Email','Home Address','Present Address','School Graduated','Batch Number','Scholarship Sponsor','Pending Offer','Employment Status','Company Location','Job Title','Date Hired'
        ];

    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(alumni_records::getAlumniRecords());
    }
}
