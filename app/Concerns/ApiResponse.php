<?php

namespace App\Concerns;

trait ApiResponse
{
    public function responseSuccess(array $payload, $message = '', $statusCode = 200)
    {
        $data = [
            'message' => $message,
            'status' => true,
            'data' => $payload
        ];

        return response()->json($data, $statusCode);
    }

    public function responseError($message = '', $statusCode = 400)
    {
        $data = [
            'message' => $message,
            'status' => false
        ];

        return response()->json($data, $statusCode);
    }
}
