<?php

namespace App\Http\Controllers\Api\Traits;


use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Response;

trait ApiResponse
{
    /**
     * @param string $msg
     * @param int $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    private function getError(string $msg, int $code = 500)
    {
        return response([
            'success' => false,
            'message' => $msg,
            'statusCode' => $code,
        ], $code);
    }


    /**
     * @param array|Paginator $response
     * @param int $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    private function getSuccess($response, int $code = 200)
    {
        return response([
            'success' => true,
            'message' => $response,
            'statusCode' => $code,
        ]);
    }
}