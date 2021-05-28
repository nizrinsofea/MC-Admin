<?php

namespace App\Http\Controllers\Lect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LectController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('lect.index');
    }

    public function submitProposal()
    {
        return view('lect.submitproposal');
    }
}
