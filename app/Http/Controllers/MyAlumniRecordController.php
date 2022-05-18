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
            //$id = Auth::user() -> id;
            $user = Auth::user()->id;
            $alumni_user = alumni_records::where('user_id',"=", $user)->first();
            //$alumni_user1 = alumni_records::all();
            //print($user);
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
        //
        $user = Auth:: user() -> id;
        $alumni_user = alumni_records::where('user_id',"=", $user)->first();
      
        //$alumni_user1 = alumni_records::all();
        //print($user);
        return view("Alumni_user.edit", ['alumni_user1' => $alumni_user]);
        //return view('Alumni_user.edit');
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
        //$user = Auth:: user() -> id;
        //$alumni_user1 = alumni_records::where('id',"=", $id)->first();
        //$alumni_user1 = alumni_records::all();
        //print($user);
        //return view("Alumni_user.edit", ['alumni_user1' => $alumni_user1]);
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
        
        $user = Auth:: user() -> id;
        $alumni_record = alumni_records::where('user_id',"=", $user)->first();
        if($request-> hasFile('profile_picture')){
            $image = $request->file('profile_picture');
            $image_name = $image->getClientOriginalName();
            
            $image->move(public_path('/images'),$image_name);     
            $image_path = "/images/" . $image_name;
        } else {
            $image_path = null;
        }
        $pending_offer_isChecked = $request->pending_offer != null;

        if(!$pending_offer_isChecked) {
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
                'email' => 'required|email',
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
                'email' => 'required|email',
                'password' => 'required|same:confirm_password',
                'confirm_password' => 'required|same:password'
            ]);
        }

        $user = User::where('id',"=", $user)->first();
        if(empty($request->middle_name)) {
            $user->name = $request->first_name . ' ' . $request->last_name;
        } else {
            $user->name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
        }
        if($pending_offer_isChecked && empty($request->middle_name)) {
            DB::update('update alumni_records set first_name = ?, middle_name = ?, last_name = ?, gender = ?, contact = ?, home_address = ?,
            present_address = ?, school_graduated = ?, batch_no = ?,scholarship_sponsor = ?, pending_offer = ?, employment_status = ?, job_title = ?, company_name = ?, company_location = ?,
            work_arrangement = ?, email = ?, profile_picture = ?  where user_id = ?', [$request->first_name, 'None', $request->last_name, $request->gender, $request->contact,
            $request->home_address, $request->present_address, $request->school_graduated, $request->batch_no,"None",'With', 'None', 'None', 'None', 'None', 'None', $request->email,$request->profile_picture = $image_path, $id]);
        } else if($pending_offer_isChecked && !empty($request->middle_name)) {
            DB::update('update alumni_records set first_name = ?, middle_name = ?, last_name = ?, gender = ?, contact = ?, home_address = ?,
            present_address = ?, school_graduated = ?, batch_no = ?,scholarship_sponsor = ?,pending_offer = ?, employment_status = ?, job_title = ?, company_name = ?, company_location = ?,
            work_arrangement = ?, email = ?, profile_picture = ?  where user_id = ?', [$request->first_name, $request->middle_name, $request->last_name, $request->gender, $request->contact,
            $request->home_address, $request->present_address, $request->school_graduated, $request->batch_no,"None",'With', 'None', 'None', 'None', 'None', 'None', $request->email,$request->profile_picture = $image_path, $id]);
        } else if(!$pending_offer_isChecked && empty($request->middle_name)) {
            DB::update('update alumni_records set first_name = ?, middle_name = ?, last_name = ?, gender = ?, contact = ?, home_address = ?,
            present_address = ?, school_graduated = ?, batch_no = ?,scholarship_sponsors = ?,pending_offer = ?, employment_status = ?, job_title = ?, company_name = ?, company_location = ?,
            work_arrangement = ?, email = ? , profile_picture = ? where user_id = ?', [$request->first_name, 'None', $request->last_name, $request->gender, $request->contact,
            $request->home_address, $request->present_address, $request->school_graduated, $request->batch_no,"None",$request -> pending_offer = "Without", $request->employment_status, $request->job_title, 
            $request->company_name, $request->company_location, $request->work_arrangement, $request->email, $request->profile_picture = $image_path, $id]);
        } else if(!$pending_offer_isChecked && !empty($request->middle_name)) {
            DB::update('update alumni_records set first_name = ?, middle_name = ?, last_name = ?, gender = ?, contact = ?, home_address = ?,
            present_address = ?, school_graduated = ?, batch_no = ?,scholarship_sponsor = ?,pending_offer = ?, employment_status = ?, job_title = ?, company_name = ?, company_location = ?,
            work_arrangement = ?, email = ? , profile_picture = ? where user_id = ?', [$request->first_name, $request->middle_name, $request->last_name, $request->gender, $request->contact,
            $request->home_address, $request->present_address, $request->school_graduated, $request->batch_no,"None",$request -> pending_offer = "Without", $request->employment_status, $request->job_title, 
            $request->company_name, $request->company_location, $request->work_arrangement, $request->email, $request->profile_picture = $image_path, $id]);
        }
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 'Alumni';
        $user->save();
            
        
        
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
        
        $alumni_record-> profile_picture = $image_path;

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
            $alumni_record->employment_status = $request->employment_status;
            $alumni_record->company_name = $request->company_name;
            $alumni_record->company_location = $request->company_location;
            $alumni_record->job_title = $request->job_title;
            $alumni_record->date_hired = $request->date_hired;
            $alumni_record->work_arrangement = $request->work_arrangement;
        }

        $alumni_record->save();
        return redirect('alumni_view/create')->with('message-success', 'User has been updated!');
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
