<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\mailing;
use Validator;

class mail1 extends Controller
{
   public function send()
    {
    	set_time_limit(3000);
        $objDemo = new \stdClass();
        $objDemo->sender = 'waruikinyuru@gmail.com';
        $objDemo->receiver = 'franciskinyuru26@gmail.com';
        Mail::to("franciskinyuru26@gmail.com")->send(new mailing($objDemo));
        return "success";
    }
}
