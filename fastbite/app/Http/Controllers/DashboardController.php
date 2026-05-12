<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class DashboardController extends Controller

{
    /* 
      * Fetch menu items
    */

    public function index(Request $request)
    {
        $menuItems = Menu::all();
        return view('dashboard', ['menuItems' => $menuItems]);

    }    
}
