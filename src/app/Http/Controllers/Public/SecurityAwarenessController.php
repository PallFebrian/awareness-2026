<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class SecurityAwarenessController extends Controller
{
    public function home(): View
    {
        return view('awareness.home');
    }

    public function simulation(): View
    {
        return view('awareness.simulation');
    }

    public function education(): View
    {
        return view('awareness.education');
    }
}