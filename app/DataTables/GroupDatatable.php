<?php

namespace App\DataTables;



use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class GroupDatatable extends DataTable
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
//            ->addColumn('checkbox', 'admin.social.groups.btn.checkbox')
            ->addColumn('department', 'admin.social.groups.btn.department')
            ->addColumn('level', 'admin.social.groups.btn.level')
            ->addColumn('show', 'admin.social.groups.btn.show')
            ->addColumn('delete', 'admin.social.groups.btn.delete')
            ->rawColumns([
                'delete',
//                'checkbox',
                'department',
                'level',
                'show',


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
        return  DB::table('groups')
            ->join('study_courses', function($join)
            {
                $join->on('study_courses.id', '=', 'groups.study_course_id');
            })->select('groups.id', 'groups.name','groups.study_course_id','study_courses.year','study_courses.study_plan_id', 'study_courses.teacher_id')
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

                    ['extend'=>'reload','className'=>'btn btn-default ','text' => '<i class="fa fa-refresh" ></i> '],
//                    [  'text' => '<i class="fa fa-trash" ></i>','className'=>'btn btn-danger delBtn' ],

                ],
                'initComplete'=>" function() {
                       this.api().columns([1,2,3,4]).every( function(){ 
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
//            [
//                'name'=>'checkbox',
//                'data'=> 'checkbox',
//                'title'=>' <input type="checkbox" class="check_all" onclick="check_all()" >  ',
//                'exportable'=>false,
//                'printable'=>false,
//                'orderable'=>false,
//                'searchable'=>false,
//            ],
            [
                'name'=>'id',
                'data'=> 'id',
                'title'=>'ID',
            ],
            [
                'name'=>'name',
                'data'=> 'name',
                'title'=>'اسم المجموعة ',
            ],
            [
                'name'=>'study_plan_id',
                'data'=> 'study_plan_id',
                'title'=>'رقم المادة',
            ],
            [
                'name'=>'department',
                'data'=> 'department',
                'title'=>trans('admin.department'),
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],

            [
                'name'=>'level',
                'data'=> 'level',
                'title'=>trans('admin.level'),
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],
            [
                'name'=>'year',
                'data'=> 'year',
                'title'=>'العام الدراسي',
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
        return 'Groups_' . date('YmdHis');
    }
}
