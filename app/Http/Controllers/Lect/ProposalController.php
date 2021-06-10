<?php

namespace App\Http\Controllers\Lect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;

class ProposalController extends Controller
{
    /**
     * Display a listing of the prducts.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $proposals = Proposal::all();

        $response = Http::get( env('MOODLE_URL') . '/webservice/rest/server.php?wstoken='. env('MOODLE_TOKEN').'&wsfunction=core_course_get_categories');
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        //dd($array);
        $categories = $array['MULTIPLE']['SINGLE'];
        //dd($categories);
        return view('lect.submitproposal',compact('proposals', 'categories'));
    }

    public function create()
    {
        return view('lect.submitproposal');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['assessment'] = $request->input('assessment');
        Proposal::create($input);

        // $request->validate([
        //     'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        //     ]);
    
        //     $fileModel = new File;
    
        //     if($request->file()) {
        //         $fileName = time().'_'.$request->file->getClientOriginalName();
        //         $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
    
        //         $fileModel->file_name = time().'_'.$request->file->getClientOriginalName();
        //         $fileModel->file_path = '/storage/' . $filePath;
        //         $fileModel->save();
    
        //         return back()
        //         ->with('success','File has been uploaded.')
        //         ->with('file', $fileName);
        //     }

        return redirect()->route('spsubmit')->with('success', true)->with('message','Submission success!');
    }

    public function lectStore(Request $request)
    {
        $input = $request->all();
        $input['assessment'] = $request->input('assessment');
        Proposal::create($input);

        return redirect()->route('submit')->with('success', true)->with('message','Submission success!');
    }

    public function update($id, Request $request)
    {
        $proposals = Proposal::findOrFail($id);
        $input = $request->all();

        $proposals->fill($input)->save();
        return redirect()->back()->with('success', true)->with('message','Proposal updated successfully!');
    }

    public function fileUpload(Request $req){
        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $fileModel = new File;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->file_name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }
}