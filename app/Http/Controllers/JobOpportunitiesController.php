<?php

namespace App\Http\Controllers;

use App\Models\job_opportunities;
use Illuminate\Http\Request;
use DataTables;

class JobOpportunitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $job_opportunities = job_opportunities::all();
        return view('System_admin.job_hiring_setup',compact('job_opportunities')); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('System_admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $job_opportunities = new job_opportunities;
        $job_opportunities->company_name = $request->company_name;
        $job_opportunities->job_title = $request->job_title;
        $job_opportunities->job_role = $request->job_role;
        $job_opportunities->job_requirements = $request->job_requirements;
        $job_opportunities->company_location = $request->company_location;
        $job_opportunities->vacancy_no = $request->vacancy_no;
        $job_opportunities->status = $request->status;
        $job_opportunities->save();

        return Redirect('job_opportunities')->with('message', 'Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job_opportunities  $job_opportunities
     * @return \Illuminate\Http\Response
     */
    public function show(job_opportunities $job_opportunities)
    {
        return view('System_admin.edit')->with('job_opportunities',$job_opportunities);
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
        $student->company_name = $request->company_name;
        $student->job_title = $request->job_title;
        $student->job_role = $request->job_role;
        $student->job_requirements = $request->job_requirements;
        $student->company_location = $request->company_location;
        $student->vacancy_no = $request->vacancy_no;
        $student->status = $request->status;
        $student->save();

        return Redirect('student')->with('message', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job_opportunities  $job_opportunities
     * @return \Illuminate\Http\Response
     */
    public function destroy(job_opportunities $job_opportunities)
    {
        $job_opportunities->delete();
        return Redirect('job_opportunities')->with('message', 'Successfully Deleted!');
    }
}
