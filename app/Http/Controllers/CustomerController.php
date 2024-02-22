<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.customers.index', ['customers' => $customers]);
    }
}
