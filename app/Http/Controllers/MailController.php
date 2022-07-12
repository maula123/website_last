<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
class MailController extends Controller
{
    //
    public function index(Request $request){
        try {
            $details = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    
            ];
     
            $kirim = Mail::to("maulaalfalaqioz@gmail.com")->send(new KontakMail($details));
        
                return redirect()->back()->with('success-kirim','Text'); 
            } catch (\Exception $e) {
                return redirect()->back()->with('error-kirim','Text'); 
         }
     
        }
}
