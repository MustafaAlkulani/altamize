
<style >
    .activeLike{
        color: red;
        font-weight: 900;
        font-size:35px;
    }

</style>

@foreach($role as $post)

    <!-- start post  -->
    <div class="central-meta item">
        <div class="user-post">
            <div class="friend-info">

                <!-- start post options  -->

                @if(social()->user()->id == $post->user->id)
                <div class="more"> <big><big>...</big></big>
                    <ul class="more-dropdown">

                        <li>
                            <a href="{{surl('editpostpro/'.$post->id)}}">Edit Post <i class="fa fa-edit" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="{{surl('deletepostpro/'.$post->id)}}">Delete Post   <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#">Turn Off Notifications</a>
                        </li>
                        <li>
                            <a href="#">Select as Featured</a>
                        </li>


                    </ul>
                </div>
                @endif
                <!-- end post options  -->

                <!-- start post auther info  -->
                <figure  >
                    <img src="{{Storage::url(social()->user()->personal_image)}}" alt="">

                </figure>
                <div class="friend-name">
                    <ins><a href="time-line.html" title="">{{social()->user()->display_name}}</a></ins>
                    <span>published: {{$post->created_at->diffForHumans()}}</span>

                </div>

                <!-- end post auther info  -->


                <!-- start post content  -->
                <div class="description">

                    <p>
                        <a title="" href="#">#mypage</a> {{$post->text}}
                    </p>
                </div>
                <!-- end post content  -->

                <!-- start post photos  -->
                <div class="post-meta">

                    <ul class="photos">
                        <?php
                        $img=App\ImagePostProfile::where('post_id',$post->id)->get();
                        ?>

                        @foreach($img as $postimg)
                            <li>
                                <a class="strip" href="{{Storage::url($postimg->image)}}" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                    <img src="{{Storage::url($postimg->image)}}" alt=""></a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <!-- end post photos  -->

                <!-- start post like button  -->
                <div class="we-video-info postButtns"  >
                    <ul class="row">


                        <li class="col-xs-3">
															<span class="like" data-toggle="tooltip" title="like">
                                                             <a href="#" table_name="likePostProfile"  uid="{{ social()->user()->id  }}"  post-id="{{$post->id }}" class="checkLike" >
																 <i class="ti-heart
  <?php $userss=$post->users_liked()->find(social()->user()->id)  ;?>
                                                                 {{$userss['pivot']['type']}}
                                                                 @if($post->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="like")   activeLike @endif "></i>
                                                                 </a>
																<ins>
                                                                    {{getLikeCount($post,'like')}}
                                                                    {{--{{$count_like}}--}}
                                                                </ins>
															</span>
                        </li >



                        <li class="col-xs-3">
															<span class="dislike" data-toggle="tooltip" title="dislike">
                                                             <a href="#" table_name="likePostProfile"  uid="{{ social()->user()->id  }}"  post-id="{{$post->id }}" class="checkLike" >
																<i class="ti-heart-broken  <?php $userss=$post->users_liked()->find(social()->user()->id)  ;?>
                                                                {{$userss['pivot']['type']}}
                                                                @if($post->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="dislike")  activeLike @endif" ></i>
                                                                </a>
																<ins>
                                                                    {{getLikeCount($post,'dislike')}}
                                                                    {{--{{$count_dislike}}--}}
                                                                </ins>

															</span>
                        </li>


                        <li class="col-xs-3" >
															<span class="comment comments-button " data-toggle="tooltip" title="Comments" id="comments-button">
                                                            <!-- <a href= "{{surl('commentpost/')}}" > -->
                                                                <i class="fa fa-comments-o"></i>
                                                                <!-- </a> -->
																<ins>52</ins>
															</span>
                        </li>





                        <li class="col-xs-3">
															<span class="share" data-toggle="tooltip" title="share">
																<i class="fa fa-share-alt"></i>
																<ins>200</ins>
															</span>
                        </li>

                    </ul>
                </div>
                <!-- end post like button  -->

            </div>



            <!-- start comment -->

            <div  id="post-comment" class="coment-area">
                <ul class="we-comet">
                    <!--  start comment with reply  -->




                    <?php
                    $comment=App\CoummentPost::where('post_id',$post->id)->get();

                    ?>

                    @foreach($comment as $comm)
                        <li>
                            <!--  start  original comment   -->


                            <div class="comet-avatar">
                                <img src="{{Storage::url(social()->user()->cover_image)}}" alt="">
                            </div>
                            @if(!empty($comm->image))
                                <div class="we-comment">
                                    <div class="coment-head">
                                        <h5><a href="time-line.html" title="">{{$comm->id}}</a></h5>
                                        <span>{{ $comm->created_at}}</span>
                                        <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                    </div>
                                    <p>{{$comm->text}}</p>


                                    <img src="{{Storage::url($comm->image)}}" alt="">


                                </div>
                            @endif
                            @if(empty($comm->image))
                                <div class="we-comment">
                                    <div class="coment-head">
                                        <h5><a href="time-line.html" title="">{{$comm->id}}</a></h5>
                                        <span>{{ $comm->created_at->diffForHumans()}}</span>
                                        <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                    </div>
                                    <p>{{$comm->text}}</p>


                                </div>
                        @endif



                        <!-- start post like button  -->
                            <div class="we-video-info commentButtons">
                                <ul class="row">


                                    <li class="col-xs-3">
															<span class="like" data-toggle="tooltip" title="like">
																<i class="ti-heart"></i>
																<ins>2.2k</ins>
															</span>
                                    </li >


                                    <li class="col-xs-3">
															<span class="dislike" data-toggle="tooltip" title="dislike">
																<i class="ti-heart-broken"></i>
																<ins>200</ins>
															</span>
                                    </li>


                                    <li class="col-xs-3" >
															<span class="comment replyCommentsButton" data-toggle="tooltip" title="ReplyComments" id="replyCommentsButton">
																<i class="fa fa-reply"></i>
																<ins>52</ins>
															</span>
                                    </li>



                                </ul>
                            </div>
                            <!-- end post like button  -->

                            <!--  end  original comment   -->

                            <ul  class="replyPostComment" id="replyPostComment">
                                <!--  start  reply comment   -->
                                <?php
                                $reply=App\ReplyCoummentPost::where('coumment_post_profile_id',$comm->id)->get();

                                ?>
                                @if(!(empty( $reply)))
                                    @foreach($reply as $role)
                                        <li>
                                            <div class="comet-avatar">
                                                <img src="{{Storage::url(social()->user()->personal_image)}}" alt="">
                                            </div>
                                            <div class="we-comment">
                                                <div class="coment-head">
                                                    <h5><a href="time-line.html" title="">alexendra dadrio</a></h5>
                                                    <span>{{$role->created_at->diffForHumans()}}</span>
                                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                                </div>
                                                <p>  {{$role->text }} </p>
                                                <img src="{{Storage::url($role->image)}}" alt="">
                                            </div>
                                        </li>

                                @endforeach
                            @endif
                            <!-- start new reply comment -->

                                <li class="post-comment">
                                    <div class="comet-avatar">
                                        <img src="images/resources/comet-1.jpg" alt="">
                                    </div>
                                    <div class="post-comt-box">



                                        <!--
                                            <form method="post">
                                                <textarea name="replyCommentText"  id="replyCommentText" placeholder="Post your comment"> </textarea>


                                                <div class="attachments photoCommentButtun ">
                                                    <i class="fa fa-camera">
                                                        <label class="fileContainer" for="replyCommentImage">
                                                            <input type="file"  name="replyCommentImage" id="replyCommentImage">
                                                        </label>
                                                    </i>
                                                </div>

                                                <button type="submit" class="sendCommentReplyButtun" > <i class="fa fa-paper-plane"></i></button>
                                            </form> -->


                                        {!! Form::open(['url'=>surl('replycommpostpro/'.$comm->id) ,'files'=>true]) !!}

                                        {!! Form::label('text','') !!}
                                        {!! Form::textarea('text',old('text'),['id'=>'replyCommentText','placeholder'=>'Post your comment']) !!}


                                        <div class="attachments photoCommentButtun ">
                                            <i class="fa fa-camera">
                                                <label class="fileContainer" for="replyCommentImage">

                                                    {!! Form::file('image',['single'=>'yes','id'=>'replyCommentImage']) !!}
                                                </label>
                                            </i>
                                        </div>



                                        <button type="submit" class="" > <i class="fa fa-paper-plane"></i></button>


                                        {!! Form::close() !!}






                                    </div>
                                </li>
                                <!-- end  new comment -->

                                <!--  start  reply comment   -->
                            </ul>
                        </li>
                @endforeach















                <!--  start comment without reply  -->
                <!-- <li>
                    <div class="comet-avatar">
                        <img src="images/resources/comet-1.jpg" alt="">
                    </div>
                    <div class="we-comment">
                        <div class="coment-head">
                            <h5><a href="time-line.html" title="">{{'kjrid'}}</a></h5>
                            <span>{{'commentcreated_at'}}</span>
                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                        </div>
                        <p>{{'commenttext'}}
                        <i class="em em-smiley"></i>
                    </p>
                </div>
            </li> -->
                    <!--  end comment without reply  -->

                    <!-- start more comments button  -->
                    <li>
                        <a href="#" title="" class="showmore underline">more comments</a>
                    </li>
                    <!-- end comments button  -->

                    <!-- start new comment -->

                    <li class="post-comment">
                        <div class="comet-avatar">
                            <img src="images/resources/comet-1.jpg" alt="">
                        </div>
                        <div class="post-comt-box">





                            <!-- <form method="post">

                                <textarea name="CommentText" id="CommentText" placeholder="Post your comment"></textarea>
                                <div class="attachments photoCommentButtun ">
                                    <i class="fa fa-camera">
                                        <label class="fileContainer" for="CommentImage">
                                            <input type="file"  name="CommentImage" id="replyCommentImage">
                                        </label>
                                    </i>
                                </div>

                                <button type="submit" class="sendCommentButtun" > <i class="fa fa-paper-plane"></i></button>
                            </form> -->



                            {!! Form::open(['url'=> surl('commentpostpro/'.$post->id),'files'=>true]) !!}

                            {!! Form::label('text','') !!}
                            {!! Form::textarea('text',old('text'),['class'=>'CommentText','id'=>'CommentText','placeholder'=>'Post your comment']) !!}




                            <div class="attachments photoCommentButtun ">
                                <i class="fa fa-camera">
                                    <label class="fileContainer" for="CommentImage">

                                        {!! Form::file('image',['single'=>'yes','id'=>'replyCommentImage']) !!}
                                    </label>
                                </i>
                            </div>



                            <button type="submit" class="sendCommentButtun" > <i class="fa fa-paper-plane"></i></button>


                            {!! Form::close() !!}





                        </div>
                    </li>
                    <!-- end  new comment -->

                </ul>
            </div>
            <!-- end comment -->


        </div>

    </div>

    <!-- end post  -->



@endforeach






@if(isset($post->shared_post_id))
    <?php
    $sharedOwner = $post;
    $post = App\Post::where('id', $post->shared_post_id)->with('comments')->first();
    ?>
@endif
@foreach($role as $post)
<div class="panel panel-default panel-post animated" id="post{{ $post->id }}">
    <div class="panel-heading no-bg">
        <div class="post-author">
            <div class="post-options">
                <ul class="list-inline no-margin">
                    <li class="dropdown"><a href="#" class="dropdown-togle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            {{--@if($post->notifications_user->contains(Auth::user()->id))--}}
                                <li class="main-link">
                                    <a href="#" data-post-id="{{ $post->id }}" class="notify-user unnotify">
                                        <i class="fa  fa-bell-slash" aria-hidden="true"></i>{{ trans('common.stop_notifications') }}
                                        <span class="small-text">{{ trans('messages.stop_notification_text') }}</span>
                                    </a>
                                </li>
                                <li class="main-link hidden">
                                    <a href="#" data-post-id="{{ $post->id }}" class="notify-user notify">
                                        <i class="fa fa-bell" aria-hidden="true"></i>{{ trans('common.get_notifications') }}
                                        <span class="small-text">{{ trans('messages.get_notification_text') }}</span>
                                    </a>
                                </li>
                            {{--@else--}}
                                <li class="main-link hidden">
                                    <a href="#" data-post-id="{{ $post->id }}" class="notify-user unnotify">
                                        <i class="fa  fa-bell-slash" aria-hidden="true"></i>{{ trans('common.stop_notifications') }}
                                        <span class="small-text">{{ trans('messages.stop_notification_text') }}</span>
                                    </a>
                                </li>
                                <li class="main-link">
                                    <a href="#" data-post-id="{{ $post->id }}" class="notify-user notify">
                                        <i class="fa fa-bell" aria-hidden="true"></i>{{ trans('common.get_notifications') }}
                                        <span class="small-text">{{ trans('messages.get_notification_text') }}</span>
                                    </a>
                                </li>
                            {{--@endif--}}

                            @if(social()->user()->id == $post->user->id)
                                <li class="main-link">
                                    <a href="#" data-post-id="{{ $post->id }}" class="edit-post">
                                        <i class="fa fa-edit" aria-hidden="true"></i>{{ trans('common.edit') }}
                                        <span class="small-text">{{ trans('messages.edit_text') }}</span>
                                    </a>
                                </li>
                            @endif

                            @if((social()->user()->id == $post->user->id) ))
                                <li class="main-link">
                                    <a href="#" class="delete-post" data-post-id="{{ $post->id }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>{{ trans('common.delete') }}
                                        <span class="small-text">{{ trans('messages.delete_text') }}</span>
                                    </a>
                                </li>
                            @endif

                            @if(social()->user()->id != $post->user->id)
                                <li class="main-link">
                                    <a href="#" class="hide-post" data-post-id="{{ $post->id }}">
                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>{{ trans('common.hide_notifications') }}
                                        <span class="small-text">{{ trans('messages.hide_notification_text') }}</span>
                                    </a>
                                </li>

                                <li class="main-link">
                                    <a href="#" class="save-post" data-post-id="{{ $post->id }}">
                                        <i class="fa fa-save" aria-hidden="true"></i>
                                        {{--@if(!Auth::user()->postsSaved->contains($post->id))--}}
                                            {{ trans('common.save_post') }}
                                            <span class="small-text">{{ trans('messages.post_save_text') }}</span>
                                        {{--@else--}}
                                            {{ trans('common.unsave_post') }}
                                            <span class="small-text">{{ trans('messages.post_unsave_text') }}</span>
                                        {{--@endif--}}
                                    </a>
                                </li>

                                <li class="main-link">
                                    <a href="#" class="manage-report report" data-post-id="{{ $post->id }}">
                                        <i class="fa fa-flag" aria-hidden="true"></i>{{ trans('common.report') }}
                                        <span class="small-text">{{ trans('messages.report_text') }}</span>
                                    </a>
                                </li>
                            @endif
                            <li class="divider"></li>

                            <li class="main-link">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/share-post/'.$post->id)) }}" class="fb-xfbml-parse-ignore" target="_blank"><i class="fa fa-facebook-square"></i>Facebook {{ trans('common.share') }}</a>
                            </li>

                            <li class="main-link">
                                <a href="https://twitter.com/intent/tweet?text={{ url('/share-post/'.$post->id) }}"target="_blank"><i class="fa fa-twitter-square"></i>Twitter {{ trans('common.tweet') }}</a>
                            </li>

                            <li class="main-link">
                                <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-share-alt"></i>Embed {{ trans('common.post') }}</a>
                            </li>

                        </ul>

                    </li>

                </ul>
            </div>
            <div class="user-avatar">
                <a href="{{ url($post->user->display_name) }}"><img src="{{ $post->user->personal_image }}" alt="{{ $post->user->display_name }}" title="{{ $post->user->name }}"></a>
            </div>
            <div class="user-post-details">
                <ul class="list-unstyled no-margin">
                    <li>

                        @if(isset($sharedOwner))
                            <a href="{{ url($sharedOwner->user->username) }}" title="{{ '@'.$sharedOwner->user->username }}" data-toggle="tooltip" data-placement="top" class="user-name user">
                                {{ $sharedOwner->user->name }}
                            </a>
                            shared
                        @endif

                        <a href="{{ url($post->user->username) }}" title="{{ '@'.$post->user->username }}" data-toggle="tooltip" data-placement="top" class="user-name user">
                            {{ $post->user->name }}
                        </a>
                        @if($post->user->verified)
                            <span class="verified-badge bg-success">
                    <i class="fa fa-check"></i>
                </span>
                        @endif

                        @if(isset($sharedOwner))
                            's post
                        @endif

                        @if($post->users_tagged->count() > 0)
                            {{ trans('common.with') }}
                            <?php $post_tags = $post->users_tagged->pluck('name')->toArray(); ?>
                            <?php $post_tags_ids = $post->users_tagged->pluck('id')->toArray(); ?>
                            @foreach($post->users_tagged as $key => $user)
                                @if($key==1)
                                    {{ trans('common.and') }}
                                    @if(count($post_tags)==1)
                                        <a href="{{ url($user->username) }}"> {{ $user->name }}</a>
                                    @else
                                        <a href="#" data-toggle="tooltip" title="" data-placement="top" class="show-users-modal" data-html="true" data-heading="{{ trans('common.with_people') }}"  data-users="{{ implode(',', $post_tags_ids) }}" data-original-title="{{ implode('<br />', $post_tags) }}"> {{ count($post_tags).' '.trans('common.others') }}</a>
                                    @endif
                                    @break
                                @endif
                                @if($post_tags != null)
                                    <a href="{{ url($user->username) }}" class="user"> {{ array_shift($post_tags) }} </a>
                                @endif
                            @endforeach

                        @endif
                        <div class="small-text">
                            @if(isset($timeline))
                                @if($timeline->type != 'event' && $timeline->type != 'page' && $timeline->type != 'group')
                                    @if($post->timeline->type == 'page' || $post->timeline->type == 'group' || $post->timeline->type == 'event')
                                        (posted on
                                        <a href="{{ url($post->timeline->username) }}">{{ $post->timeline->name }}</a>
                                        {{ $post->timeline->type }})
                                    @endif
                                @endif
                            @endif
                        </div>
                    </li>
                    <li>
                        @if(isset($sharedOwner))
                            <time class="post-time timeago" datetime="{{ $sharedOwner->created_at }}+00:00" title="{{ $sharedOwner->created_at }}+00:00">
                                {{ $sharedOwner->created_at }}+00:00
                            </time>
                        @else

                            <time class="post-time timeago" datetime="{{ $post->created_at }}+00:00" title="{{ $post->created_at }}+00:00">
                                {{ $post->created_at }}+00:00
                            </time>
                        @endif


                        @if($post->location != NULL && !isset($sharedOwner))
                            {{ trans('common.at') }} <span class="post-place">
              <a target="_blank" href="{{ url('/get-location/'.$post->location) }}">
                <i class="fa fa-map-marker"></i> {{ $post->location }}
              </a>
              </span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="text-wrapper">
            <?php
            $links = preg_match_all("/(?i)\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/", $post->description, $matches);

            $main_description = $post->description;
            ?>
            @foreach($matches[0] as $link)
                <?php $linkPreview = new LinkPreview($link);
                $parsed = $linkPreview->getParsed();
                foreach ($parsed as $parserName => $main_link) {
                    $data = '<div class="row link-preview">
                              <div class="col-md-3">
                                <a target="_blank" href="'.$link.'"><img src="'.$main_link->getImage().'"></a>
                              </div>
                              <div class="col-md-9">
                                <a target="_blank" href="'.$link.'">'.$main_link->getTitle().'</a><br>'.substr($main_link->getDescription(), 0, 500). '...'.'
                              </div>
                            </div>';
                }
                $main_description = str_replace($link, $data, $main_description); ?>
            @endforeach

            <p class="post-description">
                {!! clean($main_description) !!}
            </p>

            <div class="post-image-holder  @if(count($post->images()->get()) == 1) single-image @endif">
                @foreach($post->images()->get() as $postImage)
                    @if($postImage->type=='image')
                        <a href="{{ url('user/gallery/'.$postImage->source) }}" data-lightbox="imageGallery.{{ $post->id }}" ><img src="{{ url('user/gallery/'.$postImage->source) }}"  title="{{ $post->user->name }}" alt="{{ $post->user->name }}"></a>
                    @endif
                @endforeach
            </div>

            <div class="post-v-holder">
                @foreach($post->images()->get() as $postImage)
                    @if($postImage->type=='video')
                        <video width="100%" preload="none" height="auto" poster="{{ url('user/gallery/video/'.$postImage->title) }}.jpg" controls class="video-video-playe">
                            <source src="{{ url('user/gallery/video/'.$postImage->source) }}" type="video/mp4">
                            <!-- Captions are optional -->
                        </video>
                    @endif
                @endforeach
            </div>
        </div>
        @if($post->youtube_video_id)
            <iframe  src="https://www.youtube.com/embed/{{ $post->youtube_video_id }}" frameborder="0" allowfullscreen></iframe>
        @endif
        @if($post->soundcloud_id)
            <div class="soundcloud-wrapper">
                <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{ $post->soundcloud_id }}&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
            </div>
        @endif
        <ul class="actions-count list-inline">

            @if($post->users_liked()->count() > 0)
                <?php
                $liked_ids = $post->users_liked->pluck('id')->toArray();
                $liked_names = $post->users_liked->pluck('name')->toArray();
                ?>
                <li>
                    <a href="#" class="show-users-modal" data-html="true" data-heading="{{ trans('common.likes') }}"  data-users="{{ implode(',', $liked_ids) }}" data-original-title="{{ implode('<br />', $liked_names) }}"><span class="count-circle"><i class="fa fa-thumbs-up"></i></span> {{ $post->users_liked->count() }} {{ trans('common.likes') }}</a>
                </li>
            @endif

            @if($post->comments->count() > 0)
                <li>
                    <a href="#" class="show-all-comments"><span class="count-circle"><i class="fa fa-comment"></i></span>{{ $post->comments->count() }} {{ trans('common.comments') }}</a>
                </li>
            @endif

            @if($post->shares->count() > 0)
                <?php
                $shared_ids = $post->shares->pluck('id')->toArray();
                $shared_names = $post->shares->pluck('name')->toArray(); ?>
                <li>
                    <a href="#" class="show-users-modal" data-html="true" data-heading="{{ trans('common.shares') }}"  data-users="{{ implode(',', $shared_ids) }}" data-original-title="{{ implode('<br />', $shared_names) }}"><span class="count-circle"><i class="fa fa-share"></i></span> {{ $post->shares->count() }} {{ trans('common.shares') }}</a>
                </li>
            @endif


        </ul>
    </div>

    <?php
    $display_comment ="";
    $user_follower = $post->chkUserFollower(Auth::user()->id,$post->user_id);
    $user_setting = $post->chkUserSettings($post->user_id);

    if($user_follower != NULL)
    {
        if($user_follower == "only_follow") {
            $display_comment = "only_follow";
        }elseif ($user_follower == "everyone") {
            $display_comment = "everyone";
        }
    }
    else{
        if($user_setting){
            if($user_setting == "everyone"){
                $display_comment = "everyone";
            }
        }
    }

    ?>

    <div class="panel-footer socialite">
        <ul class="list-inline footer-list">
            @if(!$post->users_liked->contains(Auth::user()->id))

                <li><a href="#" class="like-post like-{{ $post->id }}" data-post-id="{{ $post->id }}"><i class="fa fa-thumbs-o-up"></i>{{ trans('common.like') }}</a></li>

                <li class="hidden"><a href="#" class="like-post unlike-{{ $post->id }}" data-post-id="{{ $post->id }}"><i class="fa fa-thumbs-o-down"></i></i>{{ trans('common.unlike') }}</a></li>
            @else
                <li class="hidden"><a href="#" class="like-post like-{{ $post->id }}" data-post-id="{{ $post->id }}"><i class="fa fa-thumbs-o-up"></i>{{ trans('common.like') }}</a></li>
                <li><a href="#" class="like-post unlike-{{ $post->id }}" data-post-id="{{ $post->id }}"><i class="fa fa-thumbs-o-down"></i></i>{{ trans('common.unlike') }}</a></li>
            @endif
            <li><a href="#" class="show-comments"><i class="fa fa-comment-o"></i>{{ trans('common.comment') }}</a></li>

            @if(Auth::user()->id != $post->user_id)
                @if(!$post->users_shared->contains(Auth::user()->id))
                    <li><a href="#" class="share-post share" data-post-id="{{ $post->id }}"><i class="fa fa-share-square-o"></i>{{ trans('common.share') }}</a></li>
                    <li class="hidden"><a href="#" class="share-post shared" data-post-id="{{ $post->id }}"><i class="fa fa fa-share-square-o"></i>{{ trans('common.unshare') }}</a></li>
                @else
                    <li class="hidden"><a href="#" class="share-post share" data-post-id="{{ $post->id }}"><i class="fa fa-share-square-o"></i>{{ trans('common.share') }}</a></li>
                    <li><a href="#" class="share-post shared" data-post-id="{{ $post->id }}"><i class="fa fa fa-share-square-o"></i>{{ trans('common.unshare') }}</a></li>
                @endif
            @endif

        </ul>
    </div>

    @if($post->comments->count() > 0 || $post->user_id == Auth::user()->id || $display_comment == "everyone")
        <div class="comments-section all_comments" style="display:none">
            <div class="comments-wrapper">
                <div class="to-comment">  <!-- to-comment -->
                    @if($display_comment == "only_follow" || $display_comment == "everyone" || $user_setting == "everyone" || $post->user_id == Auth::user()->id)
                        <div class="commenter-avatar">
                            <a href="#"><img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}"></a>
                        </div>
                        <div class="comment-textfield">
                            <form action="#" class="comment-form" method="post" files="true" enctype="multipart/form-data" id="comment-form">
                                <div class="comment-holder">{{-- commentholder --}}
                                    <input class="form-control post-comment" autocomplete="off" data-post-id="{{ $post->id }}" name="post_comment" placeholder="{{ trans('messages.comment_placeholder') }}" >

                                    <input type="file" class="comment-images-upload hidden" accept="image/jpeg,image/png,image/gif" name="comment_images_upload">
                                    <ul class="list-inline meme-reply hidden">
                                        <li><a href="#" id="imageComment"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
                                        {{-- <li><a href="#"><i class="fa fa-smile-o" aria-hidden="true"></i></a></li> --}}
                                    </ul>
                                </div>
                                <div id="comment-image-holder"></div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    @endif
                </div><!-- to-comment -->

                <div class="comments post-comments-list"> <!-- comments/main-comment  -->
                    @if($post->comments->count() > 0)
                        @foreach($post->comments as $comment)
                            {!! Theme::partial('comment',compact('comment','post')) !!}
                        @endforeach
                    @endif
                </div><!-- comments/main-comment  -->
            </div>
        </div><!-- /comments-section -->
    @endif
</div>



<!-- Modal Ends here -->
@if(isset($next_page_url))
    <a class="jscroll-next hidden" href="{{ $next_page_url }}">{{ trans('messages.get_more_posts') }}</a>
@endif

{!! Theme::asset()->container('footer')->usePath()->add('lightbox', 'js/lightbox.min.js') !!}
<div id="myModal" class="modal fade" role="dialog" tabindex='-1'>
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">{{ trans('common.copy_embed_post') }}</h3>
                </div>
                <textarea class="form-control" rows="3">
          <iframe src="{{ url('/share-post/'.$post->id) }}" width="600px" height="420px" frameborder="0"></iframe>
          </textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('common.close') }}</button>
            </div>
        </div>

    </div>
</div>


@endforeach
<script type="text/javascript">
    function share(){
        FB.ui(
            {
                method: 'feed',
                name: 'Put name',
                link: 'put link',
                picture: 'image url',
                description: 'descrition'
            },
            function(response) {
                if (response) {
                    alert ('success');
                } else {
                    alert ('Failed');
                }
            }
        );
    }
</script>
<style>
    .link-preview
    {
        border: 1px solid #EEE;
        margin: 7px 0px;
        padding: 5px;
    }
    .link-preview img
    {
        width: 100%;
        height: auto;
    }
</style>
