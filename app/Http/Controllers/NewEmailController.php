<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumni_records;

class NewEmailController extends Controller
{
    public function index() 
    {
        $alumni_records = alumni_records::all();
        return view('System_admin.email_sending', compact('alumni_records', $alumni_records));
    }
}
