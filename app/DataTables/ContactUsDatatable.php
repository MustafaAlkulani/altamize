<?php

namespace App\DataTables;

use App\Contact_us;
use Yajra\DataTables\Services\DataTable;

class ContactUsDatatable extends DataTable
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
            ->addColumn('checkbox', 'admin.sit.contact.btn.checkbox')
            ->addColumn('reply', 'admin.sit.contact.btn.reply')
            ->addColumn('view', 'admin.sit.contact.btn.view')

            ->rawColumns([
                'reply',
                'view',

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
        return Contact_us::query();
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
                       this.api().columns([2,3,4,5]).every( function(){ 
                        var column=this;
                        var input =document.createElement(\"input\");
                        $(input).appendTo($(column.footer()).empty())
                        .on('keyup',function(){ column.search($(this).val(),false,false,true).draw();
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
                'name'=>'contact_name',
                'data'=> 'contact_name',
                'title'=>'اسم المرسل',
            ],
            [
                'name'=>'email',
                'data'=> 'email',
                'title'=>trans('admin.email'),
            ],
            [
                'name'=>'subject',
                'data'=> 'subject',
                'title'=>'العنوان',
            ],

            [
                'name'=>'message',
                'data'=> 'message',
                'title'=>'الرسالة',
            ],
            [
                'name'=>'view',
                'data'=> 'view',
                'title'=>'المشاهدة',
            ],
            [
                'name'=>'created_at',
                'data'=> 'created_at',
                'title'=>'ارسل في ',
            ],
            [
                'name'=>'reply',
                'data'=> 'reply',
                'title'=>'رد ',
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
        return 'contactUs_' . date('YmdHis');
    }
}
