<?php

namespace App\Http\Controllers\Auth;

use App\Services\RegisterService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $registerService;
    /**
     * Create a new class instance.
     */
    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }
    public function index() {
        return view('auth.register');
    }

    public function register(RegisterRequest $request) {
        $data = $request->validated();

        $user = $this->registerService->registerUser($data);
        
        Auth::login($user);

        return redirect()->to('/');
    }
}
