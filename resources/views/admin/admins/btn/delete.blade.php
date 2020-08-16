


    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-danger " id="myBtn{{$id}}">
        <i class="fa fa-trash"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal{{$id}}" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">{{trans('admin.delete')}}</h3>
                </div>

                    {!! Form::open(['route'=>['admin.destroy',$id],'method'=>'delete']) !!}
                    <div class="modal-body">

                            <h4 > {{trans('admin.delete_this',['name'=>$name])}}  </h4>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.close')}}</button>
                    {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']) !!}
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