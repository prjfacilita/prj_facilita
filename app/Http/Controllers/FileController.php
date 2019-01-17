<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //


    public function store(Request $request){

        $request->image->store();
        $request->logo->storeAs('1.png');

        return $request->image;
    }
}
