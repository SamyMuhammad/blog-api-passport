<?php


namespace App\Traits;


trait ResponseHandler
{
    public function returnError($message, $code, $data = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $code);
    }

    public function returnFail($message, $code = 422, $data = null)
    {
        return response()->json([
            'status' => 'fail',
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $code);
    }

    public function returnSuccess($message, $data = null)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], 200);
    }

    public function returnData($data)
    {
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }
}
