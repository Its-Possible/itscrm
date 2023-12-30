<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignStoreRequest;
use App\Models\Campaign;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CampaignApiController extends Controller
{
    //
    public function list(Request $request): JsonResponse
    {
        $campaigns = Campaign::paginate(30);

        return response()->json([
            "status" => 201,
            "message" => "Get all campaigns",
            "campaigns" => $campaigns
        ], 201);
    }

    public function show(Request $request, string $slug): JsonResponse
    {
        $campaign = Campaign::where('slug', $slug)
            ->firstOrFail();

        return response()->json([
            'status' => 201,
            'message' => 'Fetch one campaign',
            'campaign' => $campaign
        ], 201);
    }

    public function create(CampaignStoreRequest $request): JsonResponse
    {
        $campaign  = new Campaign();
        $campaign->name = $request->input('name');
        $campaign->subject = $request->input('subject');
        $campaign->previewText = $request->input('preview-text');
        $campaign->previewText = $request->input('content-html');
        $campaign->status = $request->input('status');
        $campaign->local = "local";

        if(!$campaign->save())
        {
            return response()
                ->json([
                    'status' => 500,
                    'message' => "Campaign create error, try again, please!"
                ], 500);
        }

        return response()->json([
            'status' => 201,
            'message' => "Campaign created with success!",
            'campaign' => $campaign
        ], 201);
    }
}
