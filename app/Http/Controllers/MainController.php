<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
class MainController extends Controller
{
    function index()
    {
        return view('welcome');
    }

    function register()
    {
        return view('register');
    }

    function checklogin(Request $request)
    {
        $rules=[
            'email'=> 'required|email',
            'password'=> 'required|min:3'
        ];
        $this->validate($request,$rules);

        $user_data=array(
            'email'=> $request->get('email'),
            'password'=>$request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('/dashboard');
        }
        else
        {
            return back()->with('error','Enter Valid Login Details');
        }
    }

    function addUser(Request $request)
    {
        $rules=[
            'id'=>'required',
            'name'=>'required',
            'email'=> 'required|email',
            'password'=> 'required|min:6'
        ];
        $input=($request->input());
        $validator = Validator::make($request->all(), $rules);
        if(!$validator->passes())
        {
            $error="Oops something went wrong";
            return view('register',compact('error',"input"));
        }
       
        if($request->input('password')!=$request->input('re-enter-password'))
        {
            $password="password does not matches";
            return view('register',compact('password','input'));
        }
        $id_exists=User::where("id",$request->input('id'))->exists();
       
        if($id_exists)
        {
            $error="User Id already exists";
            return view('register',compact('error','input'));
        }
        else
        {
            $data=[
                'id'=>$request->input('id'),
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'remember_token'=>$request->input('_token'),
                'password'=>bcrypt($request->input('password')),
            ];
            $user=User::insert($data);
            $message="User added Sucessfully";
            return redirect('/')->with("message",$message)  ;
        } 
    }
    function dashboard()
    {
        return view('dashboard');
    }
    function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
