<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumni_records;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=alumni_records::orderByDesc('id')->get();
        //full_name = alumni_records::select("*", DB::raw("CONCAT(alumni_records.first_name,' ',alumni_records.last_name) as full_name"))->get();
        return view('EmailSend.index',['data'=>$data]);
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
        //return view('EmailSend.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=alumni_records::find($id);
        return view('EmailSend.edit', ['data'=>$data]);
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
        $request->validate([
            'name' =>'required',
            'email'=>'required'
            
        ]);
        $name = $request->name;
        $fullname = explode("-", $name);

        $data=alumni_records::find($id);
        $data->first_name=$fullname[0];
        $data->last_name=$fullname[1];
        $data->email=$request->email;
        $data->save();

        return redirect('email/'.$id.'/edit')->with('msg', 'Data has been updated!');
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
