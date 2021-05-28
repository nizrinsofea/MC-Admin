<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function course(Request $request)
    {
        $response = Http::get( env('MOODLE_URL') . '/webservice/rest/server.php?wstoken='. env('MOODLE_TOKEN').'&wsfunction=core_course_get_courses_by_field');
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        //dd($array);
        $courses = $array['SINGLE']['KEY'][0]['MULTIPLE']['SINGLE'];
        //dd($courses);
        return view('admin.approveproposal', compact('courses'));
    }
}