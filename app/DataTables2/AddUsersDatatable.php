<?php

namespace App\DataTables;

use App\Student;
use App\UserAccount;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class AddUsersDatatable extends DataTable
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
            ->addColumn('checkbox', 'admin.social.notification.users.btn.checkbox')
            ->addColumn('useraccountable_id', 'admin.social.notification.users.btn.department')
            ->addColumn('level', 'admin.social.notification.users.btn.level')
            ->addColumn('gender', 'admin.social.notification.users.btn.gender')
            ->addColumn('useraccountable_type', 'admin.social.notification.users.btn.type')
            ->addColumn('acadimy_id', 'admin.social.notification.users.btn.acadimy_id')
            ->addColumn('name', 'admin.social.notification.users.btn.name')
            ->rawColumns([
                'useraccountable_id',
                'gender',
                'checkbox',
                'level',
                'useraccountable_type',
                'acadimy_id',
                'name',
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
        return UserAccount::query();
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
                    [  'text' => '<i class="fa fa-plus" ></i>'.trans('admin.add'),'className'=>'btn btn-info delBtn' ],

                ],
                'initComplete'=>" function() {
                       this.api().columns([1,2,3]).every( function(){ 
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
                'scrollY'=> '350px',
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
                'name'=>'id',
                'data'=> 'id',
                'title'=>trans('admin.ID'),
            ],

            [
                'name'=>'acadimy_id',
                'data'=> 'acadimy_id',
                'title'=>trans('admin.acadimy_id'),
                'exportable'=>false,
            ],
            [
                'name'=>'name',
                'data'=> 'name',
                'title'=>trans('admin.name'),
                'exportable'=>false,
            ],
            [
                'name'=>'user_name',
                'data'=> 'user_name',
                'title'=>'اسم المستخدم',
            ],

            [
            'name'=>'useraccountable_type',
            'data'=> 'useraccountable_type',
            'title'=>'النوع',
        ],

            [
                'name'=>'gender',
                'data'=> 'gender',
                'title'=>'الجنس',
                'exportable'=>false,
            ],

            [
                'name'=>'useraccountable_id',
                'data'=> 'useraccountable_id',
                'title'=>'التخصص',

            ],
            [
                'name'=>'level',
                'data'=> 'level',
                'title'=>trans('admin.level'),
                'exportable'=>false,
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
