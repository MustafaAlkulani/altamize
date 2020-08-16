<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\admin;
use App\NotificationUser;
use App\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\NotificationDatatable;
use App\DataTables\AddUsersDatatable;
use  App\NotificationAdmin;
use  App\UserAccount;
//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\postNotification;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NotificationDatatable $notifi)
    {
        //
        return $notifi->render('admin.social.notification.index',['title'=>'ادارة الاشعارات ']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.social.notification.create',['title'=>'اضافة اشعار جديد ']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=$this->validate(request(),[
            'title'=>'required|string',
            'notification'=>'required|string',
//            'file'=>'required',

        ],[],[
            'title'=>trans('admin.title'),
            'notification'=>trans('admin.notification'),
            'admin_id'=>trans('admin.admin_id'),
            'file'=>trans('admin.file'),

        ]);

//        return    dd($data);


        $data['admin_id']=admin()->user()->id;
        if(\request()->hasFile('file')){
            $data['file']= up()->upload([
                // new_name => '' ,
                'file'=>'file',
                'path'=>'notification',
                'upload_type'=>'single',
                'delete_file'=>'',
            ]);
        }
        $id= NotificationAdmin::create($data);

        session()->flash('success',trans('admin.record_added'));
        return redirect(asurl('/notification/'.$id->id.'/user/add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice=NotificationAdmin::find($id);
        $title='تعديل الاشعار ';
        return view('admin.social.notification.edit',compact('notice','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd(\request()->hasFile('file'));
        $data=$this->validate(request(),[
            'title'=>'required|string',
            'notification'=>'required|string',
            //'admin_id'=>'required|string|max:255|unique:admins',
            //'file'=>'required|mimes:pdf,docx',

        ],[],[
            'title'=>trans('admin.title'),
            'notification'=>trans('admin.notification'),
            'admin_id'=>trans('admin.admin_id'),
            'file'=>trans('admin.file'),

        ]);
        $data['admin_id']=admin()->user()->id;
        $d=NotificationAdmin::where('id',$id)->first();

        if(\request()->hasFile('file')){
            $data['file']= up()->upload([
                // new_name => '' ,
                'file'=>'file',
                'path'=>'notification',
                'upload_type'=>'single',
                'delete_file'=>$d->file,
            ]);
        }

        NotificationAdmin::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(asurl('/notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=NotificationAdmin::findOrFail($id);
        NotificationUser::where('notification_id',$id)->delete();


        if($d->file){
            Storage::delete($d->file);
        }
        NotificationAdmin::find($id)->delete();
        //$user=social()->user();
        DB::table('notifications')
            ->where('data','like','%"id":'.$id.'%' )->delete();
        // $user->notifications->where('data','like','%"user_id":"'.$id.'"%' )->delete();



        session()->flash('success',trans('admin.record_deleted'));
        return redirect(asurl('/notification'));
    }


    public  function  multe_delete(){
        if(is_array(\request('item'))){
            NotificationUser::wherein('notification_id',\request('item'))->delete();

            $dd=NotificationAdmin::destroy(\request('item'));

            dd($dd);
            return redirect(asurl('/notification'));
            session()->flash('success',trans('admin.record_deleted'));
            return redirect(asurl('/notification'));
        }else{
            NotificationUser::wherein('notification_id',\request('item'))->delete();
            NotificationAdmin::find(\request('item'))->delete();
            session()->flash('success',trans('admin.record_deleted'));
            return redirect(asurl('/notification'));
        }
    }

    public function addUsers(AddUsersDatatable $users,$id){
        //  $user=UserAccount::find(3);
        //   $userinfo=$user->userAccountable;

        //  dd($userinfo->name);


        return $users->render('admin.social.notification.users.index',['title'=>'اضافة اعظا الاشعار ','id'=>$id]);

    }

    public function addUsersPost($id){
        $user=\request('item');
        $data=NotificationAdmin::find($id);
        // dd($data);
        if(is_array(\request('item'))){


            foreach (request('item') as $value){
                NotificationUser::create(['notification_id'=>$id,'user_id'=>$value]);
            }
            //  wherein('id',$user)->get()
            $notifier=UserAccount::wherein('id',$user)->get();


            Notification::send( $notifier,new \App\Notifications\AdminNotifications($data));

            session()->flash('success','تم الاضاقة بنجاح ');
            return redirect(asurl('/notification'));

        }else{
            $value=request('item');
            NotificationUser::create(['notification_id'=>$id,'user_id'=>$value]);
            session()->flash('success','تم الاضاقة بنجاح ');
            return redirect(asurl('/notification'));
        }
    }
}
