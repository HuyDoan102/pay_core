<?php

namespace App\Concerns;

trait ApiResponse
{
    public function responseSuccess($payload = [], $message = '', $statusCode = 200)
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

    public function responseWithToken($token, $info = [])
    {
        $payload = array_merge([
            'token_type' => 'Bearer',
            'access_token' => $token,
        ], $info);

        return $this->responseSuccess($payload, __('auth.success'));
    }
}
