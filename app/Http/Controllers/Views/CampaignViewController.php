<?php

namespace App\Http\Controllers\Views;

use App\Models\Campaign;
use App\Services\BrevoService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CampaignViewController extends Controller
{

    private BrevoService $brevo;

    public function __construct(BrevoService $brevoService)
    {
        $this->brevo = $brevoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.campaigns.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
        return view('pages.campaigns.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
