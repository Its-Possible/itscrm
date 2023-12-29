<?php

namespace App\Http\Controllers\View\Settings\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccessTokenViewController extends Controller
{
    //
    public function index(Request $request)
    {
        // TODO: Fetch all access tokens by auth user

        return view('pages.settings.account.access-tokens')
            ->with([
                'accessTokens' => []
            ]);
    }
}
