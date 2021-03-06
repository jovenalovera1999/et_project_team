<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\alumni_records;
use App\Models\scholarship_sponsors;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
// use illuminate\Support\Facades\Hash;
use Hash;
use  App\Imports\AlumniRecord;

class AlumniRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumni_records = alumni_records::all();
        return view('System_admin.view_alumni_record', ['alumni_records' => $alumni_records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("System_admin.add_new_record");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pending_offer_isChecked = $request->pending_offer != null;

        if (!$pending_offer_isChecked && $request->employment_status === 'Unemployed') {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'contact' => 'required|numeric',
                'home_address' => 'required',
                'present_address' => 'required',
                'school_graduated' => 'required',
                'batch_no' => 'required|numeric',
                'email' => 'required|email|unique:users|unique:alumni_records',
                'password' => 'required|same:confirm_password',
                'confirm_password' => 'required|same:password'
            ]);
        } elseif(!$pending_offer_isChecked) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'contact' => 'required|numeric',
                'home_address' => 'required',
                'present_address' => 'required',
                'school_graduated' => 'required',
                'batch_no' => 'required|numeric',
                'employment_status' => 'required',
                'job_title' => 'required',
                'date_hired' => 'required',
                'company_name' => 'required',
                'company_location' => 'required',
                'work_arrangement' => 'required',
                'email' => 'required|email|unique:users|unique:alumni_records',
                'password' => 'required|same:confirm_password',
                'confirm_password' => 'required|same:password'
            ]); 
        } else {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'contact' => 'required|numeric',
                'home_address' => 'required',
                'present_address' => 'required',
                'school_graduated' => 'required',
                'batch_no' => 'required|numeric',
                'email' => 'required|email|unique:users|unique:alumni_records',
                'password' => 'required',
                'confirm_password' => 'required'
            ]);
        }

        $user = new User;
        if (empty($request->middle_name)) {
            $user->name = $request->first_name . ' ' . $request->last_name;
        } else {
            $user->name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
        }
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 'Alumni';
        $user->save();

        $alumni_record = new alumni_records;
        $alumni_record->user_id = $user->id;
        $alumni_record->first_name = $request->first_name;
        if (empty($request->middle_name)) {
            $alumni_record->middle_name = 'None';
        } else {
            $alumni_record->middle_name = $request->middle_name;
        }
        $alumni_record->last_name = $request->last_name;
        $alumni_record->gender = $request->gender;
        $alumni_record->contact = $request->contact;
        $alumni_record->email = $request->email;
        $alumni_record->home_address = $request->home_address;
        $alumni_record->present_address = $request->present_address;
        $alumni_record->school_graduated = $request->school_graduated;
        $alumni_record->batch_no = $request->batch_no;
        $alumni_record->scholarship_sponsor = $request->scholarship_sponsor;

        if ($pending_offer_isChecked) {
            $alumni_record->pending_offer = 'With';
            $alumni_record->employment_status = 'Unemployed';
            $alumni_record->company_name = 'None';
            $alumni_record->company_location = 'None';
            $alumni_record->job_title = 'None';
            $alumni_record->date_hired = '1999-10-10';
            $alumni_record->work_arrangement = 'None';
        } else {
            $alumni_record->pending_offer = 'Without';
            if($request->employment_status === 'Unemployed'){
                $alumni_record->employment_status = $request->employment_status;
                $alumni_record->company_name = 'None';
                $alumni_record->company_location = 'None';
                $alumni_record->job_title = 'None';
                $alumni_record->date_hired = '1999-10-10';
                $alumni_record->work_arrangement = 'None';
            } else {
                $alumni_record->employment_status = $request->employment_status;
                $alumni_record->company_name = $request->company_name;
                $alumni_record->company_location = $request->company_location;
                $alumni_record->job_title = $request->job_title;
                if (empty($request->date_hired)) {
                    $request->date_hired = '1999-10-10';
                } else {
                    $alumni_record->date_hired = $request->date_hired;
                }
                $alumni_record->date_hired = $request->date_hired;
                $alumni_record->work_arrangement = $request->work_arrangement;
            }
            
        }

        $alumni_record->save();
        return back()->with('message-success', 'Alumni Record was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alumni_records  $alumni_records
     * @return \Illuminate\Http\Response
     */
    public function show(alumni_records $alumni_record)
    {
        $scholarship_sponsors = scholarship_sponsors::all();
        return view('System_admin.editalumni')->with(['alumni_records' => $alumni_record, 'scholarship_sponsors' => $scholarship_sponsors]);
        
        $alumni_records = alumni_records::find($id);
        return view('System_admin.show')->with('System_admin', $alumni_records);
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
    public function update(Request $request, alumni_records $alumni_record)
    {
        $pending_offer_isChecked = $request->pending_offer != null;

        if (!$pending_offer_isChecked && $request->employment_status === 'Unemployed') {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'contact' => 'required|numeric',
                'home_address' => 'required',
                'present_address' => 'required',
                'school_graduated' => 'required',
                'batch_no' => 'required|numeric',
            ]);
        } elseif(!$pending_offer_isChecked) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'contact' => 'required|numeric',
                'home_address' => 'required',
                'present_address' => 'required',
                'school_graduated' => 'required',
                'batch_no' => 'required|numeric',
                'employment_status' => 'required',
                'job_title' => 'required',
                'date_hired' => 'required',
                'company_name' => 'required',
                'company_location' => 'required',
                'work_arrangement' => 'required',
            ]); 
        } else {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'contact' => 'required|numeric',
                'home_address' => 'required',
                'present_address' => 'required',
                'school_graduated' => 'required',
                'batch_no' => 'required|numeric',
            ]);
        }

        $alumni_record->first_name = $request->first_name;
        if (empty($request->middle_name)) {
            $alumni_record->middle_name = 'None';
        } else {
            $alumni_record->middle_name = $request->middle_name;
        }
        $alumni_record->last_name = $request->last_name;
        $alumni_record->contact = $request->contact;
        $alumni_record->home_address = $request->home_address;
        $alumni_record->present_address = $request->present_address;
        $alumni_record->school_graduated = $request->school_graduated;
        $alumni_record->batch_no = $request->batch_no;
        $alumni_record->scholarship_sponsor = $request->scholarship_sponsor;
        if ($pending_offer_isChecked) {
            $alumni_record->pending_offer = 'With';
            $alumni_record->employment_status = 'Unemployed';
            $alumni_record->company_name = 'None';
            $alumni_record->company_location = 'None';
            $alumni_record->job_title = 'None';
            $alumni_record->date_hired = '1999-10-10';
            $alumni_record->work_arrangement = 'None';
        } else {
            $alumni_record->pending_offer = 'Without';
            if($request->employment_status === 'Unemployed'){
                $alumni_record->employment_status = $request->employment_status;
                $alumni_record->company_name = 'None';
                $alumni_record->company_location = 'None';
                $alumni_record->job_title = 'None';
                $alumni_record->date_hired = '1999-10-10';
                $alumni_record->work_arrangement = 'None';
            } else {
                $alumni_record->employment_status = $request->employment_status;
                $alumni_record->company_name = $request->company_name;
                $alumni_record->company_location = $request->company_location;
                $alumni_record->job_title = $request->job_title;
                if (empty($request->date_hired)) {
                    $request->date_hired = '1999-10-10';
                } else {
                    $alumni_record->date_hired = $request->date_hired;
                }
                $alumni_record->date_hired = $request->date_hired;
                $alumni_record->work_arrangement = $request->work_arrangement;
            }
        }
        $alumni_record->save();
        return back()->with('message-success', 'Alumni Record was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alumni_records  $alumni_records
     * @return \Illuminate\Http\Response
     */
    public function destroy(alumni_records $alumni_record)
    {
        $alumni_record->delete();
        return back()->with('message-success', 'Alumni Record was successfully deleted!');
    }

    public function import(Request $request)
    {
        Excel::import(new AlumniRecord,$request->file);
        return back()->with('message-success', 'Alumni Record successfully imported!');
    }
} 