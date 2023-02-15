<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $specials = Category::where('name', 'Special')->first();
        return view('welcome', compact('specials'));
    }

    public function thankyou()
    {
        return view('thankyou');
    }
}
