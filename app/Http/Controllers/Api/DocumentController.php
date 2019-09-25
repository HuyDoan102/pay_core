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
        $fileJson = public_path('js/Paycore_API-swagger.json');
        $file = fopen($fileJson, "r");
        $fileData = fread($file,filesize($fileJson));
        fclose($file);

        return $fileData;
    }
}
