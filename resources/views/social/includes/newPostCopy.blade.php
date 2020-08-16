<div class="central-meta" ID="newPostGropForm">
    <div class="new-postbox">
        <figure>
            <img src="{{Storage::url(social()->user()->personal_image)}}" alt="">
        </figure>

        <div class="newpst-input">
            {{--{!! Form::open(['url'=> surl('editpostgroup'),'id'=>"NewPostGropForm" ,'class'=>'create-post-form',/*'class'=>'dropzone', 'id'=>'my-awesome-dropzone',*/'files'=>true]) !!}--}}
            {!! Form::open(['url'=> surl('postprofile'),'class'=>'create-post-form','id'=>"NewPostForm" ,/*'class'=>'dropzone', 'id'=>'my-awesome-dropzone',*/'files'=>true]) !!}


            {{--<div class="form-group">--}}
            {{--{!! Form::label('text','edit post') !!}--}}
            {{--{!! Form::textarea('text',old('text'),['class'=>'form-control','id'=>'editor1']) !!}--}}
            {{--</div>--}}
            {!! Form::label('text','') !!}

            <textarea name="text" placeholder="write something" id="editor1">   </textarea>
            <input type="hidden" name="group_id" value="{{$group_id}}">
            <input type="hidden" id="newPostButtons_image_id" name="images_id[]" value="">

            <div class="attachments">
                <ul id="NewPostGropFormBottons">


                    <li><a href="#" id="imageUpload"><i class="fa fa-camera-retro"></i></a></li>

                    <input type="file" class="new_post-images hidden" multiple="multiple"
                           accept="image/jpeg,image/png,image/gif"
                           name="file[]" id="post_images">


                    <li>
                        {{--<button  id="SaveNewPostGroup"  type="submitt">Post</button>--}}
                        {{--<button  id="SaveNewPostGroup"  type="submit">Post</button>--}}
                        <button id="SaveNewPost" type="submit" class="btn-submit"> {{trans('social.post')}}</button>


                    </li>
                    {!! Form::close() !!}
                </ul>
            </div>
            <div id="new-post-image-holder"></div>

        </div>
    </div>
</div><!-- add post new box -->