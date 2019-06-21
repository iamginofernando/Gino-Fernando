<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
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
    public function home()
    {
        return view('home');
    }

    function users() {
        return view('usermanagement.user');
    }
    
    function role() {
        return view('usermanagement.role');
    }

    function expense() {
        return view('expensemanagement.expense');
    }

    function expensecateg() {
        return view('expensemanagement.expensecategory');
    }

}
