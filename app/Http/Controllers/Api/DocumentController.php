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
        $path = config('pay.path_swagger') . '/swagger.yaml';

//        $path = '/js/Paycore_API-swagger.json';
//        $path = '/js/Paycore_API-swagger.yaml_version_2.0.yaml';
//        $path = '/js/api_docs/paycore_api-swagger_v3.yaml';
//        $path = '/js/api_docs/Paycore_API-swagger.yaml';

        $fileJson = public_path($path);
        $file = fopen($fileJson, "r");
        $fileData = fread($file,filesize($fileJson));
        fclose($file);

        return $fileData;
    }
}
