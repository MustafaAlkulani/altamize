<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use  App\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $data=Department::all();
        $title='إدارة الاقسام  ';
        return view('admin.department.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create',['title'=>'انشاء قسم جديد']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$this->validate(request(),[
            'name'=>'required',
            'vision'=>'required',
            'message'=>'required',
            'fees'=>'required',
            'levels'=>'required|integer',
                    ],[],[
            'name'=>'اسم القسم',
            'vision'=>'الروية',
            'message'=>'الرسالة',
            'fees'=>'الرسوم',
            'level'=>'المستويات ',
        ]);


        Department::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('department'));
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
        $data=Department::find($id);
        $title='تعديل البيانات الاساسية لقسم '.$data->name;
        return view('admin.department.edit',compact('data','title'));
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
            'vision'=>'required',
            'message'=>'required',
            'fees'=>'required',
            'levels'=>'required|integer',
        ],[],[
            'name'=>'اسم القسم',
            'vision'=>'الروية',
            'message'=>'الرسالة',
            'fees'=>'الرسوم',
            'level'=>'المستويات ',
        ]);
        Department::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('department'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Department::find($id)->delete();
        session()->flash('success',trans('admin.record_deleted'.xx));
        return redirect(aurl('department'));
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
