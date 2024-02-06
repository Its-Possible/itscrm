<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CttPostCodeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostcodeApiController extends Controller
{
    //
    public function location(Request $request, string $postcode): JsonResponse
    {
        $CttPostcodeService = new CttPostCodeService();

        return response()->json([
            "status" => 201,
            "message" => "Informação sobre o código postal",
            "info" => json_decode($CttPostcodeService->postcode($postcode)->infoLocation())
        ]);
    }
}
