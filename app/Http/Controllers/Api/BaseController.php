<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class BaseController extends Controller
{
    public function sendResponse($data, $code = 200)
    {
        $response = [
            'success' => true,
            'data' => $data,
        ];

        return response()->json($response, $code);
    }

    public function sendError($error, $messages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error
        ];

        if (!isEmpty($messages)){
            $response['data'] = $messages;
        }

        return response()->json($response, $code);
    }
}
