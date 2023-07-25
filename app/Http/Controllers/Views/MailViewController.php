<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Services\BrevoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MailViewController extends Controller
{
    protected BrevoService $brevoService;

    public function __construct(BrevoService $brevoService)
    {
        $this->brevoService = $brevoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $this->brevoService->fetchCampaigns();


        return view('pages.mails.index');
    }
}
