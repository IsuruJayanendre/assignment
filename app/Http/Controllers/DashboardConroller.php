<?php

namespace App\Http\Controllers;
use App\Models\Person;

use Illuminate\Http\Request;

class DashboardConroller extends Controller
{
    public function dashboard()
    {
        $count = Person::count();
        return view('dashboard', compact('count'));
    }
}
