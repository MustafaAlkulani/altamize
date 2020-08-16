<div class="box-footer with-border">
    <div class="text-center  assignmentInfoBtn">
        <button class="btn btn-primary btn-block">
            <button class="btn btn-primary btn-block">  {{trans('social.NewAssignment')}}  <i class="fa fa-plus"></i></button>
    </div>

    <div class="assignmentInfoText vv">
        <form action="{{surl('myCource/AddStudentAssignmentAssignment/'.$myCource_id)}}" method="POST"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{--<textarea name="summernoteInput" class="summernote"></textarea>--}}
            {{--<br>--}}

            <div class="form-group">
                {!! Form::label('descrbtion',trans('admin.message_maintenance')) !!}
                {!! Form::textarea('descrbtion',old('descrbtion'),['class'=>'form-control','id'=>'editor1']) !!}
            </div>

            <div class="attachments">
                <ul>
                    <li>
                        <span> {{trans('social.addfile')}}  </span>
                        <i class="fa fa-file-pdf-o" style="font-size: 30px; color: #ff0000"></i>
                        <label class="fileContainer">
                            <input type="file" name="file">
                        </label>
                    </li>
                </ul>
            </div>

            <button type="submit">{{trans('social.send')}}</button>
        </form>


    </div>


</div><!-- /.box-footer -->

<br>


<div class="assignmentInfoText vv">
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <TEXTAREA NAME="descrbtion" ,CLASS="form-control" ID="editor1">  </TEXTAREA>

        </div>

        <div class="attachments">
            <ul>
                <li>
                    <span> {{trans('social.addfile')}}</span>
                    <i class="fa fa-file-pdf-o" style="font-size: 30px; color: #ff0000"></i>
                    <label class="fileContainer">
                        <input type="file" name="file">
                    </label>
                </li>
            </ul>
        </div>

        <button type="submit">{{trans('social.send')}}</button>
    </form>


</div>