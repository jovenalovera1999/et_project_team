<?php

namespace App\Http\Controllers;

use App\Models\job_opportunities;
use App\Models\alumni_records;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {

        // for Alumni Dashboard datatable 
        //  Job opportunites
        $job_opportunities = job_opportunities::where('status', '=', 'Active')
            ->get(['*']);

        //  Year Footer
        $year = Carbon::now()->format('M Y');

        //  Total Job Oppurtunities
        $job_opportunities_count = job_opportunities::where('status', '=', 'Available')
            ->count();

        //Identify if user has pending offers or none
        // $user = DB::table('alumni_records')->Where(DB::raw
        // ("CONCAT(`first_name`, ' ', `middle_name`,' ', `last_name`)"), 'LIKE', "%".$name."%")
        // ->get('pending_offer');


        //Identify if user has pending offers or none
        $name = Auth::user()->name;
        $user = alumni_records::where(
            DB::raw('concat(first_name," ",middle_name," ",last_name)'),
            'LIKE',
            '%' . $name . '%'
        )
            ->get('pending_offer');


        if (str_contains($user, 'out')) {
            $user = 'You have no pending offer as of the moment';
        } else {
            $user = 'You have a pending offer as of the moment';
        }



        return view('Alumni_user.dashboard', [
            'job_opportunities' => $job_opportunities,
            'year' => $year,
            'job_opportunities_count' => $job_opportunities_count,
            'user' => $user
        ]);
    }

    

  
}
