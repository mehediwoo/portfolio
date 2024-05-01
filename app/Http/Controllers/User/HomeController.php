<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slider;

class HomeController extends Controller
{
    public function index()
    {
        $slider = slider::latest()->get();
        return view('user.home')->with([
            'slider'=>$slider,
        ]);
    }
}
