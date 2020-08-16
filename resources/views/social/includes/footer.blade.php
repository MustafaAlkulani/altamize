</div>
<div class="side-panel">
    <h4 class="panel-title">{{trans('social.GeneralSetting')}}</h4>
    <form method="post">
        <div class="setting-row">
            <span> {{trans('social.Enableanyuserfollowmy')}}</span>
            <input class="nav_setting follow_my3" set_type="follow_my" type="checkbox" nav="1" id="follow_my1"
                   @if(social()->user()->follow_my==1) checked @ENDIF />
            <label for="follow_my1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>{{trans('social.showconcatinfo')}}</span>
            <input class="nav_setting view_my3" type="checkbox" set_type="view_my" nav="1" id="view_my1"
                   @if(social()->user()->view_my==1) checked @ENDIF />
            <label for="view_my1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>{{trans('social.canshowuserwhoIfollow')}} </span>
            <input class="nav_setting Ifollow3" type="checkbox" set_type="Ifollow" nav="1" id="Ifollow1"
                   @if(social()->user()->Ifollow==1) checked @ENDIF />
            <label for="Ifollow1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span> {{trans('social.canshowuserwhofollowmy')}} </span>
            <input class="nav_setting Myfollow3" type="checkbox" set_type="Myfollow" nav="1" id="Myfollow1"
                   @if(social()->user()->Myfollow==1) checked @ENDIF />
            <label for="Myfollow1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span><a href="{{route('personalPages.setting')}}" onclick="pp(this)" title="">
                    <i class="ti-settings"></i>{{trans('social.accountsetting')}}</a></span>
        </div>
        <div class="setting-row">
            <span><a href="{{surl('logout')}}" onclick="pp(this)" title=""><i
                            class="ti-power-off"></i>{{trans('social.logout')}}</a></span>
        </div>

    </form>

</div><!-- side panel -->

<!-- jQuery 2.1.4 -->
<script src="{{url('/')}}/desing/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>


<script src="{{url('/')}}/Desing/social/js/main.min.js"></script>
{{--<script src="{{url('/')}}/Desing/social/js/main.js"></script>--}}


<script src="{{url('/')}}/Desing/social/js/script.js"></script>

<script src="{{url('/')}}/Desing/social/js/osamaJs.js"></script>

<script src="{{url('/')}}/Desing/social/js/collabse.js"></script>


<script src="{{url('/')}}/Desing/social/sweetAlert2/dist/sweetalert2.js"></script>

<link rel="stylesheet" href="{{url('/')}}/Desing/social/sweetAlert2/dist/sweetalert2.css">


<script src="{{url('/')}}/Desing/social/js/OsamaJsoncode.js"></script>


<script>


    function changeProfile() {
        $('#personal_image').click();
    }

    $('#personal_image').change(function () {
        var type = $(this).attr('Imagetype');
//        alert(type);
        if ($(this).val() != '') {
            upload(this, type);

        }
    });


    function changeCoverImage() {
        $('#cover_image').click();
    }


    $('#btnSearch').click(function () {
        if (($(this).prev().val()).trim() != "")
            $(this).parent().trigger('submit');

    });

    $('#cover_image').change(function () {
        var type = $(this).attr('Imagetype');

        if ($(this).val() != '') {
            upload(this, type);

        }
    });


    function upload(img, type) {


        var form_data = new FormData();
        form_data.append('file', img.files[0]);
        form_data.append('_token', '{{csrf_token()}}');
        $('#loading_' + type).css('display', 'block');
        var url = '';
        if (type == 'cover_image') {
            url = "{{surl('changeCoverImage/'.social()->user()->id.'/cover_image')}}";
        }
        else if (type == 'personal_image') {
            url = "{{surl('changeCoverImage/'.social()->user()->id.'/personal_image')}}"
        }
        else if (type == 'cover_image_group') {
            url = "{{surl('changeCoverImage/'.$Cource_id.'/cover_image_group')}}";
        }
        $.ajax({
            url: url,
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#preview_' + type).attr('src', '{{asset('uploads/noimage.jpg')}}');
                    alert(data.errors['file']);
                }
                else {
                    $('#file_name_' + type).val(data);

                    $('#preview_' + type).attr('src', '{{Storage::url('')}}/' + data);
                }
                $('#loading_' + type).css('display', 'none');
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
                $('#preview_' + type).attr('src', '{{asset('images/noimage.jpg')}}');
            }
        });
    }

    function removeFile() {
        if ($('#file_name').val() != '')
            if (confirm('Are you sure want to remove profile picture?')) {
                $('#loading').css('display', 'block');
                var form_data = new FormData();
                form_data.append('_method', 'DELETE');
                form_data.append('_token', '{{csrf_token()}}');
                $.ajax({
                    url: "/social/ajax-remove-image/" + $('#file_name').val(),
                    data: form_data,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                        $('#file_name').val('');
                        $('#loading').css('display', 'none');
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            }
    }

    //


</script>

@yield('footer')
@yield('scripts')

{{--<script>--}}
{{--$(document).ready(function() {--}}


{{--var user_id='{{social()->user()->id}}' ;--}}
{{--var username='{{social()->user()->display_name}}' ;--}}
{{--var typingurl = '{{url('/')}}/Desing/social/LowgaChat-design/image/typing.gif';--}}

{{--function get_usrs_ids() {--}}
{{--//  var data='id='+encodeURIComponent(id )  ;--}}
{{--var url='/social/get_usrs_ids';--}}


{{--$.ajax({--}}
{{--url:url,//   var url=$('#news').attr('action');--}}
{{--method:'GET',--}}
{{--// data type that i want to return--}}
{{--// var form=$('#news').serialize();--}}
{{--type:'GET'      ,           // type of request that will send data--}}
{{--beforsend:function () {--}}
{{--},success:function (data) {--}}
{{--alert(data.ids);--}}
{{--return data.ids;--}}
{{--//--}}
{{--var my_status = $('.current_status').attr('status');--}}
{{--// console.log(my_status);--}}
{{--var socket = io.connect('http://localhost:5000', {--}}
{{--query: 'user_id=' + user_id + '&username=' + username + '&mylist=' + mylist.join(',') + '&status=' + my_status--}}
{{--});--}}


{{--var array_emit = ['is_online', 'iam_online', 'iam_offline', 'new_status'];--}}
{{--$.each(array_emit, function (k, v) {--}}
{{--socket.on(v, function (data) {--}}
{{--status_user(data.user_id, data.status);--}}
{{--});--}}

{{--});--}}
{{----}}

{{--}, error: function (xhr, status, error) {--}}
{{--alert(xhr.responseText);--}}
{{--}--}}

{{--});--}}

{{--}--}}


{{--socket.on('request_status', function (data) {--}}
{{--console.log($('.current_status').attr('status'));--}}
{{--socket.emit('response_status', {--}}
{{--to_user: data.user_id,--}}
{{--my_status: $('.current_status').attr('status')--}}
{{--});--}}
{{--});--}}


{{--socket.on('connect', function (data) {--}}
{{--$('.user').each(function () {--}}
{{--var uid = $(this).attr('uid');--}}
{{--socket.emit('check_online', {--}}
{{--user_id: 'user_' + uid--}}
{{--});--}}
{{--});--}}
{{--});--}}


{{--$(document).on('click', '.status', function () {--}}
{{--var status_user = $(this).attr('status');--}}
{{--$('.current_status').attr('status', status_user);--}}

{{--if (status_user == 'dnd') {--}}
{{--$('.current_status').text("don't disturb");--}}
{{--} else if (status_user == 'bys') {--}}
{{--$('.current_status').text('Busy');--}}
{{--} else {--}}
{{--$('.current_status').text(status_user);--}}
{{--}--}}

{{--socket.emit('change_status', {--}}
{{--status: status_user--}}
{{--});--}}
{{--});--}}


{{--});--}}


{{--</script>--}}


</body>

</html>