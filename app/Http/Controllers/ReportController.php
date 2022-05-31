<?php

namespace App\Http\Controllers;

use App\Exports\AlumniExport;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\alumni_records;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public string $fromDate;
    public string $toDate;


    


   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()-> ajax())
        {
            if(!empty($request->fromDate))
            {
                $data = DB::table('alumni_records')
                ->whereBetween('created_at',  array($request->fromDate,$request->toDate)) -> get();
                $fromDate = $request -> fromDate;
                $toDate = $request ->toDate;

            }else
            {
                $data = DB::table('alumni_records')->get();
            }
            return datatables()->of($data)->make(true);

        }
       
        return view("System_admin.report");
    }

    /*public function addAlumniRecord()
    {

        $alumni = [
            ['id' => '4','first_name'=> 'kim','middle_name' =>'kim','last_name'=>'kim','gender'=>'male','contact'=>'091234','email'=>'kimbangud2@gmail.com','home_address'=>'Panitan','present_address'=>'Tabuc','school_graduated'=>'Filamer Christian University','batch_no'=> '1','scholarship_sponsor' =>'None','pending_offer'=>'With','employment_status'=>'None','company_location'=>'None','job_title'=>'None','date_hired'=>'1999-10-10','profile_picture'=>'images/kim.png']
        ];
        alumni_records::insert($alumni);
        return "Records are inserted";
    }*/
    public function export()
    {
        return Excel::download(new AlumniExport, 'Alumni-Report.xlsx');

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
