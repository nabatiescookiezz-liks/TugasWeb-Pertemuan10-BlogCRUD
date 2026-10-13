<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class RolePageController extends Controller
{
    public function admin(Request $request): View
    {
        return view('roles.admin');
    }

    public function editor(Request $request): View
    {
        return view('roles.editor');
    }
}
