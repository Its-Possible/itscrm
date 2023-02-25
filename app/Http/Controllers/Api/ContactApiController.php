<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;

class ContactApiController extends Controller {

    private ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index(Request $request)
    {

    }

}
