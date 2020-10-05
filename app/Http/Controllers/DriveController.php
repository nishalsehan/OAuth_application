<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DriveController extends Controller
{
    public function uploadFile(Request $request){
        $this->validate($request,[
            'file' => 'required',
            'folder' => 'required',
        ],[],
            [
                'file' => 'File',
                'folder' => 'Folder'
            ]);

    }

}
