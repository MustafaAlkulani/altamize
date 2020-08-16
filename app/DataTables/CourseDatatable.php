<?php

namespace App\DataTables;



use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class CourseDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)

            ->addColumn('department_id', 'admin.social.courses.btn.department')
            ->addColumn('show', 'admin.social.courses.btn.show')
            ->addColumn('group', 'admin.social.courses.btn.group')
            ->addColumn('delete', 'admin.social.courses.btn.delete')
            ->rawColumns([
                'department_id',
                'show',
                'group',
                'delete',

            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {


        //  return Student::query();
        return  DB::table('study_courses')
            ->join('study_plans', function($join)
            {
                $join->on('study_plans.id', '=', 'study_courses.study_plan_id');
            })->select('study_courses.id','study_courses.year','study_courses.study_plan_id', 'study_courses.teacher_id','study_plans.level','study_plans.department_id','study_plans.semester','study_plans.name_ar')
            ->get();


    }

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

                    [  'className'=>'btn btn-info ','text' => '<i class="fa fa-plus" ></i> اضافة كورس  جديد',
                        'action'=>" function(){
                              window.location.href=' ".\URL::current()."/create'
                              }" ],
                    ['extend'=>'reload','className'=>'btn  btn-default ','text' => '<i class="fa fa-refresh" ></i> '],

                ],
                'initComplete'=>" function() {
                       this.api().columns([1,2,3,4,5]).every( function(){ 
                        var column=this;
                        var input =document.createElement(\"input\");
                        $(input).appendTo($(column.header()))
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
        return [

            [
                'name'=>'id',
                'data'=> 'id',
                'title'=>'ID Course',
            ],
            [
                'name'=>'study_plan_id',
                'data'=> 'study_plan_id',
                'title'=>'رقم المادة',
            ],
            [
                'name'=>'name_ar',
                'data'=> 'name_ar',
                'title'=>'اسم المادة ',
            ],

            [
                'name'=>'department_id',
                'data'=> 'department_id',
                'title'=>trans('admin.department'),
                'exportable'=>false,
            ],

            [
                'name'=>'level',
                'data'=> 'level',
                'title'=>trans('admin.level'),

            ],
            [
                'name'=>'year',
                'data'=> 'year',
                'title'=>'العام الدراسي',
            ],
            [
                'name'=>'group',
                'data'=> 'group',
                'title'=>'اضافة مجموعة',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],


            [
                'name'=>'show',
                'data'=> 'show',
                'title'=>'عرض',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],
            [
                'name'=>'delete',
                'data'=> 'delete',
                'title'=>trans('admin.delete'),
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],



        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
