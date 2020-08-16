<?php

namespace App\DataTables;

use App\Student;
use App\UserAccount;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class UsersNotificationDatatable extends DataTable
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
            ->addColumn('checkbox', 'admin.users.btn.checkbox')
            ->addColumn('edit', 'admin.users.btn.edit')
            ->addColumn('level', 'admin.users.btn.level')
            ->addColumn('delete', 'admin.users.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
                'level',
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
        return DB::table('students')
            ->join('user_accounts', function($join)
            {
                $join->on('user_accounts.useraccountable_id', '=', 'students.id');
            })->select('user_accounts.id','students.level', 'students.department_id','students.status','students.level','students.acadimy_id','students.name','user_accounts.user_name','user_accounts.display_name')
            ->where('has_acount',true)
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
                    [  'className'=>'btn btn-info ','text' => '<i class="fa fa-plus" ></i> '.trans('admin.add'),
                        'action'=>" function(){
                              window.location.href=' ".\URL::current()."/create'
                              }" ],
                    ['extend'=>'print','className'=>'btn btn-primary','text' => '<i class="fa fa-print" > </i>'],
                    ['extend'=>'csv','className'=>'btn btn-info ','text' => '<i class="fa fa-file" ></i> '.trans('admin.ex_csv')],
                    ['extend'=>'excel','className'=>'btn btn-success ','text' => '<i class="fa fa-file" ></i> '.trans('admin.ex_excel')],
                    ['extend'=>'reload','className'=>'btn btn-default ','text' => '<i class="fa fa-refresh" ></i> '],
                    [  'text' => '<i class="fa fa-trash" ></i>','className'=>'btn btn-danger delBtn' ],

                ],
                'initComplete'=>" function() {
                       this.api().columns([1,2,3]).every( function(){ 
                        var column=this;
                        var input =document.createElement(\"input\");
                        $(input).appendTo($(column.header())
                        .on('keyup',function(){
                         column.search($(this).val(),false,false,true).draw();
                         });
                       
                       });
                     
                       }",
                'language'=> datatable_lang(),
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
                'name'=>'display_name',
                'data'=> 'display_name',
                'title'=>'اسم العرض',
            ],
            [
                'name'=>'department_id',
                'data'=> 'department_id',
                'title'=>trans('admin.department'),
            ],
            [
                'name'=>'level',
                'data'=> 'level',
                'title'=>trans('admin.level'),
            ],
            [
                'name'=>'status',
                'data'=> 'status',
                'title'=>trans('admin.status'),
            ],

            [
                'name'=>'edit',
                'data'=> 'edit',
                'title'=>trans('admin.edit'),
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
