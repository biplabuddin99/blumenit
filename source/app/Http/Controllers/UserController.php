<?php

namespace App\Http\Controllers;
use App\Http\Requests\User\newUserRequest;
use App\Http\Requests\User\updateUserRequest;
use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Carbon\Carbon;
use DB;
use Session;

class UserController extends Controller
{
    use ResponseTrait;
    
    public function index(){
        $allUser = User::with('role')->orderBy('id', 'DESC')->paginate(10);
        return view('backend.user.index', compact('allUser'));
    }

    public function create(){
        return view('backend.user.create');
    }

    public function store(newUserRequest $request){
        try {
            $user = new User;
            $user->role_id = 1;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->contact = $request->contact;
            $user->password = sha1(md5($request->password));
            $user->status = $request->status;
            if(!!$user->save()){
				return redirect(route(Session::get('identity').'.admins.index'))->with($this->responseMessage(true, null, 'User created'));
			}
        } catch (Exception $e) {
            return redirect()->back()->with($this->responseMessage(false, 'error', 'Please try again!'));
            return false;
        }

    }
	
    public function edit($id){
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(updateUserRequest $request,$id){
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->contact = $request->contact;
            if(trim($request->password))
                $user->password = sha1(md5($request->password));

            $user->status = $request->status;
            if(!!$user->save()){
				return redirect(route(Session::get('identity').'.admins.index'))->with($this->responseMessage(true, null, 'User created'));
			}
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with($this->responseMessage(false, 'error', 'Please try again!'));
            return false;
        }

    }

    public function delete($name, $id){
        try {
            $user = User::find(encryptor('decrypt', $id));
            if(!!$user->delete()){
                return redirect(route(currentUser().'.allUser'))->with($this->responseMessage(true, null, 'User deleted'));
            }
        }catch (Exception $e) {
            dd($e);
            return redirect(route(currentUser().'.allUser'))->with($this->responseMessage(false, 'error', 'Please try again!'));
            return false;
        }

    }

}
