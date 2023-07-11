<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Mail\partnerFormMail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('welcome'); //contact-us
    }
    
    public function partner(){
        return view('partnerships'); //partner
    }

    public function sendEmail(Request $request){
        $details =[
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'country' => $request->country,
            'city' => $request->city,
            'phone' => $request->phone,
            'restaurant_name' => $request->restaurant_name,
            'subject' => $request->subject,
        ];

        Mail::to('contact@orderchimps.com')->send(new ContactFormMail($details));
        return back()->with('message_sent', 'Your request has been sent successfully');
    }

    public function sendPartnerQuery(Request $request){
        $details =[
            'influencer' => $request->influencer,
            'reseller' => $request->reseller,
            'email' => $request->email,
        ];

        Mail::to('contact@orderchimps.com')->send(new partnerFormMail($details));
        return back()->with('message_sent', 'Your request has been sent successfully');
    }
}
