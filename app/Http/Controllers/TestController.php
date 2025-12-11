<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test () //داله اسمها test
    {
        dd('hello'); //dd-->اعرض و وقف التنفيذ 
        //لما نفتح الرابط متاع الدله , Laravel يعرض كلمة:hello 
    }

     public function note ()
     {
         dd('hi');
     }
}

 