<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * renderiza view dashboard inicial
     * @return [type] [description]
     */
    public function index()
    {
        $user = Auth::user();

        if(Auth::check() === true){
            return view('dashboard.index', [
                'title' => 'dashboard',
                'email' => $user->email
            ]);
        }

        return redirect()->route('login');
    }
}
