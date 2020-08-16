<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.title',['titled'=>$title ,'icon'=>'fa fa-sticky-note-o'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="box">

        <div class="box-body">
            <table cellpadding="3" cellspacing="0" border="0" style="width: 67%; margin: 0 auto 2em auto;">
                <thead>
                <tr>
                    <th>العمود </th>
                    <th>البحث</th>

                </tr>
                </thead>
                <tbody>

                <tr id="filter_col6" data-column="6">
                    <td>النوع </td>
                    <td align="center">
                         <select class="column_filter"  type="text" id="col6_filter" >
                             <option value="App\Student">student </option>
                             <option value="App\Teacher">teacher </option>
                         </select>

               </tr>

                </tbody>


</table>
            <?php echo Form::open(['id'=>'form_data','url'=>asurl('/notification/'.$id.'/user/add'),'method'=>'post']); ?>

            <?php echo Form::hidden('method','delete'); ?>

            <?php echo $dataTable->table(['class'=>'dataTable table table-striped table-hover table  display table-bordered','id'=>'example','style'=>'width:100%' ],true); ?>


        <?php echo Form::close(); ?>

        </div>
    </div>



    <!-- Modal -->
    <div id="multipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اضافة الاعظاء الى الاشعار</h4>
                </div>
                <div class="modal-body">
                  <div class="alert alert-info">
                      <div class="empty_record hidden">
                          <h3 > <?php echo e(trans('admin.please_check_some_record')); ?>  </h3>
                      </div>
                      <div class="not_empty_record hidden">
                      <h3 > هل تريد اضافة هذا الاشخاص الى الاشعار   <span class="record_count"></span> ?</h3>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.no')); ?></button>
                        <input type="submit" name="del_all" value="<?php echo e(trans('admin.yes')); ?>" class="btn btn-default del_all">
                    </div>
                 </div>
            </div>
        </div>
    </div>






<?php $__env->startPush('js'); ?>
  <script>

      function filterGlobal () {
          $('#example').DataTable().search(
              $('#global_filter').val()
          ).draw();
      }

      function filterColumn ( i ) {
          $('#example').DataTable().column( i ).search(
              $('#col'+i+'_filter').val()
          ).draw();
      }

      $(document).ready(function() {
          $('#example').DataTable();

          $('select.global_filter').on( 'keyup', function () {
              filterGlobal();
          } );

          $('select.column_filter').on( 'keyup', function () {
              filterColumn( $(this).parents('tr').attr('data-column') );
          } );
      } );



      delete_all()
  </script>
    <?php echo $dataTable->scripts(); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>