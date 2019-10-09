<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function index()
    {
        return view('documents.list');
    }

    public function getFile()
    {
        $path = config('pay.path_swagger');
        $fileJson = public_path($path);
        $file = fopen($fileJson, "r");
        $fileData = fread($file,filesize($fileJson));
        fclose($file);

        return $fileData;
    }
}
