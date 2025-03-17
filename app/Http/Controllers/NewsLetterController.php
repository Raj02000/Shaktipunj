<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    //

    public function index(){
        return view('admin.newsletter.index',['newsletter'=>NewsLetter::simplePaginate(15)]);
    }


}
