<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\AddPassHolder;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Mail;
use Storage;
use Image;
class DetailsController extends Controller
{
    function employee()
    {
        return view('employeedetails');
    }  
    function students()
    {
        return view('studentsdetails');
    }  
    function about()
    {
        $student=[
            [
                'image'=>'css/icons/teacher.svg',
                'data'=>[
                    'Student Name'=>'Ritesh Nimje',
                    'Branch'=>'Computer Science',
                    'Year'=>'4th year',
                ]
                 
            ],
            [
                'image'=>'css/icons/avatar.svg',
                'data'=>[
                    'Student Name'=>'Pranita Mangrulkar',
                    'Branch'=>'Computer Science',
                    'Year'=>'4th year',
                ]
            ]
         ];
         return view('about')->with(['data'=>$student]);
    }  

    function listing(Request $request,$type)
    {
        if($type!='employee' && $type!='student')
        {
            return redirect("/dashboard"); 
        }
        $users = AddPassHolder::where('passenger_type',$type)->paginate(8);
        // dd($users[0]);
        return view('list',['listing_type' => $type,'users'=>$users]);
    }

    function delete_user($id)
    {
        AddPassHolder::where('id',$id)->delete();
        return "true";
    }

    function sendEmail($id)
    {
        $user_data=AddPassHolder::select('fname','email','issue_date','expiry_date','passenger_type','qr_path','from','to')->where('id',$id)->first()->toArray();
        $diff=date_diff(date_create($user_data['expiry_date']),now());
        $qr=public_path().('/storage/'.$user_data['qr_path']);
        $data = array('image'=>$user_data,'diff'=>$diff->format("%R%a days"));
        Mail::send(['html'=>'mail'], $data, function($message) use ($user_data,$qr) {
           $message->to($user_data['email'], 'Passengers')
                    ->subject('Bus Pass Genration Mail');
           $message->from('xyz@gmail.com','Bus Pass Portal');
           $message->attach($qr, [
            'as' => 'Qrcode.png',
            'mime' => 'image/png',
        ]);
        });
        echo "Basic Email Sent. Check your inbox.";
    }
}
