<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Post;
use Illuminate\Http\Request;
use App\Models\alumni_records;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
       // for Dashboard datatable 
        //  Newly hired alumni
        $alumni_records = alumni_records::whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->where ('employment_status', '=', 'Employed')
        ->get(['*']);

       //  Total Unemployed
        $unemployed = alumni_records::where ('employment_status', '=', 'Unemployed')
        ->count();
       
        //  Total Employed
        $employed = alumni_records::where ('employment_status', '=', 'Employed')
        ->count();

         //  Pending Offers
         $pending_offer = alumni_records::where ('pending_offer', '=', 'With')
         ->count();

        //  Total Registered
        $registered = alumni_records::count();

        //  Month Footer
        $month = Carbon::now()->format('M Y');

        $total_alumni = alumni_records::get(['*']);
       
        //  View Data to dashboard
        return view('System_admin.dashboard', ['alumni_records' => $alumni_records,
         'unemployed' => $unemployed,
         'employed' => $employed,
         'registered' => $registered,
         'month' => $month,
         'pending_offer' => $pending_offer,
         'total_alumni' => $total_alumni]);
    }

    public function alumni($fname, $mi, $lname, $gender, $contact, $email, $home, $present, $school, $batch_no, $pending, $status, $cname, $location, $title, $work_arr, $date_hired, $updated_at)
    {
        return view ('System_admin.view_newly_hired', [
            'fname' => $fname, 
            'mi' => $mi, 
            'lname' => $lname, 
            'gender' => $gender, 
            'contact' => $contact, 
            'email' => $email, 
            'home' => $home,
            'present' => $present,
            'school' => $school,
            'batch_no' => $batch_no,
            'pending' => $pending,
            'status' => $status,
            'cname' => $cname,
            'location' => $location,
            'title' => $title,
            'work_arr' => $work_arr,
            'date_hired' => $date_hired,
            'updated_at' => $updated_at
        ]);

    }
}
