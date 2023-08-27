<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;

class ResponseController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function sendSuccessResponse($data, $message)
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }


    /**
     * @return \Illuminate\Http\Response
     */
    public function sendErrorResponse($message, $messages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if(!empty($messages)){
            $response['data'] = $messages;
        }

        return response()->json($response, $code);
    }
}
