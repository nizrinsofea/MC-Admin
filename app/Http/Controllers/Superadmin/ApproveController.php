<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class ApproveController extends Controller
{
    public function proposalList() {
        $create = DB::table('proposals')
            ->select('id','coursetitle','created_at','created_by')
            ->get();
        return view('admin.proposallist', ['create' => $create]);
    }

    public function proposalDetails($id) {
        $response = Http::get( env('MOODLE_URL') . '/webservice/rest/server.php?wstoken='. env('MOODLE_TOKEN').'&wsfunction=core_course_get_categories');
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        //dd($array);
        $categories = $array['MULTIPLE']['SINGLE'];

        $create = DB::table('proposals')
        ->select('id','coursecode','coursetitle','description','credithr','category','file_name','file_path','assessment','learningoutcomes','coursejustification','courseimpact','created_by')
        ->where('id','=',$id)
        ->get();
        return view('admin.approveproposal', compact('create','categories'));
    }

    public function approveToMoodle(Request $request) {
        $response = Http::get( env('MOODLE_URL') . '/webservice/rest/server.php?wstoken='. env('MOODLE_ADMIN_TOKEN').'&wsfunction=core_course_create_courses&courses[0][fullname]=' . $request->coursetitle . '&courses[0][shortname]=' . $request->coursecode . '&courses[0][categoryid]=' . $request->category . '&courses[0][summary]=' . $request->description);
    }
    
}

//<button class="btn btn-primary"  onclick="window.open ( 'http://localhost/moodle/webservice/rest/server.php?wstoken=5f7d2d57c2c16cd8165553156c00cc5c&wsfunction=core_course_create_courses&courses[0][fullname]={{ $data->coursetitle }}&courses[0][shortname]={{ $data->coursecode }}&courses[0][categoryid]={{ $data->category }}&courses[0][summary]={{ $data->description }}');" id="myButton" class="float-left submit-button" >Approve</button> -->
