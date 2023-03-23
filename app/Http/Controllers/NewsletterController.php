<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    //
    public function __invoke(Newsletter $newsletter)
    {

        request()->validate([
            'email' => 'required|email'
        ]);


        try {

            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'The email provided is invalid'
            ]);
        }

        return redirect('/')->with("success", "Thanks for subscribing");
    }
}
