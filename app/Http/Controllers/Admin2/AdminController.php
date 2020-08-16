<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\AdminDatatable;
use Illuminate\Support\Facades\Storage;
use  App\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatable $admin)
    {
        //
        return $admin->render('admin.admins.index',['title'=>'التحكم في المشرفين']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create',['title'=>trans('admin.create_admin')]);
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
            'name'=>'required',
            'username'=>'required',
            'phone'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6',
            'image'=>v_image(),

            ],[],[
             'name'=>trans('admin.name'),
            'phone'=>'رقم الهاتف',
            'username'=>'اسم المستخدم',
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password'),
            'image'=>'الصوره الشخصية',


        ]);
        $data['password']=bcrypt(request('password'));
        if(\request()->hasFile('image')){
            $data['image']= up()->upload([
                // new_name => '' ,
                'file'=>'image',
                'path'=>'admins',
                'upload_type'=>'single',
                'delete_file'=>'',
            ]);
        }


        if($request->is_admin =='on' ) {
            $data['is_admin']=1;
        }

        if($request->is_control =='on' ) {
            $data['is_control']=1;
        }
        if($request->is_un =='on' ) {
            $data['is_un']=1;
        }
        if($request->is_social =='on' ) {
            $data['is_social']=1;
        }
        if($request->is_sit =='on' ) {
            $data['is_sit']=1;
        }



        Admin::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('admin'));
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
        $admin=Admin::find($id);
        $title=trans('admin.edit');
        return view('admin.admins.edit',compact('admin','title'));
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



        $data=$this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email:admins,email,'.$id,
            'password'=>'sometimes|nullable|min:6',
            'username'=>'required',
            'phone'=>'required',
            'image'=>'sometimes',

        ],[],[
            'name'=>trans('admin.name'),
            'phone'=>'رقم الهاتف',
            'username'=>'اسم المستخدم',
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password'),
            'image'=>'الصورة',

        ]);
        if($request->has('password')){
            $data['password']=bcrypt(request('password'));
        }
        $d=Admin::where('id',$id)->first()->image;
        if(\request()->hasFile('image')){
            if($d=='admins/user.png'){
                $d='';
            }

            $data['image']= up()->upload([
                // new_name => '' ,
                'file'=>'image',
                'path'=>'admins',
                'upload_type'=>'single',
                'delete_file'=>$d,
            ]);

        }
        else{
            $data['image']=$d;
        }

        if($request->is_admin =='on' ) {
            $data['is_admin']=1;
        }
        else{
            $data['is_admin']=0;
        }

        if($request->is_control =='on' ) {
            $data['is_control']=1;
        }
        else{
            $data['is_control']=0;
        }

        if($request->is_un =='on' ) {
            $data['is_un']=1;
        } else{
            $data['is_un']=0;
        }

        if($request->is_social =='on' ) {
            $data['is_social']=1;
        }
        else{
            $data['is_social']=0;
        }

        if($request->is_sit =='on' ) {
            $data['is_sit']=1;
        }
        else{
            $data['is_sit']=0;
        }

        Admin::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('admin'));
    }


    public  function  multe_delete(){
       if(is_array(\request('item'))){
           Admin::destroy(\request('item'));
       }else{
           Admin::find(\request('item'))->delete();
           session()->flash('success',trans('admin.record_deleted'));
           return redirect(aurl('admin'));
       }
    }
}
