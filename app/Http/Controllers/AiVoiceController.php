<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiVoiceController extends Controller
{
    public function getToken()
    {
        $yating_key = config('app.yating_key');
        if ($yating_key) {
            $response = Http::withHeaders([
                'key' => $yating_key,
                'Content-Type' => 'application/json'
            ])->post('https://asr.api.yating.tw/v1/token', [
                'pipeline' => 'asr-zh-en-std',
            ]);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json($response->json(), $response->status());
            }
        }
        return response()->json(['message' => 'Undefined Key'], 400);
    }
}
