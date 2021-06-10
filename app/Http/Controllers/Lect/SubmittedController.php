<?php

namespace App\Http\Controllers\Lect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SubmittedController extends Controller
{
    public function submitList() {
        $list = DB::table('proposals')
            ->select('id','coursetitle','created_at','created_by')
            ->get();
        return view('lect.submittedlist', ['list' => $list]);
    }

    public function submitDetails($id) {
        
        $response = Http::get( env('MOODLE_URL') . '/webservice/rest/server.php?wstoken='. env('MOODLE_TOKEN').'&wsfunction=core_course_get_categories');
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        //dd($array);
        $categories = $array['MULTIPLE']['SINGLE'];

        $details = DB::table('proposals')
        ->select('id','coursecode','coursetitle','description','credithr','category','file_name','file_path','assessment','learningoutcomes','coursejustification','courseimpact','created_by')
        ->where('id','=',$id)
        ->get();
        return view('lect.submitted', compact('details', 'categories'));
    }

    public function destroy($id)
    {
        $userrow = Proposal::find($id);
        $userrow->delete(); 
        return Redirect::to('/submitted')->with('success', true)->with('message','Proposal deleted!');
    }
    
}