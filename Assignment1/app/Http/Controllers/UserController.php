<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
	protected $user;

	public function __construct(UserModel $user){
		$this->user = $user;
	}

    public function register(Request $request) {
    	$user = [
    		"name"		=> $request->name,
    		"email" 	=> $request->email,
    		"password" 	=> md5($request->password)
    	];

    	$user = $this->user->create($user);

    	if($user){
    		 return redirect('/all')->with('status', ' Succesfully created! ');
    	}

    	return redirect('/all')->with('status', ' Fail to create ');
    	
    }

  	public function all()
    {
    	$users = $this->user->all();

    	return view("all")->with('users', $users);
    }
    
    public function find($id)
    {
    	$user = $this->user->where("id", "=", "$id")->get();

        return view("detail")->with('user',$user);
    }

    public function delete($id)
    {
        $user = $this->user->where("id", "=", "$id")->delete();


        if($user){
            return redirect('/all')->with('status', ' Succesfully Deleted! ');;
        }

        return redirect('/all')->with('status', ' Fail to Delete ');


    }

    public function edit($id)
    {
         $user = $this->user->where("id", "=", "$id")->get();

        return view("formedit")->with('user',$user);
    }

    public function update(Request $request)
    {
        $usernew = [
            "name"      => $request->name,
            "email"     => $request->email,
            "password"  => md5($request->password)
        ];
        $user = $this->user->where("id", "=", "$request->id")->update($usernew);

        if($user){
            return redirect('/all')->with('status', ' Succesfully updated! ');;
        }

       return redirect('/all')->with('status', ' Fail to update ');
    }
}
