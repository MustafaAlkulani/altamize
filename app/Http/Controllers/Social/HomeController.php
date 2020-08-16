<?php

namespace App\Http\Controllers\Social;

use App\Department;
use App\PostGroup;
use App\Study_plan;
use App\StudyCourse;
use Illuminate\Http\Request;
use App\UserAccount;

use Illuminate\Http\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Teacher;
use App\Student;
use App\PostProfile;
use App\CoummentPost;
class HomeController extends Controller
{

    public function index()
    {

        $data=PostGroup::all();
        // return dd($data->all());
      //  $comm=CoummentPost::where('post_id',$id)->get();


        return view('social.index')

 //   ->with('comm',$comm)
    ->with('posts',$data)
        ->with('myCources',myCources())
            ->with('groups',getAllGroups())
            ->with('departments', getAlldepartments())
            ;
       // $courses=StudyCourse::all()->where('year',$year)->where();
   // return $courses;


//
//       foreach ($user as $r)
//           echo $r->studyCourses . "<br>";
//        return dd($user);
        //   $d=Department::find(1)->study_plans();



        //  $d=Department::find(1)->study_plans->where('id','2');

        // $d=Study_plan::find(1);
       // $c=$d->department->name;

        $t=StudyCourse::where('');
        return dd($d);


            ;
    }
}
