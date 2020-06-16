<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Types;
use App\AddPassHolder;
use Illuminate\Support\Facades\Hash;
use Storage;
use QrCode;
use Illuminate\Support\Facades\Config;

class PassController extends Controller
{
    function index()
    {
        $cities=collect(Config::get('cities'));
        $payment_mode=['upi'=>'UPI','credit_card'=>'Credit Card','debit_card'=>'Debit Card'];
        return view('createpass')->with(['cities'=>$cities,'payment_mode'=>$payment_mode]);
    } 
    
    function addPassHolder(Request $request)
    {   

        if(strlen($request->contact_number)!=10)    
        {
            $ferror="Contact number must be 10 digits";
            return redirect("/pass")->with(['submit_flag'=>'true','type'=>$request->type,'ferror'=>$ferror]);
        }
        if($request->from == $request->to)
        {
            $ferror="From and to city are not same";
            return redirect("/pass")->with(['submit_flag'=>'true','type'=>$request->type,'ferror'=>$ferror]);
        }
        if($request->distance == 0)
        {
            $ferror="Distance not be zero";
            return redirect("/pass")->with(['submit_flag'=>'true','type'=>$request->type,'ferror'=>$ferror]);
        }
        // if(!in_array($request->file->extension(),['png','jpg','jpeg','pdf']))
        // {
        //     $ferror="File format not supported";
        //     return redirect("/pass")->with(['submit_flag'=>'true','type'=>$request->type,'ferror'=>$ferror]);   
        // }
       
        $month='+'.$request->plan.' months';
        $date=date('Y/m/d');
        $effectiveDate = date('Y-m-d', strtotime($month, strtotime($date)));
        $diff = strtotime($date) - strtotime($effectiveDate); 
        $perkm=10;
        $total_amount=$perkm*(int)$request->distance*abs(round($diff / 86400));
        if($request->type=='student')
        {
            $total_amount=abs((90 / 100) * $total_amount);
        }
        $file_path= 'QR/'.$request->fname.rand().'.png';
        $content="This is mr ".ucfirst($request->fname)." ".ucfirst($request->lname)." account your pass issuing date is ".$date." and your expiry date is ".$effectiveDate;
        Storage::disk('public')->put($file_path,QrCode::format('png')->size(1000)->generate($content));
        $fileName = 'file'.time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads'), $fileName); 
        $id=uniqid();
        $data=[
            'id'=>$id,
            "fname"          =>$request->fname,
            'lname'          =>$request->lname,
            'email'          =>$request->email,  
            'qr_path'        =>$file_path,
            'contact_number' =>$request->contact_number,
            'issue_date'     =>$date,
            'expiry_date'    =>$effectiveDate,
            'passenger_type' =>$request->type,
            'from'           =>$request->from,
            'to'             =>$request->to,
            'distance'       =>$request->distance,
            'amount'         =>$total_amount,
            'file_path'       =>$fileName,
        ];
        AddPassHolder::insert($data);
        return redirect("/pass/success")->with(['id'=>$data]); 
    }


    function addSuccess()
    {
        return view('addSuccess');
    }
    function studentregister()
    {
        return view('student');
    }
}
