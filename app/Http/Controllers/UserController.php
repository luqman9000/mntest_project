<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        // dd('tubik dok');
        $incomingFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users','email')],
            'name' => ['required', 'max: 10', Rule::unique('users','name')],
            'password' => ['required','min:2','max:15'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth() -> login($user);
        return redirect('/');
    }

    public function logout(){
        auth() -> logout();
        return redirect('/');
    }

    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required',
        ]);

        if (auth()->attempt(['name'=> $incomingFields['loginname'],'password'=> $incomingFields['loginpassword']])) {
            $request->session()->regenerate();

        }
        
        return redirect('/');
    } 
}
