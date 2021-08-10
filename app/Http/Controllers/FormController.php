<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \Symfony\Component\Console\Output\ConsoleOutput;

class FormController extends Controller
{
    function submit(SubmitForm $request)
    {
        $res = json_encode($request->all());
        echo ("<script type='text/javascript'> console.log($res);</script>");
    }
}
