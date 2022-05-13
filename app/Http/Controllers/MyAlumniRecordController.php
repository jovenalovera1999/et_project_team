<?php

namespace App\Http\Controllers;


use App\Models\alumni_records;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        
        
        if($request-> hasFile('profile_picture')){
            $image = $request->file('profile_picture');
            $image_name = $image->getClientOriginalName();
            
            $image->move(public_path('/images'),$image_name);     
            $image_path = "/images/" . $image_name;
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
                //'profile_picture' => 'required',
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
                //'profile_picture' => 'required|'
            ]);
           
        }

        if($pending_offer_isChecked && empty($request->middle_name)) {
            DB::update('update alumni_records set first_name = ?, middle_name = ?, last_name = ?, gender = ?, contact = ?, home_address = ?,
            present_address = ?, school_graduated = ?, batch_no = ?,pending_offer = ?, employment_status = ?, job_title = ?, company_name = ?, company_location = ?,
            work_arrangement = ?, email = ?, profile_picture = ?  where user_id = ?', [$request->first_name, 'None', $request->last_name, $request->gender, $request->contact,
            $request->home_address, $request->present_address, $request->school_graduated, $request->batch_no,'With', 'None', 'None', 'None', 'None', 'None', $request->email,$request->profile_picture = $image_path, $id]);
        } else if($pending_offer_isChecked && !empty($request->middle_name)) {
            DB::update('update alumni_records set first_name = ?, middle_name = ?, last_name = ?, gender = ?, contact = ?, home_address = ?,
            present_address = ?, school_graduated = ?, batch_no = ?,pending_offer = ?, employment_status = ?, job_title = ?, company_name = ?, company_location = ?,
            work_arrangement = ?, email = ?, profile_picture = ?  where user_id = ?', [$request->first_name, $request->middle_name, $request->last_name, $request->gender, $request->contact,
<<<<<<< HEAD
            $request->home_address, $request->present_address, $request->school_graduated, $request->batch_no,'With', 'None', 'None', 'None', 'None', 'None', $request->email, $image_path, $id]);
        } else {
=======
            $request->home_address, $request->present_address, $request->school_graduated, $request->batch_no,'With', 'None', 'None', 'None', 'None', 'None', $request->email,$request->profile_picture = $image_path, $id]);
        } else if(!$pending_offer_isChecked && empty($request->middle_name)) {
            DB::update('update alumni_records set first_name = ?, middle_name = ?, last_name = ?, gender = ?, contact = ?, home_address = ?,
            present_address = ?, school_graduated = ?, batch_no = ?,pending_offer = ?, employment_status = ?, job_title = ?, company_name = ?, company_location = ?,
            work_arrangement = ?, email = ? , profile_picture = ? where user_id = ?', [$request->first_name, 'None', $request->last_name, $request->gender, $request->contact,
            $request->home_address, $request->present_address, $request->school_graduated, $request->batch_no,$request -> pending_offer = "Without", $request->employment_status, $request->job_title, 
            $request->company_name, $request->company_location, $request->work_arrangement, $request->email, $request->profile_picture = $image_path, $id]);
        } else if(!$pending_offer_isChecked && !empty($request->middle_name)) {
>>>>>>> dev
            DB::update('update alumni_records set first_name = ?, middle_name = ?, last_name = ?, gender = ?, contact = ?, home_address = ?,
            present_address = ?, school_graduated = ?, batch_no = ?,pending_offer = ?, employment_status = ?, job_title = ?, company_name = ?, company_location = ?,
            work_arrangement = ?, email = ? , profile_picture = ? where user_id = ?', [$request->first_name, $request->middle_name, $request->last_name, $request->gender, $request->contact,
            $request->home_address, $request->present_address, $request->school_graduated, $request->batch_no,$request -> pending_offer = "Without", $request->employment_status, $request->job_title, 
            $request->company_name, $request->company_location, $request->work_arrangement, $request->email, $image_path, $id]);
        }
        return redirect('alumni_view/create')->with('msg', 'Data has been updated!');
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
