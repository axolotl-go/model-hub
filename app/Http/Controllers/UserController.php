<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
    public function index() {
        return view('admin.users');
    }

    public function store(Request $request) {
        
    }

}
