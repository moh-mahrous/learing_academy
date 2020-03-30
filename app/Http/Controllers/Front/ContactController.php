<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Setting;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data['settings'] =Setting::first();

        return view('front.contant.index')->with($data);
    }
}
