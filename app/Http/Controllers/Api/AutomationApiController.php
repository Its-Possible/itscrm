<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Automation;
use Illuminate\Http\Request;

class AutomationApiController extends Controller
{
    //
    public function play(string $slug)
    {
        $automation = Automation::where('slug', $slug)->firstOrFail();

        return response()->json($automation);
    }
}
