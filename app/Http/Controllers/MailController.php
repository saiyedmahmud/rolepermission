<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    public function sendmail(Request $request){
        $data = array('name'=>'saiyedmahmud data');
        Mail::send('mail',$data, function($message){
            $message->to('piccimahmud@gmail.com')->subject('test kortechi');
            $message->from('saiyedmahmud05@gmail.com', 'saiyed mahmud from');
        });
        return 'kaj hoichee';
    }
}
