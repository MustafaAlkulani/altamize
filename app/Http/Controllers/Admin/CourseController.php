<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\StudyPlanDatatable;
use  App\Study_plan;
use  App\Department;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudyPlanDatatable $study,$dep_id)
    {
        $t= Department::where('id',$dep_id)->value('name');

        $title=' إدارة الخطة الدراسية للقسم : '.$t;
        return $study->render('admin.department.study_plan.index',['title'=>$title,'dep_id'=>$dep_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dep_id)
    {
        // $level= intValue(Department::find($dep_id)->levels);


        $title=trans('admin.create_study_plan');
        return view('admin.department.study_plan.create',compact('title','dep_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$dep_id)
    {

        $data=$this->validate(request(),[
            'name_ar'=>'required|string|max:50',
            'name_en'=>'required|string|max:50',
            'level'=>'required|integer',
            'theorical_hore'=>'required|integer|max:10',
            'lab_hore'=>'required|integer|max:10',
            'max_grade'=>'required|integer|max:255',
            'semester'=>'required|in:1,2',
        ],[],[
            'name_ar'=>trans('admin.name_ar'),
            'name_en'=>trans('admin.name_en'),
            'theorical_hore'=>trans('admin.theorical_hore'),
            'lab_hore'=>trans('admin.lab_hore'),
            'max_grade'=>trans('admin.max_grade'),
            'semester'=>trans('admin.semester'),
            'level'=>trans('admin.level'),
        ]);
        $data['department_id']=$dep_id;
        Study_plan::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('department/'.$dep_id.'/study'));
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
    public function edit($id,$dep_id)
    {
        $study=Study_plan::find($id);
        $title=trans('admin.edit');
        return view('admin.department.study_plan.edit',compact('study','title','dep_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$dep_id)
    {
        $data=$this->validate(request(),[
            'name_ar'=>'required|string|max:50',
            'name_en'=>'required|string|max:50',
            'level'=>'required|integer',
            'theorical_hore'=>'required|integer|max:10',
            'lab_hore'=>'required|integer|max:10',
            'max_grade'=>'required|integer|max:255',
            'semester'=>'required|in:1,2',
        ],[],[
            'name_ar'=>trans('admin.name_ar'),
            'name_en'=>trans('admin.name_en'),
            'theorical_hore'=>trans('admin.theorical_hore'),
            'lab_hore'=>trans('admin.lab_hore'),
            'max_grade'=>trans('admin.max_grade'),
            'semester'=>trans('admin.semester'),
            'level'=>trans('admin.level'),
        ]);


        Study_plan::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('department/'.$dep_id.'/study'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dep_id,$id)
    {
        Study_plan::find($id)->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('department/'.$dep_id.'/study'));
    }


    public  function  multe_delete($dep_id){
        if(is_array(\request('item'))){
            Study_plan::destroy(\request('item'));
        }else{
            Study_plan::find(\request('item'))->delete();
            session()->flash('success',trans('admin.record_deleted'));
            return redirect(aurl('department/'.$dep_id.'/study'));
        }
    }
}
