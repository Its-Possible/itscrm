<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Views\CampaignViewController;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignApiController extends Controller
{
    //
    public function update(Request $request, string $code)
    {
        $campaign = Campaign::where('code', $code)->firstOrFail();

        $campaign->name = $request->input('name');
        $campaign->subject = $request->input('subject');
    }

    public function delete(Request $request, string $code)
    {
        $campaign = Campaign::where('code', $code);

        if($campaign->count() > 0) {
            $campaign->delete();

            return back();
        }

        return back()->withErrors(['message' => 'Não foi possivel, apagar a campanha, tente novamente pff!']);
    }
}
