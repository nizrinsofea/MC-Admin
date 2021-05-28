<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function createAdmin()
    {
        $list = DB::table('users')
            ->select('users.username', 'users.pwshow', 'users.id')
            ->get();
        return view('admin.createadmin')
        ->with('list', $list);
    }

}
