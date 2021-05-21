<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('profile');
    }

    public function update(User $user)
    {
        $userId = auth()->id();
        $data = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'confirmed' ,'min:8'],
            'image' => ['mimes:jpeg,jpg,png'],
            ]);
            

            $data['darkmode'] = request()->has('darkmode');
            
        
        if(request()->has('password'))
        {
            $data['password'] = Hash::make(request('password'));
        }

        if(request()->hasFile('image'))
        {
            $path = request('image')->store('user');
            $data['image'] = $path;
        }
        User::FindOrFail($userId)->update($data);
           return back();
        
        }        
    
}
