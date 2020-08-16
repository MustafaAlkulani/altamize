

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-default " id="myBtn{{$id}}">رد</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal{{$id}}" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color:green;"> {{trans('admin.raplay')}}</h4>
                </div>
                {!! Form::open(['url'=>aurl('sit/contact/raplay/'.$id),'method'=>'post']) !!}
                <div class="modal-body">


                        <div class="form-group">
                            {!! Form::label('raplay','الرد ') !!}
                            <br>
                            {!! Form::textarea('raplay',old('raplay'),['class'=>'form-control ','placeholder'=>'اكتب الرد ','rows'=>'5']) !!}
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.close')}}</button>
                    {!! Form::submit(trans('admin.send'),['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close(); !!}

            </div>
        </div>
    </div>


<script>
    $(document).ready(function(){
        $("#myBtn{{$id}}").click(function(){
            $("#myModal{{$id}}").modal();
        });
    });
</script>



