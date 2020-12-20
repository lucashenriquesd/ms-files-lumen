<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index() 
    {
        return Job::all();
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'title' => 'required|max:256|string',
            'description' => 'required|max:10000|string',
            'status' => 'in:enable,disabled',
            'workplace' => 'nullable|string',
            'salary' => 'nullable|numeric',
        ]);
    
        $job = new Job;
    
        $job->title = $request->title;
        $job->description = $request->description;
        $job->status = $request->status;
        $job->workplace = $request->workplace;
        $job->salary = $request->salary;
    
        $job->save();
        
        return $job;
    }

    public function show($id) 
    {
        return job::find($id);
    }

    public function update(Request $request, $id) 
    {
        $job = job::find($id);
    
        $job->title = $request->title;
        $job->description = $request->description;
        $job->status = $request->status;
        $job->workplace = $request->workplace;
        $job->salary = $request->salary;
    
        $job->save();
        
        return $job;
    }

    public function destroy($id) 
    {
        job::find($id)->delete();

        return "job $id deleted";
    }
}
