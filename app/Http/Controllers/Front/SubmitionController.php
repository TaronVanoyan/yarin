<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Submition;
class SubmitionController extends Controller
{
    public function submit(Request $request){
        $submition = new Submition();
        $submition->fill($request->all());
        $submition->save();
//        /print_r($request->all());
    }
}
