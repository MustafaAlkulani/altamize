@extends('social.layouts.without')
@section('content')

    <section>


        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class="col-lg-8 center-block">
                        <div class="central-meta">
                            <div class="frnds"> .
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">
                                            {{trans('social.NumResult')}}

                                             {{$usersCount}}   {{trans('social.result')}} </a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active fade show user_fllower_list " id="frends">
                                        <ul id="UlSearchResult" class="nearby-contct">
                                            @if($usersCount==0)
                                                <p class="text-center" style="color: #00a7d0"> {{trans('social.noResult')}} </p>
                                            @endif
                                            @foreach($users as $user)
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="{{surl('personalPage/'.$user->id)}}" title=""><img
                                                                        src="{{Storage::url($user->personal_image)}}"
                                                                        alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4 style="width: 50%"><a
                                                                        href="{{surl('personalPage/'.$user->id)}}"
                                                                        title="">{{$user->display_name}}</a></h4>
                                                            <span>@if($user->useraccountable_type=="App\Teacher") {{$user->useraccountable->type}} @else
                                                                    Student @endif</span>
                                                            <a href="#" user_id="{{$user->id }}" title=""
                                                               class="addGroupMember add-butn" data-ripple="">
                                                                اضافةxx </a>

                                                        </div>
                                                    </div>
                                                </li>

                                                <?php   $last_id = $user->id;    ?>

                                            @endforeach


                                        </ul>
                                        @if($limit <=$usersCount)
                                            <div class="lodmore">

                                                <button id="loadMoreSearchMemberResult"
                                                        class="loadMoreSearchMemberResult btn-view btn-load-more"
                                                        searchWord="{{$searchWord}}"
                                                        last-id="{{$last_id=$user->id}}"></button>

                                            </div>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>

@endsection



@section('footer')
    <script>


        $(document).on('click', '.addGroupMember', function () {


            var _this = $(this);
            var data = 'user_id=' + encodeURIComponent($(this).attr('user_id')) + '&group_id=' + encodeURIComponent('{{$Cource_id}}');
            var url =$('#surl').val()+'/AddGroupMember';

            //data=  data.serialize();
            $.ajax({
                url: url,//   var url=$('#news').attr('action');
                method: 'GET',
                dataType: 'json',// data type that i want to return
                data: data,// var form=$('#news').serialize();
                type: 'GET',           // type of request that will send data
                beforsend: function () {

                }, success: function (data) {

                    if (data.status == true) {
                        var user = _this.parent().parent().parent();

                        user.remove();
                    }
                }, error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    alert('eeeeeeeeee');

                }

            });

            return (false);
        });


        $(document).on('click', '.loadMoreSearchMemberResult', function () {
            var _this = $(this);
            var data = 'last_id=' + encodeURIComponent($(this).attr('last-id')) + '&searchWord=' + encodeURIComponent($(this).attr('searchWord'));
            var url =$('#surl').val()+'/loadMoreSearchMemberResult';
            //data=  data.serialize();


            $.ajax({
                url: url,//   var url=$('#news').attr('action');
                method: 'GET',
                dataType: 'json',// data type that i want to return
                data: data,// var form=$('#news').serialize();
                type: 'GET',           // type of request that will send data
                beforsend: function () {

                }, success: function (data) {


                    if (data.status == true) {
                        if (data.users == '') {
                            var _this_parent = _this.parent();
                            _this.remove();
                            _this_parent.append('<p class="text-center" style="color: #00a7d0"> there is no result </p>')

                        }
                        else
                            alert(data.users);

                        $('#UlSearchResult').prepend(data.users);
                        _this.attr('last-id', data.last_id);


                    }
                }, error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }

            });

            return (false);
        });

    </script>

@endsection