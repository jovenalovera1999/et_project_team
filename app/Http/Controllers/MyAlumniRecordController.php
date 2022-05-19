<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\alumni_records;
use App\Models\scholarship_sponsors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;use Carbon\Carbon;
use Hash;
use DB;

class MyAlumniRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()) {
            return redirect('/login');
        } else {
            $alumni_user = alumni_records::where('user_id', "=", Auth::user()->id)->first();
            return view("Alumni_user.view_record", ['alumni_user' =>  $alumni_user]);
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumni_user = alumni_records::where('user_id',"=", Auth::user()->id)->first();
        return view("Alumni_user.edit", ['alumni_user1' => $alumni_user]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alumni_record = alumni_records::where('id', "=", $id)->first();
        if($request-> hasFile('profile_picture')){
            $image = $request->file('profile_picture');
            $image_name = $image->getClientOriginalName();
            
            $image->move(public_path('/images'),$image_name);     
            $image_path = "/images/" . $image_name;
        } else if(empty($request->hasFile('profile_picture')) && !empty($alumni_record->profile_picture) || empty($alumni_record->profile_picture)) {
            $image_path = $alumni_record->profile_picture;
        } else {
            $image_path = null;
        }
        $pending_offer_isChecked = $request->pending_offer != null;

        if(!$pending_offer_isChecked && $request->employment_status === 'Unemployed') {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'contact' => 'required|numeric',
                'home_address' => 'required',
                'present_address' => 'required',
                'school_graduated' => 'required',
                'batch_no' => 'required|numeric',
                'email' => 'required|email'
            ]);
        } else if(!$pending_offer_isChecked) {
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
                'company_name' => 'required',
                'company_location' => 'required',
                'work_arrangement' => 'required',
                'email' => 'required|email'
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
                'email' => 'required|email'
            ]);
        }
            
        $alumni_record->first_name = $request->first_name;
        if($request->middle_name) {
            $alumni_record->middle_name = 'None';
        } else {
            $alumni_record->middle_name = $request->middle_name;
        }
        $alumni_record->last_name = $request->last_name;
        $alumni_record->gender = $request->gender;
        $alumni_record->contact = $request->contact;
        $alumni_record->home_address = $request->home_address;
        $alumni_record->present_address = $request->present_address;
        $alumni_record->school_graduated = $request->school_graduated;
        $alumni_record->batch_no = $request->batch_no;
        if($pending_offer_isChecked) {
            $alumni_record->pending_offer = 'With';
            $alumni_record->employment_status = 'None';
            $alumni_record->company_name = 'None';
            $alumni_record->company_location = 'None';
            $alumni_record->job_title = 'None';
            $alumni_record->date_hired = '1999-10-10';
            $alumni_record->work_arrangement = 'None';
        } else {
            $alumni_record->pending_offer = 'Without';
            if($request->employment_status === 'Unemployed') {
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
                $alumni_record->date_hired = $request->date_hired;
                $alumni_record->work_arrangement = $request->work_arrangement;
            }
        }
        $alumni_record->profile_picture = $image_path;
        $alumni_record->email = $request->email;
        $alumni_record->save();
        $user = User::where('id', '=', Auth::user()->id)->first();
        $user->email = $request->email;
        $user->save();
        return back()->with('message-success', 'Your record was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
