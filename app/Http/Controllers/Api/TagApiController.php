<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagApiController extends Controller
{
    //
    public function index(Request $request)
    {
        return response()->json([
            'data' => Tag::all()
        ]);
    }

    public function relationship(Request $request)
    {
        \DB::table('tags_customers')->insert([
            'tag_id' => 1,
            'customer_id' => 1,
        ]);

        \DB::table('tags_campaigns')->insert([
            'tag_id' => 1,
            'campaign_id' => 1
        ]);

        return response()->json("Relationship: OK!");
    }
}
