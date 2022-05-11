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
            return view("Alumni_user.view_record", compact('alumni_user', $alumni_user));
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
        $alumni_user1 = alumni_records::where('user_id',"=", $user)->first();
        
        //$alumni_user1 = alumni_records::all();
        //print($user);
        return view("Alumni_user.edit", ['alumni_user1' => $alumni_user1]);
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

        if($pending_offer_isChecked) {
            DB::update('update alumni_records set first_name = ?, middle_name = ?, last_name = ?, gender = ?, contact = ?, home_address = ?,
            present_address = ?, school_graduated = ?, batch_no = ?, employment_status = ?, job_title = ?, company_name = ?, company_location = ?,
            work_arrangement = ?, email = ? where user_id = ?', [$request->first_name, $request->middle_name, $request->last_name, $request->gender, $request->contact,
            $request->home_address, $request->present_address, $request->school_graduated, $request->batch_no, 'None', 'None', 'None', 'None', 'None', $request->email, $id]);
        } else {
            DB::update('update alumni_records set first_name = ?, middle_name = ?, last_name = ?, gender = ?, contact = ?, home_address = ?,
            present_address = ?, school_graduated = ?, batch_no = ?, employment_status = ?, job_title = ?, company_name = ?, company_location = ?,
            work_arrangement = ?, email = ? where user_id = ?', [$request->first_name, $request->middle_name, $request->last_name, $request->gender, $request->contact,
            $request->home_address, $request->present_address, $request->school_graduated, $request->batch_no, $request->employment_status, $request->job_title, 
            $request->company_name, $request->company_location, $request->work_arrangement, $request->email, $id]);
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
