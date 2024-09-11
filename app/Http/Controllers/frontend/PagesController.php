<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function booking(){
        return view('pages.booking');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function services(){
        return view('pages.services');
    }
    public function faq(){
        return view('pages.faq');
    }
    public function quotes(){
        return view('pages.quotes');
    }
}
