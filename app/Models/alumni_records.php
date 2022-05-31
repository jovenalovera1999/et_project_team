<?php

namespace App\Models;

use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
//use Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;

class alumni_records extends Model
{
    use HasFactory;

    
    
      
   protected $table ="alumni_records";

    protected $fillable = ['id', 'first_name', 'middle_name', 'last_name', 'gender', 'contact', 'email', 'home_address', 'present_address',
    'school_graduated', 'batch_no', 'pending_offer', 'employment_status', 'company_name', 'company_location', 'job_title', 'date_hired',
    'scholarship_sponsor', 'work_arrangement'] ;

    public static function getAlumniRecords()
    {
    
        $records = DB::table('alumni_records')->select('id','first_name','middle_name','last_name','gender','contact','email',
        'home_address','present_address','school_graduated','batch_no','scholarship_sponsor','pending_offer','employment_status','company_name',
        'company_location','job_title','work_arrangement','date_hired')-> get();

        // ->whereBetween('created_at',  array(),)
           
       
        return $records;
       
    }
}