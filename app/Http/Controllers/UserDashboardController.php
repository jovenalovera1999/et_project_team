<?php

namespace App\Http\Controllers;

use App\Models\job_opportunities;
use App\Models\alumni_records;
use App\Models\job_id;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Hamcrest\Core\IsNot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {

        // for Alumni Dashboard datatable 
        //  Job opportunites
        $job_opportunities = job_opportunities::where('status', '=', 'Available')
            ->get(['*']);

        //  Year Footer
        $year = Carbon::now()->format('M Y');

        //  Total Job Oppurtunities
        $job_opportunities_count = job_opportunities::where('status', '=', 'Available')
            ->count();


        //Identify if user has pending offers or none
        $id = Auth::user()->id;
        // $result = DB::table('alumni_records')->select('pending_offer')
        //     ->whereConcat(['first_name'," ",'middle_name'," ",'last_name'], $name)->first();

        $result = DB::table('users')
            ->join('alumni_records', 'users.id', '=', 'alumni_records.user_id')
            ->select('pending_offer')
            ->where('alumni_records.user_id', '=', $id)->first();


        $user = $result->pending_offer;


        if (str_contains($user, 'out')) {
            $user = 'You have no pending offer as of the moment';
        } else {
            $user = 'You have a pending offer as of the moment';
        }


        // for footer
        $month = Carbon::now()->format('M Y');


        return view('Alumni_user.dashboard', [
            'job_opportunities' => $job_opportunities,
            'year' => $year,
            'job_opportunities_count' => $job_opportunities_count,
            'user' => $user,
            'month' => $month
        ]);
    }

    public function show($id, $c_name, $title, $role, $reqs, $location, $vacancy, $status)
    {
        return view('Alumni_user.view_job', ['id' => $id, 'c_name' => $c_name, 'title' => $title, 'role' => $role, 'reqs' => $reqs, 'location' => $location, 'vacancy' => $vacancy, 'status' => $status]);
    }

    public function pending_offer($id)
    {
        return view($id);
    }
}
