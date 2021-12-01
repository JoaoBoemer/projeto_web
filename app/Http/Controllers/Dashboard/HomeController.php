<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class HomeController extends Controller
{
    public function index () {
        $categories = Categories::where('status', 1)->get();
        return view('dashboard.home', ['categories' => $categories]);
    }
}