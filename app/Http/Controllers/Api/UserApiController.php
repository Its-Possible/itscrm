<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Request;

class UserApiController extends Controller {

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Users fetched successfully',
            'data' => $this->userRepository->all()
        ]);
    }
}
