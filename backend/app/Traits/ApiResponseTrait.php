<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

trait ApiResponseTrait
{
    public function handleResponse(callable $callback, string $message = 'Sucesso', int $status = 200): JsonResponse
    {
        try {
            $data = $callback();
            
            return response()->json([
                'message' => $message,
                'data' => $data
            ], $status);

        } catch (\Exception $e) {
            Log::error($e);
            
            return response()->json([
                'message' => 'Ocorreu um erro ao processar a solicitação.'
            ], 500);
        }
    }
}