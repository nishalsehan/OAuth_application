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
        //store the file in the system
        $fNameWithExt_file = $request->file('file')->getClientOriginalName();
        $fName_file = pathinfo($fNameWithExt_file, PATHINFO_FILENAME);
        $extension_file = $request->file('file')->getClientOriginalExtension();
        $fNameToStore_file = $fName_file.'_'.time().'.'.$extension_file;
        $path_file = $request->file('file')->storeAs('public/files', $fNameToStore_file);


    }

}
