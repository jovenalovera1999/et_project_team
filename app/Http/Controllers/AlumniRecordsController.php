<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\alumni_records;
use Illuminate\Http\Request;
use Hash;

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
        $user = new User;
        $user->name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 'Alumni';

        if($request->password != $request->confirm_password) {
            return back()->with('message-error', 'Failed to create account, password do not match!');
        } else {
            $user->save();
            
            $alumni_record = new alumni_records;
            $alumni_record->user_id = $user->id;
            $alumni_record->first_name = $request->first_name;
            $alumni_record->middle_name = $request->middle_name;
            $alumni_record->last_name = $request->last_name;
            $alumni_record->gender = $request->gender;
            $alumni_record->contact = $request->contact;
            $alumni_record->email = $request->email;
            $alumni_record->home_address = $request->home_address;
            $alumni_record->present_address = $request->present_address;
            $alumni_record->school_graduated = $request->school_graduated;
            $alumni_record->batch_no = $request->batch_no;
            $alumni_record->employment_status = $request->employment_status;
            $alumni_record->company_name = $request->company_name;
            $alumni_record->company_location = $request->company_location;
            $alumni_record->job_title = $request->job_title;
            $alumni_record->work_arrangement = $request->work_arrangement;
            $alumni_record->save();
            return back()->with('message-success', 'Alumni user successfully created!');
        }
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
