<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewAlumniRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('System_admin.view_action_alumni');
    }

    public function alumni($fname, $mi, $lname, $gender, $contact, $email, $home, $present, $school, $batch_no, $pending, $status, $cname, $location, $title, $work_arr, $update_date)
    {
        return view ('System_admin.view_action_alumni', [
            'fname' => $fname, 
            'mi' => $mi, 
            'lname' => $lname, 
            'gender' => $gender, 
            'contact' => $contact, 
            'email' => $email, 
            'home' => $home,
            'present' => $present,
            'school' => $school,
            'batch_no' => $batch_no,
            'pending' => $pending,
            'status' => $status,
            'cname' => $cname,
            'location' => $location,
            'title' => $title,
            'work_arr' => $work_arr,
            'update_date' => $update_date
        ]);

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
    public function edit($id)
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
        //
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
