<?php

namespace App\Traits;

trait HttpResponses {
    protected function success($data, $message = null, $code = 200) {
        return response()->json([
            'status' => [
                'en' => 'Request was successful.',
                'pt' => 'Requisição foi bem sucedida.'
            ],
            'message' => $message,
            'data' => $data
        ], $code);
    }
    protected function error($data, $message = null, $code = 404) {
        return response()->json([
            'status' => [
                'en' => 'Error has occurred...',
                'pt' => 'Um erro está ocorrendo...'
            ],
            'message' => $message,
            'data' => $data
        ], $code);
    }
}