<?php

namespace App\Http\Controllers\Admin;

use App\StudyCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\TeacherDatatable;
use  App\Teacher;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeacherDatatable $teacher)
    {
        //
        return $teacher->render('admin.teacher.index',['title'=>'إدارةالمدرسين']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.teacher.create',['title'=>trans('admin.create_teacher')]);
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
            'name'=>'required|string|max:50',
            'ssn'=>'required|string|max:50|unique:teachers',
            'phone'=>'required|string',
            'acadimy_id'=>'required|string|max:255|unique:teachers',
            'email'=>'nullable|email',
            'ginder'=>'required|in:male,female',
            'qualification'=>'required|string',
            'type'=>'required|in:doctor,teacher',
        ],[],[
            'name'=>trans('admin.name'),
            'phone'=>trans('admin.phone'),
            'acadimy_id'=>trans('admin.acadimy_id'),
            'qualification'=>trans('admin.qualification'),
            'ssn'=>trans('admin.ssn'),
            'email'=>trans('admin.email'),
            'ginder'=>trans('admin.ginder'),
            'type'=>trans('admin.type_teacher'),
        ]);
        Teacher::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('teacher'));
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
        $teacher=Teacher::find($id);
        $title=trans('admin.edit');
        return view('admin.teacher.edit',compact('teacher','title'));
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
            'name'=>'required|string',
            'ssn'=>'required|string:teachers,ssn,'.$id,
            'phone'=>'required|string',
            'acadimy_id'=>'required|string:teachers,acadimy_id,'.$id,
            'email'=>'nullable|email',
            'ginder'=>'required|in:male,female',
            'qualification'=>'required|string',
            'type'=>'required|in:doctor,teacher',
        ],[],[
            'name'=>trans('admin.name'),
            'phone'=>trans('admin.phone'),
            'acadimy_id'=>trans('admin.acadimy_id'),
            'qualification'=>trans('admin.qualification'),
            'ssn'=>trans('admin.ssn'),
            'email'=>trans('admin.email'),
            'ginder'=>trans('admin.gender'),
            'type'=>trans('admin.type_teacher'),
        ]);

        Teacher::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
       $this->destroy($id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeCourse($id,Request $request ){

            $new=$request->teacher_id;

        StudyCourse::where('teacher_id',$id)->update(['teacher_id'=>$new]);

     $this->destroy($id);
            }

    public function destroy($id)
    {
        $teacher=Teacher::findOrFail($id);
//        Teacher::find($id)->delete();
        if(StudyCourse::where('teacher_id',$id)->count() > 0){

            $title='تغير مدرس الكورسات الدراسية للمدرس :'.$teacher->name;
            return view('admin.teacher.changeTeacher',compact('teacher','title','id'));

        }


         $data = deleteTeacher($id);

        if ($data == true) {
            session()->flash('success',trans('admin.record_deleted'));
            return redirect(aurl('teacher'));
        } else {
            session()->flash('error', 'هناك خطاء ما لم يتم الحذف ');
            return redirect(aurl('teacher'));
        }




    }


    public  function  multe_delete(){
        if(is_array(\request('item'))){
            Teacher::destroy(\request('item'));
        }else{
            Teacher::find(\request('item'))->delete();
            session()->flash('success',trans('admin.record_deleted'));
            return redirect(aurl('teacher'));
        }
    }
}
