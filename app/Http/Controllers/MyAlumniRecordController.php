<?php

namespace App\Http\Controllers;


use App\Models\alumni_records;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $alumni_user1 = alumni_records::where('id',"=", $user)->first();
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
    public function update(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',           
        ]);
        

        $user = Auth:: user() -> id;
        $alumni_user =  alumni_records::where('id',"=", $user)->first();
        $alumni_user -> first_name = $request->first_name;
        $alumni_user -> middle_name = $request -> middle_name;
        $alumni_user -> last_name = $request -> last_name;
        $alumni_user -> gender = $request -> gender;
        $alumni_user -> contact = $request -> contact;
        $alumni_user -> email = $request -> email;
        $alumni_user -> home_address = $request -> home_address;
        $alumni_user -> present_address = $request -> present_address;
        $alumni_user -> school_graduated = $request -> school_graduated;
        $alumni_user -> batch_no = $request -> batch_no;
       // $alumni_user -> pending_offer = $request -> pending_offer;-->
        $alumni_user -> employment_status = $request -> employment_status;
        $alumni_user -> company_name = $request -> company_name;
        $alumni_user -> company_location = $request -> company_location;
        $alumni_user -> job_title = $request -> job_title;
        $alumni_user -> work_arrangement = $request -> work_arrangement;
        //$alumni_user -> profile_picture = $request -> file('profile_picture');
        $alumni_user -> profile_picture = $request -> profile_picture;

        $alumni_user -> updated_at = $request -> updated_at;
        $alumni_user ->save();
        
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
