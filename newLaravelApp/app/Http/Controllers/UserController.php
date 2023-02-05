<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->all();
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['pass'];
        User::create([
            'name' => $name,
              'email'=> $email,
            "password" =>$password
        ]);
       return redirect('posts');
    }
}