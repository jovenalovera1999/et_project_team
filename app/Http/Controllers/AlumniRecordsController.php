<?php

namespace App\Http\Controllers;

use App\Models\alumni_records;
use Illuminate\Http\Request;

class AlumniRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("System_admin.add_new_record");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alumni_records  $alumni_records
     * @return \Illuminate\Http\Response
     */
    public function show(alumni_records $alumni_records)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alumni_records  $alumni_records
     * @return \Illuminate\Http\Response
     */
    public function edit(alumni_records $alumni_records)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alumni_records  $alumni_records
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alumni_records $alumni_records)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alumni_records  $alumni_records
     * @return \Illuminate\Http\Response
     */
    public function destroy(alumni_records $alumni_records)
    {
        //
    }
}
