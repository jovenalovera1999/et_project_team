<?php

namespace App\Http\Controllers;

use App\Models\scholarship_sponsors;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScholarshipSponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Newly hired alumni
        $scholarship_sponsors = scholarship_sponsors::get(['*']);

        //  Month Footer
        $month = Carbon::now()->format('M Y');

        return view(
            "System_admin.add_scholarship_sponsor",
            [
                'scholarship_sponsors' => $scholarship_sponsors,
                'month' => $month
            ]
        );
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
    public function store(Request $request)
    {
        $scholarship_sponsors = new scholarship_sponsors;
        $scholarship_sponsors->sponsor = $request->scholarship_sponsors;
        $scholarship_sponsors->save();

        return Redirect('scholarship_sponsors')->with('message', 'New record has been successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\scholarship_sponsors  $scholarship_sponsors
     * @return \Illuminate\Http\Response
     */
    public function show(scholarship_sponsors $scholarship_sponsors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\scholarship_sponsors  $scholarship_sponsors
     * @return \Illuminate\Http\Response
     */
    public function edit(scholarship_sponsors $scholarship_sponsors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\scholarship_sponsors  $scholarship_sponsors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, scholarship_sponsors $scholarship_sponsors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\scholarship_sponsors  $scholarship_sponsors
     * @return \Illuminate\Http\Response
     */
    public function destroy(scholarship_sponsors $scholarship_sponsor)
    {
        $scholarship_sponsor->Delete();
        return Redirect('scholarship_sponsors')->with('message', 'Record has been successfully deleted.');
    }
}
