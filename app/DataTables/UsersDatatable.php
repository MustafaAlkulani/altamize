<?php

namespace App\DataTables;

use App\Student;
use App\UserAccount;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class UsersDatatable extends DataTable
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
            ->addColumn('level', 'admin.social.acounts.btn.level')
            ->addColumn('type', 'admin.social.acounts.btn.department')
            ->addColumn('name', 'admin.social.acounts.btn.name')
            ->addColumn('acadimy_id', 'admin.social.acounts.btn.acadimy_id')
            ->addColumn('delete', 'admin.social.acounts.btn.delete')
            ->addColumn('show', 'admin.social.acounts.btn.show')
            ->addColumn('gender', 'admin.social.acounts.btn.gender')
            ->rawColumns([
                'delete',
                'type',
                'level',
                'name',
                'acadimy_id',
                'show',
                'gender',
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
//        return DB::table('students')
//            ->join('user_accounts', function($join)
//            {
//                $join->on('user_accounts.useraccountable_id', '=', 'students.id');
//            })->select('user_accounts.id','user_acountd.useraccountable_type','students.level', 'students.department_id','students.status','students.acadimy_id','students.name','user_accounts.user_name')
//            ->where('has_acount',true)
//            ->get();

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


                ],
                'initComplete'=>" function() {
                       this.api().columns([0,3,4]).every( function(){ 
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
                'title'=>' ID',
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
                'title'=>'اسم المستخدم ',
            ],
            [
                'name'=>'display_name',
                'data'=> 'display_name',
                'title'=>'اسم العرض',
            ],
            [
                'name'=>'type',
                'data'=> 'type',
                'title'=>'النوع',
                'exportable'=>false,
            ],

            [
                'name'=>'level',
                'data'=> 'level',
                'title'=>'المستوى',
                'exportable'=>false,
            ],
            [
                'name'=>'gender',
                'data'=> 'gender',
                'title'=>'الجنس',
                'exportable'=>false,
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
