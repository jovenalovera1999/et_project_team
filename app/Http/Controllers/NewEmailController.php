<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumni_records;
use App\Mail\UserEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NewEmailController extends Controller
{
    public function index() 
    {
        $alumni_records = alumni_records::all();
        return view('System_admin.email_sending', compact('alumni_records', $alumni_records));
    }

    public function sendMail(Request $request) {

        $request->validate([
            'emailaddress' => 'required',
            'subject' => 'required',
            'message' => 'required',
          ]);

        $details = [
            'subject' => $request->subject,
            'message' => $request->message,
            'signature' => "<br>Thanks, <br> From Employee Track Demo <br> <a href='http://nt-et.herokuapp.com/'>Visit Here</a>",
            // 'emailaddress' => $request->emails,
          ];
        
        $emailaddress = $request->emailaddress;

        $contains = Str::contains($emailaddress, [',']);

        if (($contains) === true){

            $emails = explode(",", $emailaddress);

            foreach($emails as $email) {

                Mail::to($email)->send(new UserEmail($details));

            }
        }else{

            Mail::to($emailaddress)->send(new UserEmail($details));

        }

        return back()->with(['msg' => 'Mail/s successfully sent!']);

    }
}
