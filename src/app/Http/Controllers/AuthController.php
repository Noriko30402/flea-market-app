<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;


class AuthController extends Controller
{
    public function index(LoginRequest $request)
{
  return view('edit');
}

}
