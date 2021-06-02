<?php

namespace App\Http\Controllers\Lect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Redirect;

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

    public function proposal(Request $request)
    {
        $course = new Course;
     
        $course->coursetitle=$request->input('coursetitle');
        $course->coursecode=$request->input('coursecode');
        $course->courseinfo=$request->input('courseinfo');
        $course->credithr=$request->input('credithr');
        $course->category=$request->input('category');

        $result = $course->save();

        return Redirect::to('/submit')->with('success', true)->with('message','Submission success!');
    }

    public function proposalLect(Request $request)
    {
        $course = new Course;
     
        $course->coursetitle=$request->input('coursetitle');
        $course->coursecode=$request->input('coursecode');
        $course->courseinfo=$request->input('courseinfo');
        $course->credithr=$request->input('credithr');
        $course->category=$request->input('category');

        $result = $course->save();

        return Redirect::to('/lecturer/submit')->with('success', true)->with('message','Submission success!');
    }
}
