<?php

namespace App\Http\Controllers;
use Newsletter;
use Illuminate\Http\Request;


class MailChimpController extends Controller

{
    public function index()
    {
        return view ('mailchimp');
    }


    public function subscribe(Request $request){
        
        $request->validate([
            'subcriber_email'=>'required|email'

        ]);

        dd('test: before subscription check');

        try {
            
            if
                (Newsletter::isSubscribed($request->subcriber_email)) {
                return redirect()->back()->with('error','email already subscribe');
                
            }
            
            else {

                Newsletter::subscribe($request->subcriber_email);
                return redirect()->back()->with('success','email subscribe');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
            
        }
    }
}
