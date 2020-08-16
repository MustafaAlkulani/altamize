<?php


namespace App\Http\Controllers\Social;

use App\Assignment;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudyCourseController extends Controller
{
    //

     public function  getmyStudyCourse ( $id)
     {
         $s=Student::find($id) ;
         return dd($s);


     }
}
