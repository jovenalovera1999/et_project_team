<?php

namespace App\Http\Controllers;

use App\Models\job_opportunities;
use Carbon\Carbon;
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

        return view('Alumni_user.dashboard', [
            'job_opportunities' => $job_opportunities,
            'year' => $year]);
    }
}
