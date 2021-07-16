<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response(?array $data = null) {
        $response_data['success'] = true;

        if($data) {
            $response_data['data'] = $data;
        }

        return response()->json($response_data);
    }

    public function responseJson(?string $data = null): JsonResponse
    {
        $response_data['success'] = true;

        

        if($data) {
            $response_data['data'] = $data;
        }

        return response()->json($response_data);
    }

    public function abort(int $code, string $message) {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }
}
