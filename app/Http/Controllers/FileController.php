<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //


    public function store(Request $request){

        $request->fileToUpload->store('logos');

        return $request;
    }
}
