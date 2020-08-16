<?php
$deletePostUrl = surl("deletePost/Profile/" . $post->id);



?>

<div class="central-meta item">
    <div class="user-post">
        <div class="friend-info ">

            <!-- start post options  -->

            @if(social()->user()->id == $post->user->id or ( isGroupAdmin(social()->user()->id, $post->group_id)==1 And $post->group_id!=0) )
                <div class="more"><big><big>...</big></big>
                    <ul class="more-dropdown">
                        <li>
                            <a class="buttonDeletePost" url='{{$deletePostUrl}}'
                               message="do you want to delete this post" type="Profile" post-id="{{$post->id}}">{{trans('social.DeletePost')}}<i
                                        class="fa fa-trash" aria-hidden="true"></i></a>
                        </li>


                        @if(social()->user()->id == $post->user->id )
                            <li>
                                {{--<a href="{{surl('editpostgroup/'.$post->id)}}">Edit Post</a>--}}
                                <a post-id="{{$post->id}}" id="{{$post->id}}" class="buttonD">{{trans('social.EditPost')}} </a>
                            </li>

                            {{--<li>--}}
                                {{--<a href="#">{{trans('social.TurnOffNotifications')}}</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">{{trans('social.SelectasFeatured')}}</a>--}}
                            {{--</li>--}}
                        @endif


                    </ul>
                </div>
        @endif
        <!-- end post options  -->

            <!-- start post auther info  -->
            <figure>
                <img src="{{Storage::url($post->user->personal_image)}}" alt="">

            </figure>
            <div class="friend-name">
                <ins><a href="{{surl('personalPage/'.$post->user_id)}}"
                        title="">@if($post->group_id!=0) <?php  $groupName = \App\Group::where('id', $post->group_id)->first(['name']);
                        echo $groupName['name'] ?> > @endif {{$post->user->display_name}} </a></ins>
                <span>published: {{$post->created_at->diffForHumans()}}</span>

            </div>

            <!-- end post auther info  -->

            <!-- start post content  -->
            <div class="description">

                <p>
                    {!! $post->text !!}
                </p>
            </div>
            <!-- end post content  -->


            <div class="post-meta">

                <ul class="photos">

                    @foreach( $post->images as $postimg)

                        <li>
                            <a class="strip" href="{{Storage::url($postimg->image)}}" title=""
                               data-strip-group="mygroup" data-strip-group-options="loop: false">
                                <img path={{$postimg->image}} id="{{$postimg->id}}"
                                     src="{{Storage::url($postimg->image)}}" alt=""></a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- start post like button  -->
            <div class="we-video-info postButtns">
                <ul class="row">


                    <li class="col-xs-4">
            <span class="like" data-toggle="tooltip" title="{{trans('social.like')}}">
                <a href="#" table_name="likePostProfile" likeType="post"
                   uid="{{ social()->user()->id  }}"
                   post-id="{{$post->id }}" class=" UnactiveLike checkLike">
                    <i class="fa fa-thumbs-up
                       <?php $userss = $post->users_liked()->find(social()->user()->id);?>
                    {{$userss['pivot']['type']}}
                    @if($post->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="like")   activeLike @endif "></i>
                </a>
                <ins> {{getLikeCount($post,'like')}} </ins>
            </span>
                    </li>


                    <li class="col-xs-4">
            <span class="comment comments-button "
                  data-toggle="tooltip"
                  post-id={{$post->id}}
                          title="{{trans('social.Comments')}}" id="comments-button">
            <!-- <a href= "{{surl('commentpost/')}}" > -->
                <i class="fa fa-comments-o"></i>
                <!-- </a> -->
                <ins>{{$post->user_comments_count}}</ins>
            </span>
                    </li>

                    <li class="col-xs-4">
            <span class="dislike" data-toggle="tooltip" title="{{trans('social.dislike')}}">
                <a href="#" table_name="likePostProfile" likeType="post"
                   uid="{{ social()->user()->id  }}"
                   post-id="{{$post->id }}" class=" UnactiveLike checkLike">
                    <i class=" fa fa-thumbs-down  <?php $userss = $post->users_liked()->find(social()->user()->id);?>
                    {{$userss['pivot']['type']}}
                    @if($post->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="dislike")  activeLike @endif"></i>
                </a>
                <ins> {{getLikeCount($post,'dislike')}}   </ins>
            </span>
                    </li>


                    {{--   <li class="col-xs-3">
                                <span class="share" data-toggle="tooltip" title="{{trans('social.share')}}">
                                    <i class="fa fa-share-alt"></i>
                                    <ins>200</ins>
                                </span>
                    </li>--}}

                </ul>
            </div>
            <!-- end post like button  -->

        </div>


        <!-- start comment -->

        <div style="display: none;" id="post-comment" class="coment-area">
            <ul class="we-comet" id="CommentList{{$post->id}}">
                <!--  start comment with reply  -->


            <?php
            $commentCount = $post->userComments_count;
            ?>

            <?php
            $CommentUrl = surl('commentpostpro/' . $post->id);
            $commentType = "ProfileComment";
            ?>

            @include('social.includes.newReplayComment')
            <!-- end  new comment -->

            </ul>
        </div>
        <!-- end comment -->


    </div>

</div>



