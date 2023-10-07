<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
  public function index()
  {
    $response = Http::get('https://api-medcom.vercel.app/users');
    $users = json_decode($response); 
    return view('content.pages.user')->with('users', $users);
  }

  public function store(Request $request)
    {
      $response = Http::post('https://api-medcom.vercel.app/users', [
        'email' => $request->email,
        'password' => $request->password,
        'role' => $request->role
    ]);
    return redirect()->route('user.index');
    }

    public function delete(Request $id)
    {
      $response = Http::post('https://api-medcom.vercel.app/users', [
        'email' => $request->email,
        'password' => $request->password,
        'role' => $request->role
    ]);
    return redirect()->route('user.index');
    }
}
