<?php

namespace App\Http\Controllers;

use App\Models\job_opportunities;
use Illuminate\Http\Request;

class JobOpportunitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('System_admin.job_hiring_setup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'company_name' => 'required',
            'job_title' => 'required',
            'job_role' => 'required',
            'job_requirements' => 'required',
            'company_location' => 'required',
            'vacancy_no' => 'required',
            'status' => 'required',
        ]);

        $job = new Job;
        $job->company_name = $request->company_name;
        $job->job_title = $request->job_title;
        $job->job_role = $request->job_role;
        $job->job_requirements = $request->job_requirements;
        $job->company_location = $request->company_location;
        $job->vacancy_no = $request->vacancy_no;
        $job->status = $request->status;

        if($request->password != $request->confirm_password) {
            return back()->with('message-error', 'Failed to create account, password do not match!');
        } else if($request->job_type === "Select job's type") {
            return back()->with('message-error', 'Failed to create account, please select job type!');
        } else {
            $job->save();
            return back()->with('message-success', 'Data successfully created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job_opportunities  $job_opportunities
     * @return \Illuminate\Http\Response
     */
    public function show(job_opportunities $job_opportunities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job_opportunities  $job_opportunities
     * @return \Illuminate\Http\Response
     */
    public function edit(job_opportunities $job_opportunities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\job_opportunities  $job_opportunities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, job_opportunities $job_opportunities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job_opportunities  $job_opportunities
     * @return \Illuminate\Http\Response
     */
    public function destroy(job_opportunities $job_opportunities)
    {
        //
    }
}
