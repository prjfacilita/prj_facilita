<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //


    public function store(Request $request){

        $request->file('image')->store('logos');

        return $request;
    }
}
