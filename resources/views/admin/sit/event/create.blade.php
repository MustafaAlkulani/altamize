@extends('admin.index')
@section('header')
    @push('cs')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{url('/')}}/Desing/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">


    <!-- daterange picker -->
    <link rel="stylesheet" href="{{url('/')}}/Desing/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{url('/')}}/Desing/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{url('/')}}/Desing/admin/plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{url('/')}}/Desing/admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{url('/')}}/Desing/admin/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('/')}}/Desing/admin/bower_components/select2/dist/css/select2.min.css">
 @endpush
@endsection

@section('content')


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title  }}  </h3>

        </div>
        <div class="box-body">
        {!! Form::open(['url'=>aurl('sit/event')]) !!}

            <div class="form-group">
                {!! Form::label('context','الحدث ') !!}
                 {!! Form::text('context',old('context'),['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('date','التاريخ') !!}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date"  name="date" value="{{old('date')}}" class="form-control pull-right" id="datepicker">
                </div>
            </div>



            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection

@section('footer')
    @push('js')
    <!-- InputMask -->
    <script src=". {{url('/')}}/Desing/admin/../plugins/input-mask/jquery.inputmask.js"></script>
    <script src=" {{url('/')}}/Desing/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src=" {{url('/')}}/Desing/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src=" {{url('/')}}/Desing/admin/bower_components/moment/min/moment.min.js"></script>
    <script src=" {{url('/')}}/Desing/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src=" {{url('/')}}/Desing/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src=" {{url('/')}}/Desing/admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src=" {{url('/')}}/Desing/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script>

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })


        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })




</script>

    @endpush
    @endsection
