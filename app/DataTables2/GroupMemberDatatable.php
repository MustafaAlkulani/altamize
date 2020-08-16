<?php

namespace App\DataTables;

use App\Student;
use App\UserAccount;
use App\Group;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class GroupMemberDatatable extends DataTable
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
            ->addColumn('checkbox', 'admin.social.section.group.btn.checkbox')
            ->addColumn('delete', 'admin.social.section.group.btn.delete')
            ->rawColumns([
                'delete',
                'checkbox',
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
//        $course =Group::where('study_course_id',\request('group_id'))->get(['id']);
        $group_id=\request('group_id');

      //  return Student::query();
 return  DB::table('group_members')
     ->join('user_accounts', function($join)
     {
         $join->on('group_members.user_id', '=', 'user_accounts.id');
     })->select('group_members.id', 'group_members.isAdmin','group_members.isBlocked','group_members.user_id','group_members.group_id','user_accounts.user_name','user_accounts.display_name', 'user_accounts.useraccountable_id','user_accounts.useraccountable_type')
     ->where('group_id', $group_id)
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
                    [  'className'=>'btn btn-info ','text' => '<i class="fa fa-plus" ></i> '.trans('admin.create_student'),
                        'action'=>" function(){
                              window.location.href=' ".\asurl('/group/'.request('group_id').'/addusers')."'
                              }" ],

                    ['extend'=>'reload','className'=>'btn btn-default ','text' => '<i class="fa fa-refresh" ></i> '],


                ],
                'initComplete'=>" function() {
                       this.api().columns([1,2,3,4]).every( function(){ 
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
                'name'=>'useraccountable_id',
                'data'=> 'useraccountable_id',
                'title'=>'ID',
            ],
           [
                'name'=>'user_id',
                'data'=> 'user_id',
                'title'=>trans('admin.acadimy_id'),
            ],

            [
                'name'=>'user_name',
                'data'=> 'user_name',
                'title'=>trans('admin.name'),
            ],
            [
                'name'=>'display_name',
                'data'=> 'display_name',
                'title'=>trans('admin.display_name'),
            ],
            [
                'name'=>'useraccountable_type',
                'data'=> 'useraccountable_type',
                'title'=>'النوع',
            ],
            [
                'name'=>'isAdmin',
                'data'=> 'isAdmin',
                'title'=>'مشرف',
            ],
            [
                'name'=>'isBlocked',
                'data'=> 'isBlocked',
                'title'=>'محضور',
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
        return 'Studentlaval_' . date('YmdHis');
    }
}
