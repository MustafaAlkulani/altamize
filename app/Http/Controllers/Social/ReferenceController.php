<?php

namespace App\Http\Controllers\Social;


use RealRashid\SweetAlert\Facades\Alert;

use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\ReferenceBook;
use App\StudyCourse;
use App\Study_plan;
use App\Department;
use Illuminate\Support\Str;


class ReferenceController extends Controller
{

    //     Schema::create('assignments', function (Blueprint $table) {
//$table->increments('id');
//$table->string('describtion')->nullable();
//$table->string('file');
//$table->integer("study_course_id")->unsigned();
//$table->foreign('study_course_id')->references('id')->on('study_courses');

    public function index(Request $request)
    {
        Alert::success('Success Title', 'Success Message');


        $student_level = social()->user()->useraccountable->level;
        $student_department = social()->user()->useraccountable->department;
        $year1 = date('Y');//2018-2019
        $year2 = $year1 - 1;
        $year = $year2 . '-' . $year1;

        $sp = social()->user()->useraccountable->department->study_plans->where('level', $student_level);

        $myCources_id = [];
        foreach ($sp as $p) {

            $myCources_id[] = $p->id;
        }

        $myCources = \App\Study_plan::where('year', $year && 'level', 1);


        //return dd( $myCources);


        //$st_plan=Study_plan::all();
        //$course=StudyCourse::all();
        /// $ref=ReferenceBook::find(17);
        return view('social.courses.allReferences')
            ->with('active', 'allReferences')
            ->with('myCources', myCources())
            ->with('Cource_id', 0)
            ->with('groups', getAllGroups())
            ->with('myCources', $myCources)
            ->with('departments', getAlldepartments());
    }


    public function reference($id)
    {
        //return(dd($id));
        $study = Study_plan::find($id);
        $std = $study->name_en;
        //return dd( $study);
        $studyCourses = StudyCourse::where('study_plan_id', $id)->get();

        $myCources_id = [];
        $teachers_id = [];
        foreach ($studyCourses as $studyCourse) {
            $teachers_id[] = $studyCourse->teacher->useraccount->id;
            $myCources_id[] = $studyCourse->id;
        }


        // return dd( $s);
        $refer = ReferenceBook::whereIn('study_course_id', $myCources_id)->get();
        //$name=$refer->studycourse->study_plan()->name_en;

        return view('social.courses.referencesForOthers')
            ->with('active', 'references')
            ->with('myCources', myCources())
            ->with('Cource_id', $id)
            ->with('studyCourses', $studyCourses)
            ->with('std', $std)
            ->with('groups', getAllGroups())
            ->with('departments', getAlldepartments())
            ->with('teachers_id', $teachers_id);

    }

    public function getReference($department_name, $level, $symster)

    {

        //return((dd( $symster)));
        $dpet = Department::where('name', $department_name)->first();
        //return((dd( $dpet)));
        $refer = Study_plan::where('department_id', $dpet->id)
            ->where('level', $level)
            ->where('semester', $symster)
            ->get();
        //return((dd($refer)));
        return view('social.courses.allReferences')
            ->with('active', 'allReferences')
            ->with('myCources', myCources())
            ->with('Cource_id', 0)
            ->with('refer', $refer)
            ->with('groups', getAllGroups())
            ->with('departments', getAlldepartments());

    }

    public function store(Request $request)
    {


        $data = $this->validate(request(), [

            'file' => 'required | mimes:pdf,docx,ppts,ppt,pptx,doc,txt,zip,rar',

        ], [], [
            'file' => trans('admin.text'),


        ]);


        if (\request()->hasFile('file')) {
            $data['file'] = up()->upload([
                // new_name => '' ,
                'file' => 'file',
                'path' => 'Reference',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
        }

        // $userid=App\UserAccount::find(S);

        //$course=StudyCourse::where('teacher_id', /*social()->user()->id*/17 )->get() ;
        // $course= $course->id;
           

        $Refe = new ReferenceBook();

        $Refe->originalName = $request->file('file')->getClientOriginalName();
        $Refe->describtion = $request->input('describtion');
        $Refe->file = $data['file'];
        $Refe->study_course_id = $request->input('course_id');
        // $comment=$post->userComments->create( $data);


        $Refe->save();


        // session()->flash('success',trans('added'));
        return redirect()->back();


    }


    public function download($id)
    {


        $ass = ReferenceBook::find($id);
        $path = $ass->file;

        $headers = [
            'Content-Type:' => 'application/pdf',
            'Content-Type:' => 'application/docx',
            'Content-Type:' => 'application/ppt',
            'Content-Type:' => 'application/txt',
            'Content-Type:' => 'application/doc',
            'Content-Type:' => 'application/rar',
            'Content-Type:' => 'application/zip',
            'Content-Type:' => 'application/ppts',

        ];

//
        $type = explode('.', $path);
        $file_name = ($file_name = $ass->originalName);
//return ($file_name);


        return Storage::download($path, Str::ascii($file_name, 'ar'), $headers);
    }


    public function delete($id)
    {
        $path = ReferenceBook::find($id);
        Storage::delete($path->file);
        ReferenceBook::where('id', $path->id)->delete();


    }


}