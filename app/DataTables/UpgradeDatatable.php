<?php

namespace App\DataTables;

use App\Upgrade;
use Yajra\DataTables\Services\DataTable;

class UpgradeDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    protected $type;

    public function __construct($t=1)
    {
        $this->type=$t;

    }
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('comp', 'admin.social.upgrade.btnComp')
            ->addColumn('status', 'admin.social.upgrade.btnStatus')
            ->addColumn('department_id', 'admin.social.upgrade.btnDepartment')
            ->addColumn('admin_id', 'admin.social.upgrade.btnAdmin')
            ->rawColumns([
                'comp',
                'status',
                'department_id',
                'admin_id',

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
        if($this->type ==1){
            return Upgrade::query()->where(['status'=>0,'year'=>currentYear(),'semester'=>currentSemester()]);
        }
        elseif ($this->type==2){
            return Upgrade::query()->where(['status'=>1,'year'=>currentYear(),'semester'=>currentSemester()]);
        }


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
                'name'=> 'id',
                'data'=>  'id',
                'title'=>'الرقم',
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
                'name'=>'admin_id',
                'data'=> 'admin_id',
                'title'=>'المشرف',
            ],
            [
                'name'=>'stape',
                'data'=> 'stape',
                'title'=>'الخطوة ',

            ],
            [
                'name'=> 'status',
                'data'=>  'status',
                'title'=>'الحالة',
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
                'name'=>'comp',
                'data'=> 'comp',
                'title'=>'التحكم',
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
        return 'Upgrade_' . date('YmdHis');
    }
}
