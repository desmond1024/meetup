<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Auth;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [            
            'except' => ['show', 'create', 'store']
        ]);

        $this->middleware('guest',[
            'only'=>['create']
        ]);
    }
    
    public function edit(User $user){
        try{
            $this->authorize('update',$user);
            return view('users.edit',compact('user'));
        }     
        catch (\Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function update(User $user, Request $request){
        $this->validate($request, [
            'username' => [
                'required',
                'max:50',
                Rule::unique('users')->ignore($user->id)
            ],
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data=[];
        $data['username']=$request->username;                
        if($request->password){
            $data['password']=bcrypt($request->password);
        }
        $user->update($data);

        return redirect('/');
    }
}
