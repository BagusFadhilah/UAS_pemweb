<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komik;
use App\Models\Chapter;

class HomeController extends Controller
{
    public function welcome()
    {
        $komiks = Komik::all();

        return view('welcome', compact('komiks'));
    }

    public function index()
    {
        $latestChapters = Chapter::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('latestChapters'));
    }
}
