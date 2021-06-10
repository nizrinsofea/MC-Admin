<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Staff;

class CreateAdminController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function createAdmin()
    {
        $list = DB::table('users')
            ->select('users.username', 'users.pwshow', 'users.id')
            ->get();
        return view('superadmin.createadmin')
        ->with('list', $list);
    }

    public function userDestroy($id)
    {
        $userrow = User::find($id);
        $userrow->delete(); 
        return Redirect::to('/create')->with('success', true)->with('message','Admin deleted!');
    }

    public function search(Request $request){
        // Get the search value from the request
        // $search = 'adis';
        $search = $request->input('staffsearch');
        // dd($search);
        
    
        // Search in the title and body columns from the posts table
        $staff = Http::get('https://mapi.iium.edu.my/staffdir/allstaff.php?staffname=' . $search)->json();
        // dd($staff);
    
        // Return the search view with the resluts compacted
        return view('superadmin.stafflist', compact('staff'));
    }

    public function showlist() {
        
            $staff = Http::get('https://mapi.iium.edu.my/staffdir/allstaff.php?staffname=adis')->json();
            return view('superadmin.stafflist', [ 'staff' => $staff ]);
        
    }

    public function findlist(Request $request) {
        $q = $request->input( 'q' );
        $user = Http::get('https://mapi.iium.edu.my/staffdir/allstaff.php?staffname=' . $name)->json();
        if (count ( $user ) > 0)
            return view ( 'superadmin.stafflist' )->withDetails ( $user )->withQuery ( $q );
        else
            return view ( 'superadmin.stafflist' )->withMessage ( 'No Details found. Try to search again !' );
    }
}
