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
        $job_opportunity = new job_opportunities;
        $job_opportunity->company_name = $request->company_name;
        $job_opportunity->job_title = $request->job_title;
        $job_opportunity->job_role = $request->job_role;
        $job_opportunity->job_requirements = $request->job_requirements;
        $job_opportunity->company_location = $request->company_location;
        $job_opportunity->vacancy_no = $request->vacancy_no;
        $job_opportunity->status = $request->status;
        $job_opportunity->save();

        return Redirect('/job_opportunities')->with('message-success', 'Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job_opportunities  $job_opportunities
     * @return \Illuminate\Http\Response
     */
    public function show(job_opportunities $job_opportunity)
    {
        return view('System_admin.edit')->with('job_opportunities',$job_opportunity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job_opportunities  $job_opportunities
     * @return \Illuminate\Http\Response
     */
    public function edit(job_opportunities $job_opportunity)
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
    public function update(Request $request, job_opportunities $job_opportunity)
    {
        $status = $request->status != null;
        $status_isChecked = $request->status_checkbox != null;

        $job_opportunity->company_name = $request->company_name;
        $job_opportunity->job_title = $request->job_title;
        $job_opportunity->job_role = $request->job_role;
        $job_opportunity->job_requirements = $request->job_requirements;
        $job_opportunity->company_location = $request->company_location;
        $job_opportunity->vacancy_no = $request->vacancy_no;
        if($status) {
            $job_opportunity->status = 'Available';
        } else {
            $job_opportunity->status = 'Unavailable';
        }
        $job_opportunity->save();
        return Redirect('/job_opportunities')->with('message-success', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job_opportunities  $job_opportunities
     * @return \Illuminate\Http\Response
     */
    public function destroy(job_opportunities $job_opportunity)
    {
        $job_opportunity->delete();
        return Redirect('/job_opportunities')->with('message-success', 'Successfully Deleted!');
    }
}
