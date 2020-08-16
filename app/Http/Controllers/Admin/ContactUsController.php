<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SendReplyMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ContactUsDatatable;
use  App\Contact_us;
use App\Mail\AdminResetPassword;
use Mail;
use Carbon\Carbon;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContactUsDatatable $admin)
    {

        return $admin->render('admin.sit.contact.index',['title'=>'رسائل التواصل ']);
    }


    public function raplay(Request $request,$id)
    {
        $contact = Contact_us::where('id', $id)->first();

        $data1 = $this->validate(request(), [
            'raplay' => 'required|string',
        ], [], [
            'raplay' => trans('admin.raplay'),
        ]);
        $data = [
            'raplay' => $data1['raplay'],
            'created_at' => Carbon::now()
        ];
        Contact_us::where('id',$id)->update(['view'=>1]);
//        Mail::to($contact->email)->send( new SendReplyMail(['data'=>$data,'contact'=>$contact]));
//        session()->flash('success', trans('admin.send_successs'));
//         return back();

       return new SendReplyMail(['data'=>$data,'contact'=>$contact]);

    }
}
