<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Post;
use Illuminate\Http\Request;
use App\Models\alumni_records;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index() {
         // for Admin Dashboard datatable 
        //  Newly hired alumni
        $newly_hired = alumni_records::whereMonth('created_at', date('m'))
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
         $pending_offer = alumni_records::where ('pending_offer', '=', 'with')
         ->count();

        //  Total Registered
        $registered = alumni_records::count();

        //  Month Footer
        $month = Carbon::now()->format('M Y');
       
        //  View Data to dashboard
        return view('System_admin.dashboard', ['alumni_records' => $newly_hired,
         'unemployed' => $unemployed,
         'employed' => $employed,
         'registered' => $registered,
         'month' => $month,
         'pending_offer' => $pending_offer]);

    }
}
