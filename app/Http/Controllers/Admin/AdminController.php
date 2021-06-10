<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
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
        return view('admin.index');
    }

    public function approveProposal()
    {
        return view('admin.approveproposal');
    }

    public function courseDestroy($id)
    {
        $userrow = Course::find($id);
        $userrow->delete(); 
        return Redirect::to('/approve')->with('success', true)->with('message','Course rejected!');
    }

}
