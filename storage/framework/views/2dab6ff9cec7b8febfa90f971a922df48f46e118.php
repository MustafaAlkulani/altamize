<?php $__env->startSection('header'); ?>

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/css/select2.min.css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('path'); ?>
    <li><a href="<?php echo e(asurl('/upgrade/home')); ?>">
            <i class="fa fa-upload"></i> <span>ادارة التحديثات </span>
        </a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenUpgrade'); ?>

    <section class="content">
        <div class="row">
            <div class="col-md-12" >
                <div class="box ">
                    <div class="box-header ">
                        <h3 class="box-title">اختار القسم المستهدف للتحديث</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                            <?php echo Form::open(['url'=>asurl('/upgrade/showgroups')]); ?>

                            <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label>اختيار القسم</label>
                                    <select class="form-control select2 " name="department_id" id="department" value="<?php echo e(old('department_id')); ?>"  style="width: 100%;">
                                        <option value=" ">اختار القسم </option>
                                        <?php $__currentLoopData = App\Department::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label> المستوى الدراسي </label>
                                    <select class="form-control select2 " name="level" value="<?php echo e(old('level')); ?>"  id="levels"  style="width: 100%;" >

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>اختيار السنةالدراسية</label>
                                    <select class="form-control select2 dynamic" name="year" id="year" value="<?php echo e(old('year')); ?>"  style="width: 100%;" >

                                        <option value="2018-2019" selected="selected">2018-2019</option>
                                        <option value="2018-2019">2017-2018</option>
                                        <option value="2018-2019">2016-2017</option>
                                        <option value="2018-2019">2015-2016</option>




                                    </select>
                                </div>


                            <?php echo Form::submit('اختيار ',['class'=>'btn btn-primary']); ?>

                            <?php echo Form::close(); ?>


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                </div>
            </div>



        </div>
    </section>







<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <?php $__env->startPush('js'); ?>
        <script src="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script>


            var departselect='';
            var levelselect='';
            var yearselect='';
            var stepses=0;

            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })

            $(document).ready(function () {
                $('#department').change(function () {
                    if($(this).val() != '' )
                    {
                        var value=$(this).val();

                        var  _token=$('input[name="_token"]').val();
                        $.ajax({
                            url:"<?php echo e(route('department.levelsfetch')); ?>",
                            method:"POST",
                            data:{value:value,_token:_token},
                            dataType:'json',
                            success:function (data) {
                                stepses=1;
                                $('#levels').html(data);
                            }
                        })
                    }
                })
            })

          //  function runshowgroup() {

            $("#selectUp").click(function(){
                var department = $('#department').val();
                var level = $('#levels').val();
                var year = $('#year').val();
                var _token = $('input[name="_token"]').val();

                $.post(" <?php echo e(route('upgrade.showgroups')); ?>",
                    {
                        department: department,
                        _token: _token,
                        level:level,
                        year:year
                    },
                    function(data, status){
                        alert("Data: " + data + "\nStatus: " + status);
                    });
            });

            $(document).ready(function () {
                $('#levels').change(function () {
                    if ($(this).val() != '' && stepses ==1) {
                        var department = $('#department').val();
                        var level = $('#levels').val();
                        var year = $('#year').val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "<?php echo e(route('upgrade.showgroups')); ?>",
                            method: "POST",
                            data: {department: department, _token: _token,level:level,year:year},
                            dataType: 'json',
                            success: function (data) {
                                levelselect=level;
                                departselect=department;
                                yearselect=year;
                                $('#stap1').hide();
                                $('#tablegroub').html(data);
                            }
                        })
                    }
                });

            });



            function  check_all() {
                $('input[class="item_checkbox"]:checkbox').each(function () {
                    if($('input[class="check_all"]:checkbox:checked').length == 0){
                        $(this).prop('checked',false);
                    }else {
                        $(this).prop('checked',true);
                    }
                });
            }

            var  item_checked='';

                $(document).on('click','.del_all',function () {

                    if (item_checked != '') {

                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "<?php echo e(route('upgrade.deletegroups')); ?>",
                            method: "POST",
                            data: { _token: _token,item:item_checked},
                            dataType: 'json',
                            success: function (data) {
                                $('#tablegroub').html(data);
                            }
                        })
                    }
                });

                $(document).on('click','.delBtn',function () {
                    item_checked= $('input[class="item_checkbox"]:checkbox').filter(':checked').length;
                    if(item_checked > 0){
                        $('.record_count').text(item_checked);
                        $('.not_empty_record').removeClass('hidden');
                        $('.empty_record').addClass('hidden');
                    }else {
                        $('.record_count').text('');
                        $('.not_empty_record').addClass('hidden');
                        $('.empty_record').removeClass('hidden');
                    }
                    $('#multipleDelete').modal('show');
                })


            $(document).on('click','#skip',function () {



                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "<?php echo e(route('upgrade.showCourselevel')); ?>",
                        method: "POST",
                        data: { _token: _token,department:departselect,level:levelselect,year:yearselect},
                        dataType: 'json',
                        success: function (data) {
                            $('#stap2').hide();
                            $('#courselevel').html(data)

                        }
                    })

            });




        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.social.upgrade.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>