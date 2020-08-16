<?php

namespace App\DataTables;

use App\NotificationAdmin;
use Yajra\DataTables\Services\DataTable;

class NotificationDatatable extends DataTable
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
            ->addColumn('checkbox', 'admin.social.notification.btn.checkbox')
            ->addColumn('edit', 'admin.social.notification.btn.edit')
            ->addColumn('file', 'admin.social.notification.btn.file')
            ->addColumn('admin_id', 'admin.social.notification.btn.admin')
            ->addColumn('delete', 'admin.social.notification.btn.delete')
            ->addColumn('users', 'admin.social.notification.btn.users')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
                'file',
                'admin_id',
                'users',
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
        return NotificationAdmin::query();

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
                    [  'className'=>'btn btn-info ','text' => '<i class="fa fa-plus" ></i> اضافة اشعار جديد',
                        'action'=>" function(){
                              window.location.href=' ".\URL::current()."/create'
                              }" ],

                    ['extend'=>'reload','className'=>'btn btn-default ','text' => '<i class="fa fa-refresh" ></i> '],
                    [  'text' => '<i class="fa fa-trash" ></i>','className'=>'btn btn-danger delBtn' ],

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
                'name'=>'title',
                'data'=> 'title',
                'title'=>'العنوان',
            ],
            [
                'name'=>'notification',
                'data'=> 'notification',
                'title'=>'التفاصيل ',
            ],
            [
                'name'=>'file',
                'data'=> 'file',
                'title'=>'الملف',

            ],
            [
                'name'=>'admin_id',
                'data'=> 'admin_id',
                'title'=>'الناشر',
            ],
            [
                'name'=>'users',
                'data'=> 'users',
                'title'=>'المستهدفين',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
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

            [
                'name'=>'created_at',
                'data'=> 'created_at',
                'title'=>trans('admin.created_at'),
            ],
            [
                'name'=>'updated_at',
                'data'=> 'updated_at',
                'title'=>trans('admin.updated_at'),
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
        return 'Study_Plan_' . date('YmdHis');
    }
}
