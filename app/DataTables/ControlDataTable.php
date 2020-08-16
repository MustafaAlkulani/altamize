<?php

namespace App\DataTables;
use http\Env\Request;
use App\Result;
use App\Student;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class ControlDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query);
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {

        $results = Result::all();
        $data = [];
        $n=0;

        foreach ($results as $result) {

            $n++;
            $temp = array(
                'n'=>$n,
                'acadimy_id' => $result->student->acadimy_id,
                'name' => $result->student->name,
                'course' => $result->study_course->study_plan->name_ar,
                'department' => $result->study_course->study_plan->department->name,
                'level' => $result->study_course->study_plan->level,
                'grade' => $result->grade,
                'rate' => $result->rate,
                'year' => $result->year
            );
            $data[] = $temp;



        }

        return $data;

        
//        if(\request('study_plan_id'))
//        {
//
//           // return Result::query();
//              $r=\request('study_plan_id');
//              $y=request('year');
//            // return Result::query()->where(['study_plan_id'=>$r,'year'=>request('year')]);
//
//            return DB::table('results')
//            ->join('students', function($join)
//            {
//                $join->on('results.student_id', '=', 'students.id');
//            })->select('results.id','results.student_id', 'students.name','students.acadimy_id','results.grade','results.rate','results.year','results.created_at','results.updated_at')
//            ->where(['results.study_plan_id'=>$r,'results.year'=>$y])
//            ->get();
//
//
//
//        }
//       else
//    {
//     return DB::table('results')
//            ->join('students', function($join)
//            {
//                $join->on('results.student_id', '=', 'students.id');
//            })
//            ->select('results.id','results.student_id', 'students.name','students.acadimy_id','results.grade','results.rate','results.year','results.created_at','results.updated_at')
//
//           ->get() ;
//    }



  }

 




    //return Result::query();
       
    

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                  //  ->addAction(['width' => '80px'])
                  //  ->parameters($this->getBuilderParameters());
                  ->parameters([
                      'dom'=>'Blfrtip',
                      'lengthMenu'=>[[10,25,50,100],[10,25,50,trans('admin.all_record')]],
                      'buttons'=>[
                          [   ],
                          ['extend'=>'print','className'=>'btn btn-primary','text' => '<i class="fa fa-print" > </i>'],
                          ['extend'=>'csv','className'=>'btn btn-info ','text' => '<i class="fa fa-file" ></i> '.trans('admin.ex_csv')],
                          ['extend'=>'excel','className'=>'btn btn-success ','text' => '<i class="fa fa-file" ></i> '.trans('admin.ex_excel')],
                          ['extend'=>'reload','className'=>'btn btn-default ','text' => '<i class="fa fa-refresh" ></i> '],
                         
                      ],
                      'initComplete'=>" function() {
                       this.api().columns([2,3,4,5]).every( function(){ 
                        var column=this;
                        var input =document.createElement(\"input\");
                        $(input).appendTo($(column.footer()).empty())
                        .on('keyup',function(){
                         column.search($(this).val(),false,false,true).draw();
                         });
                       
                       });
                     
                       }",
                      'language'=> datatable_lang(),
                      'responsive' => true,
                      'autoWidth' => false,
                      'scrollX'=>true,
                  ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */


    protected function getColumns()
    {


//
//        if(\request('study_plan_id'))
//        {
        return [

            [
                'name' => 'n',
                'data' => 'n',
                'title' => '#',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => true,
            ],

            [
                'name' => 'name',
                'data' => 'name',
                'title' => trans('admin.name'),
            ],
            [
                'name' => 'acadimy_id',
                'data' => 'acadimy_id',

                'title' => trans('admin.acadimy_id'),
            ],

            [
                'name' => 'department',
                'data' => 'department',

                'title' => trans('admin.department'),
            ],
            [
                'name' => 'course',
                'data' => 'course',

                'title' => trans('admin.course'),
            ],
            [
                'name' => 'level',
                'data' => 'level',

                'title' => trans('admin.level'),
            ],
            [
                'name' => 'grade',
                'data' => 'grade',
                'title' => trans('admin.grade'),

            ],
            [
                'name' => 'rate',
                'data' => 'rate',
                'title' => trans('admin.rate'),

            ],
            [
                'name' => 'year',
                'data' => 'year',
                'title' => trans('السنه'),

            ],


        ];


    //}

//    else{
//        return [
//            [
//                'name'=>'checkbox',
//                'data'=> 'checkbox',
//                'title'=>' <input type="checkbox" class="check_all" onclick="check_all()" >  ',
//                'exportable'=>false,
//                'printable'=>false,
//                'orderable'=>false,
//                'searchable'=>false,
//            ],
//            [
//                'name'=>'id',
//                'data'=> 'id',
//                'title'=>trans('control.ID'),
//                'exportable'=>false,
//                'printable'=>false,
//                'orderable'=>false,
//                'searchable'=>true,
//            ],
//            [
//                'name'=>'student_id',
//                'data'=>'student_id',
//
//                'title'=>trans('control.student_id'),
//            ],
//            [
//                'name'=>'name',
//                'data'=>'name',
//
//                'title'=>trans('name'),
//            ],
//            [
//                'name'=>'acadimy_id',
//                'data'=>'acadimy_id',
//
//                'title'=>trans('control.acadimy_id'),
//            ],
//            [
//                'name'=>'grade',
//                'data'=> 'grade',
//                'title'=>trans('control.grade'),
//                'exportable'=>false,
//                'printable'=>false,
//                'orderable'=>false,
//                'searchable'=>true,
//            ],
//            [
//                'name'=>'rate',
//                'data'=> 'rate',
//                'title'=>trans('النسبه'),
//                'exportable'=>false,
//                'printable'=>false,
//                'orderable'=>false,
//                'searchable'=>false,
//            ],
//            [
//                'name'=>'year',
//                'data'=> 'year',
//                'title'=>trans('السنه'),
//                'exportable'=>false,
//                'printable'=>false,
//                'orderable'=>false,
//                'searchable'=>false,
//            ],
//            [
//                'name'=>'created_at',
//                'data'=> 'created_at',
//                'title'=>trans('control.created_at'),
//                'exportable'=>false,
//                'printable'=>false,
//                'orderable'=>false,
//                'searchable'=>false,
//
//            ],
//            [
//                'name'=>'updated_at',
//                'data'=> 'updated_at',
//                'title'=>trans('control.updated_at'),
//                'exportable'=>false,
//                'printable'=>false,
//                'orderable'=>false,
//                'searchable'=>false,
//
//            ],
//
//
//        ];
//    }

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Result_' . date('YmdHis');
    }
}
