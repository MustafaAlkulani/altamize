<li class="friend-info">

    <div class="comet-avatar">
        <img src="{{Storage::url($comm->user->personal_image)}}" alt="">
    </div>


    @if(social()->user()->id == $comm->user_id)
        <div class="more" style="float: right"><big><big>...</big></big>
            <ul class="more-dropdown">
                <li>

                    <a class="buttonUpdateComment" url="{{surl('editComment/Profile/'.$comm->id)}}"
                       comment-id="CommentText{{$comm->id}}" info="{{$comm->text}}">{{trans('social.Editcomment')}} <i class="fa fa-edit"
                                                                                                    aria-hidden="true"></i></a>
                </li>
                <li>
                    <a class="buttonDeleteReplyComment" url='{{surl("deleteComment/Profile/".$comm->id)}}'
                       message="do you want to delete this comment" type="Profile"
                       comment-id="CommentText{{$comm->id}}"> {{trans('social.Deletecomment')}}<i
                                class="fa fa-trash" aria-hidden="true"></i></a>
                </li>

            </ul>
        </div>
    @endif

    <div class="we-comment">
        <div class="coment-head">
            <h5><a href="{{surl('personalPage/'.$comm->user_id)}}" title="">{{$comm->user->display_name}}</a></h5>
            <span>{{ $comm->created_at}}</span>
            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
        </div>
        <p id="CommentText{{$comm->id}}">{{$comm->text}}</p>

        @if(!empty($comm->image))
            <img src="{{Storage::url($comm->image)}}" alt="">

        @endif
    </div>


    <!-- start post like button  -->
    <div class="we-video-info commentButtons">
        <ul class="row">


            <li class="col-xs-3">
                <span class="like" data-toggle="tooltip" title="{{trans('social.like')}}">
                    <a href="#" table_name="likePostProfile" likeType="comment"
                       uid="{{ social()->user()->id  }}"
                       post-id="{{$comm->id }}" class="UnactiveLike checkLike">
                        <i class="fa fa-thumbs-up
                           <?php $userss = $comm->users_liked()->find(social()->user()->id);?>
                        {{$userss['pivot']['type']}}
                        @if($comm->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="like")   activeLike @endif "></i>
                    </a>
                    <ins>
                        {{getLikeCount($comm,'like')}}
                        {{--{{$count_like}}--}}
                    </ins>
                </span>
            </li>


            <li class="col-xs-3">
                <span class="comment replyCommentsButton"
                      comment-id={{$comm->id}}
                              data-toggle="tooltip" title="{{trans('social.ReplyComments')}}"
                      id="replyCommentsButton">
                    <i class="fa fa-reply"></i>
                    <ins>{{$comm->user_comments_count}}</ins>


                </span>
            </li>


            <li class="col-xs-3">
                <span class="dislike" data-toggle="tooltip" title="{{trans('social.dislike')}}">
                    <a href="#" table_name="likePostProfile" likeType="comment"
                       uid="{{ social()->user()->id  }}"
                       post-id="{{$comm->id }}" class="UnactiveLike checkLike">
                        <i class="fa fa-thumbs-down  <?php $userss = $comm->users_liked()->find(social()->user()->id);?>
                        {{$userss['pivot']['type']}}
                        @if($comm->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="dislike")  activeLike @endif"></i>
                    </a>
                    <ins>
                        {{getLikeCount($comm,'dislike')}}
                        {{--{{$count_dislike}}--}}
                    </ins>
                </span>
            </li>


        </ul>
    </div>
    <!-- end post like button  -->

    <!--  end  original comment   -->
    <div id="post-comment" class="replyPostComment">

        <?php

        $CommentUrl = surl('replycommpostpro/' . $comm->id);
        $commentType = "ProfileReplayComment";
        ?>
        <ul class="replyPostComment" id="ReplayComment{{$comm->id}}">
            @include('social.includes.newReplayComment')
        </ul>

    </div>
</li>