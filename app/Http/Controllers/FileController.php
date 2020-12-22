<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
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
        return File::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'description' => 'nullable|max:512|string',
            'group' => 'required|max:255|string',
            'status' => 'in:enable,disabled',
        ]);
    
        $file = new File;
    
        $file->name = $request->name;
        $file->login = $request->login;
        $file->api_token = $request->api_token;
    
        $file->save();
        
        return $file;
    }
}
