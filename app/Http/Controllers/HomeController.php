<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns|unique:users,email'
        ]);

        User::create($data);

        return back()->with('success', "{$data['name']} your email subscription was successful");

    }
}