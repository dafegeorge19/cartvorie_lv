<?php

namespace App\Http\Controllers;

use App\MailingList;
use Illuminate\Http\Request;

class MailingListController extends Controller
{
    public function store_mail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:mailing_lists|max:255|email:rfc,dns',
        ]);

        $new_mail_list = new MailingList();
        $new_mail_list->email = $request->email;
        
        if($new_mail_list->save()) {
            return redirect()->back()->with([
                'message' => 'Mail Saved',
                'type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'There was an error saving your email',
            'type' => 'fail'
        ]);
    }
}
