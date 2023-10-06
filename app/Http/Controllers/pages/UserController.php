<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
  public function index()
  {
    $response = Http::get('http://localhost:5000/users');
    $users = json_decode($response); 
    return view('content.pages.user')->with('users', $users);
  }

  public function create()
  {
      return view ('user.create');
  }

  public function store(Request $request)
    {
      $apiURL = 'http://localhost:5000/users';
      $postInput = [
        'email' => 'tdasdaest@gmail.com',
        'password' => 'tesdadsatpassword',
        'role' => 'admin'
      ];
    $headers = [
        'X-header' => 'value'
    ];
    $response = Http::withHeaders($headers)->post($apiURL, $postInput);
    $statusCode = $response->status();
    $responseBody = json_decode($response->getBody(), true);
    return redirect()->route('user.index');
    }
}
