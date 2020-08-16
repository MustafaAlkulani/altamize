<?php

namespace App\DataTables;

use App\Teacher;
use Yajra\DataTables\Services\DataTable;

class TeacherDatatable extends DataTable
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
            ->addColumn('checkbox', 'admin.teacher.btn.checkbox')
            ->addColumn('edit', 'admin.teacher.btn.edit')
            ->addColumn('delete', 'admin.teacher.btn.delete')
            ->addColumn('has_acount', 'admin.teacher.btn.acount')
            ->rawColumns([
                'edit',
                'has_acount',
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
        return Teacher::query();
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
                    [  'className'=>'btn btn-info ','text' => '<i class="fa fa-plus" ></i> '.trans('admin.create_teacher'),
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
                'name'=>'ssn',
                'data'=> 'ssn',
                'title'=>trans('admin.ssn'),
            ],
            [
                'name'=>'type',
                'data'=> 'type',
                'title'=>trans('admin.type_teacher'),
            ],
            [
                'name'=>'email',
                'data'=> 'email',
                'title'=>trans('admin.email'),
            ],
            [
                'name'=>'qualification',
                'data'=> 'qualification',
                'title'=>trans('admin.qualification'),
            ],
            [
                'name'=>'ginder',
                'data'=> 'ginder',
                'title'=>trans('admin.ginder'),
            ],
            [
                'name'=>'phone',
                'data'=> 'phone',
                'title'=>trans('admin.phone'),
            ],

            [
                'name'=>'has_acount',
                'data'=> 'has_acount',
                'title'=>trans('admin.has_acount'),
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
        return 'Teacher_' . date('YmdHis');
    }
}
