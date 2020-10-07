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

        //create a google client
        $client = new \Google_Client();
        $client->setApplicationName("Laravel");
        $client->setDeveloperKey(env('GOOGLE_CLIENT_ID'));
        //Session::get('token') - tke the token from Session
        $client->setAccessToken(Session::get('token'));

        $result = $this->add_file( asset('storage/files/'.$fNameToStore_file) , $fNameToStore_file, $this->newDirectory( $request->folder,$client ),$client);

        return redirect(route('home.index'));
    }

    function directoryCheck( $dire_name,$client ){

        $gService = new \Google_Service_Drive($client);

        $para['q'] = "mimeType='application/vnd.google-apps.folder' and name='$dire_name' and trashed=false";
        $docs = $gService->files->listFiles($para);

        $exists = [];
        foreach( $docs as $k => $file ){
            $exists[] = $file;
        }

        return $exists;
    }
    function newDirectory( $dire_name,$client, $dire_id=null ){

        $directories = $this->directoryCheck( $dire_name,$client );

        // if folder does not exists
        if( count( $directories) == 0 ){
            $googleService = new \Google_Service_Drive( $client );
            $dire = new \Google_Service_Drive_DriveFile();
            $dire->setMimeType('application/vnd.google-apps.folder');
            $dire->setName( $dire_name );
            if( !empty( $dire_id ) ){
                $dire->setParents( [ $dire_id ] );
            }

            $result = $googleService->files->create( $dire );

            $new_dire_id = null;

            if( isset( $result['id'] ) && !empty( $result['id'] ) ){
                $new_dire_id= $result['id'];
            }

            return $new_dire_id;
        }

        return $directories[0]['id'];

    }
    function add_file( $fPath, $fName, $dire_id = null,$client ){

        $googleServiceDrive = new \Google_Service_Drive($client);

        $document = new \Google_Service_Drive_DriveFile();

        if( !empty( $dire_id ) ){
            $document->setParents( [ $dire_id ] );
        }
        $document->setName($fName);

        $uploader = $googleServiceDrive->files->create($document, array(
            'data' => file_get_contents('storage/files/'.$fName),
            'mimeType' => 'application/octet-stream',
        ));

        if( !empty( $uploader['name'] && isset( $uploader['name'] )  ) ){
            return true;
        }else{
            return false;
        }

    }
}
