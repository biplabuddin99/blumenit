<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\role;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\User\updateUserRequest;

use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;

use Exception;
use Session;

class Authcontroller extends Controller
{
    use ResponseTrait;
    public function adminlogin(){
        return view('backend.signin.signinform');
    }

    public function adminloginvarify(LoginRequest $r){
        $user = User::where('username', $r->username)->where('password', sha1(md5($r->password)))->first();
        if ($user) {
            $status = array('Inactive', 'active', 'Pending', 'Freez', 'Block');
            if ($user->status == 1) {
                $this->setSession($user);
                return redirect(route($user->role->identity . '.dashboard'));
            } else {
                return redirect(route('adminlogin'))->with($this->responseMessage(false, "error", "You are " . $status[$user->status] . "! Please contact to admin"));
            }
        }else{
            return redirect(route('adminlogin'))->with($this->responseMessage(false, "error","Please REgister your account")); 
        }
    }

    protected function setSession($user)
    {
        return request()->session()->put([
            'user' => $user->id,
            'username' => $user->username,
            'name' => $user->name,
            'email' => $user->email,
            'role_id' => $user->role_id,
            'identity' => $user->role->identity
        ]);
    }
    public function logout(){
        request()->session()->flush();
        return redirect(route('adminlogin'));
    }

    public function profile(){
        $user = User::find(Session::get('user'));
        return view('backend.user.profile', compact('user'));
    }

    public function profile_update(updateUserRequest $request,$id){
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->contact = $request->contact;
            if(trim($request->password))
                $user->password = sha1(md5($request->password));
            if(!!$user->save()){
				return redirect()->back()->with($this->responseMessage(true, null, 'User created'));
			}
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with($this->responseMessage(false, 'error', 'Please try again!'));
            return false;
        }

    }
}
