<?php

namespace App\Http\Controllers;

use App\Exports\AlumniExport;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\alumni_records;
use App\Models\scholarship_sponsors;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()-> ajax())
        {
            if($request->scholarship_sponsor != 'None' && $request->batch_no != 'None')
            {
                $records = DB::table('alumni_records')->where('scholarship_sponsor', $request->scholarship_sponsor)->where('batch_no', $request->batch_no)->get();

            }else
            {
                $records = DB::table('alumni_records')->get();
            }
            return datatables()->of($records)->make(true);
        }
        $scholarship_sponsors = scholarship_sponsors::all();
        $batch_nos = DB::table('alumni_records')->select('batch_no')->orderBy('batch_no', 'asc')->distinct()->get();
        return view("System_admin.report", ['scholarship_sponsors' => $scholarship_sponsors, 'batch_nos' => $batch_nos]);
    }

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
