<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class alumni_records extends Model
{
    use HasFactory;

    protected $table ="alumni_records";

    protected $fillable = ['user_id', 'first_name', 'middle_name', 'last_name', 'gender', 'contact', 'email', 'home_address', 'present_address',
    'school_graduated', 'batch_no', 'pending_offer', 'employment_status', 'company_name', 'company_location', 'job_title', 'date_hired',
    'scholarship_sponsor', 'work_arrangement'];

    public static function getAlumniRecords()
    {
        $records = DB::table('alumni_records')->select('id','first_name','middle_name','last_name','gender','contact','email',
        'home_address','present_address','school_graduated','batch_no','scholarship_sponsor','pending_offer','employment_status',
        'company_location','job_title','date_hired')->get()->toArray();
        return $records;
    }
}