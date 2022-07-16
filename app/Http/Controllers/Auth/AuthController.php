<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    
    /**
     * 
     * @return mixed retorna view do formulário de login
     */
    public function showFormLogin()
    {
        return view('auth.formLogin');
    }

    /**
     * 
     * @param  Request $request 
     * @return mixed
     */
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' =>['required']
        ]);

        if(Auth::attempt($credentials, $request->remenber)){
            
            $request->session()->regenerate();
            
            return redirect()->route('admin');
        }

        return redirect()->back()->onlyInput('email')->withErrors('confira sua senha e email');
    }

    /**
     * 
     * @return mixed retorna view do formulário de registro de usuário
     */
    public function showFormRegister()
    {
        return view('auth.formRegister');
    }

    /**
     * 
     * @param  Request $resquest 
     * @return mixed
     */
    public function register(Request $request)
    {
        
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        
        $data['password'] = Hash::make($request->password);
        
        if(User::create($data)){
            return redirect()->route('login');
        }

        return redirect()->back()->except(['password'])->withErros('dados não estão corretos');

    }

    /**
     * 
     * @param  Request $request [description]
     * @return mixed           [description]
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin');
    }
}
