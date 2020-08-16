<?php

namespace App\DataTables;

use App\Group;
use App\Student;
use App\Study_plan;
use App\StudyCourse;
use App\UserAccount;

use http\Env\Request;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class AddUserGroupDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    protected  $group_id;
    protected  $type;
    public function __construct($t,$id)
    {
        $this->type=$t;
        $this->group_id=$id;

    }
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('checkbox', 'admin.social.courses.group.btn.checkbox')
            ->addColumn('department_id', 'admin.social.courses.group.btn.department')
            ->rawColumns([
                'checkbox',
                'department_id'

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
if($this->type == 1){
    $data=StudyCourse::find($this->group_id);
    $d=Study_plan::find($data->study_plan_id)->department_id;

}else{
    $st=Group::find($this->group_id);
    $data=StudyCourse::find($st->study_course_id);
    $d=Study_plan::find($data->study_plan_id)->department_id;
}

        return DB::table('students')
            ->join('user_accounts', function($join)
            {
                $join->on('user_accounts.useraccountable_id', '=', 'students.id')->where('user_accounts.useraccountable_type','App\Student');
            })->select('user_accounts.id','students.status','students.acadimy_id','students.name','students.department_id','students.level','user_accounts.user_name','user_accounts.display_name')
            ->where('has_acount',true)
            ->where('department_id',$d)
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
                    [  'text' => '<i class="fa fa-plus" >اضافة </i>','className'=>'btn btn-info delBtn' ],

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
                'name'=>'checkbox',
                'data'=> 'checkbox',
                'title'=>' <input type="checkbox" class="check_all" onclick="check_all()" >  ',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],

            [
                'name'=>'acadimy_id',
                'data'=> 'acadimy_id',
                'title'=>trans('admin.acadimy_id'),
            ],
            [
                'name'=>'name',
                'data'=> 'name',
                'title'=>trans('admin.name'),
            ],
            [
                'name'=>'user_name',
                'data'=> 'user_name',
                'title'=>'اسم المستخدم',
            ],

            [
                'name'=>'department_id',
                'data'=> 'department_id',
                'title'=>'القسم ',
            ],
            [
                'name'=>'level',
                'data'=> 'level',
                'title'=>'المستوى',
            ],

            [
                'name'=>'status',
                'data'=> 'status',
                'title'=>trans('admin.status'),
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
