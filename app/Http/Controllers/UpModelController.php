<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpModelController extends Controller
{
    public function index(){
        return view("admin.upModel");
    }
}
