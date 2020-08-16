<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\StudentDatatable;
use  App\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudentDatatable $student)
    {
        //
        return $student->render('admin.student.index',['title'=>'إدارة الطلاب']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.student.create',['title'=>trans('admin.create_student')]);
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
            'name'=>'required|string',
            'ssn'=>'required|string|max:255|unique:students',
            'phone'=>'required|string',
            'acadimy_id'=>'required|string|max:255|unique:students',
            'email'=>'nullable|email',
            'ginder'=>'required|in:male,female',
            'department_id'=>'required|integer',
        ],[],[
            'name'=>trans('admin.name'),
            'phone'=>trans('admin.phone'),
            'acadimy_id'=>trans('admin.acadimy_id'),
            'department'=>trans('admin.department'),
            'ssn'=>trans('admin.ssn'),
            'email'=>trans('admin.email'),
            'ginder'=>trans('admin.ginder'),
        ]);
       Student::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('student'));
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
        $student=Student::find($id);
        $title=trans('admin.edit');
        return view('admin.student.edit',compact('student','title'));
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
            'ssn'=>'required|string:students,ssn,'.$id,
            'phone'=>'required|string',
            'acadimy_id'=>'required|string:students,acadimy_id,'.$id,
            'email'=>'nullable|email',
            'ginder'=>'required|in:male,female',
            'department_id'=>'required|integer',
        ],[],[
            'name'=>trans('admin.name'),
            'phone'=>trans('admin.phone'),
            'acadimy_id'=>trans('admin.acadimy_id'),
            'department'=>trans('admin.department'),
            'ssn'=>trans('admin.ssn'),
            'email'=>trans('admin.email'),
            'ginder'=>trans('admin.ginder'),
        ]);

       Student::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('student'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        Student::find($id)->delete();

        $data = deleteStudent($id);

        if ($data == true) {

            session()->flash('success',trans('admin.record_deleted'));
            return redirect()->back();
        } else {
            session()->flash('error', 'هناك خطاء ما لم يتم الحذف ');
            return redirect()->back();
        }

    }


    public  function  multe_delete(){
        if(is_array(\request('item'))){
//            Student::destroy(\request('item'));
        }else{

//            Student::find(\request('item'))->delete();

            session()->flash('success',trans('admin.record_deleted'));
            return redirect(aurl('student'));
        }
    }
}
