<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
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
        return User::all();
    }

    public function profile()
    {
        return Auth::user();
    }

    public function login(Request $request)
    {
        return User::where('api_token', $request->header('api-token'))->first();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'login' => 'required|max:255|string',
            'api_token' => 'required|max:255|string',
        ]);
    
        $user = new User;
    
        $user->name = $request->name;
        $user->login = $request->login;
        $user->api_token = $request->api_token;
    
        $user->save();
        
        return $user;
    }

    public function show($id)
    {
        return user::find($id);
    }

    public function update(Request $request, $id)
    {
        $user = user::find($id);
    
        $user->name = $request->name;
        $user->login = $request->login;
    
        $user->save();
        
        return $user;
    }

    public function changeUserAPIToken(Request $request, $id)
    {
        if (Gate::allows('update-user-apitoken', $post)) {
            //
        }

        $user = user::find($id);
    
        $user->api_token = $request->api_token;
    
        $user->save();
        
        return $user;
    }

    public function changeMyAPIToken(Request $request)
    {
        $user = Auth::user();

        $user->fill([
            'api_token' => Crypt::encrypt($request->api_token)
        ])->save();

        return $user;
    }

    public function destroy($id)
    {
        user::find($id)->delete();

        return "user $id deleted";
    }
}
