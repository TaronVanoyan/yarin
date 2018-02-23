<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\Event;
class HomePageController extends Controller
{
    public function index(){
        $data = [
            'teacher_groups' => Teacher::paginate(12)->chunk(4),
            'events'         => Event::paginate(1)
        ];

        return view("front.home_page.index",$data);
    }
}
