<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


         if ( Auth::check() && Auth::user()->isAdmin() ) // admin ==1
        {
            //admin dashboard
         return view('admin.dashboard')->name('dashboard');
        }else{

            return redirect('/');
        }

    }

}
