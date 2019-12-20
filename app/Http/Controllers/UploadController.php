<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sczts\Upload\Upload;
use Sczts\Skeleton\Http\StatusCode;

class UploadController extends Controller
{
    //
    public function upload(Request $request,Upload $upload)
    {
        $file = $request->file('file');
        $data = $upload->upload($file);
        return $this->json(StatusCode::SUCCESS, $data);
    }
}
