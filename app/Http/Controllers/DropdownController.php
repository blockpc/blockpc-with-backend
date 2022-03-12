<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function index()
    {
        return view('menus.index');
    }

    public function menu_one()
    {
        return view('menus.one');
    }

    public function menu_two()
    {
        return view('menus.two');
    }

    public function menu_three()
    {
        return view('menus.three');
    }
}
