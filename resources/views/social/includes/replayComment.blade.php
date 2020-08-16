<li class="friend-info">

    <!-- start post options  -->
    @if(social()->user()->id == $replayComment->user_id)
        <div class="more"><big><big>...</big></big>
            <ul class="more-dropdown">
                <li>

                    <a class="buttonUpdateReplayComment" url="{{surl('editReplayComment/Profile/'.$replayComment->id)}}"
                       comment-id="ReplayCommentText{{$replayComment->id}}" info="{{$replayComment->text}}">Edit comment
                        <i class="fa fa-edit" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a class="buttonDeleteReplyComment" url='{{surl("deleteReplyComment/Profile/".$replayComment->id)}}'
                       message="do you want to delete this replay comment" type="Profile"
                       replay-id="{{$replayComment->id}}">Delete replay comment <i
                                class="fa fa-trash" aria-hidden="true"></i></a>
                </li>

            </ul>
        </div>
@endif
<!-- end post options  -->

    <div class="comet-avatar">
        <img src="{{Storage::url(social()->user()->personal_image)}}" alt="">
    </div>
    <div class="we-comment">
        <div class="coment-head">
            <h5><a href="{{surl('personalPage/'.$replayComment->user_id)}}"
                   title="">{{$replayComment->user->display_name}}</a></h5>
            <span>{{$replayComment->created_at->diffForHumans()}}</span>
            <a class="we-reply" href="#" title="Reply"><i
                        class="fa fa-reply"></i></a>
        </div>
        <p id="ReplayCommentText{{$replayComment->id}}">  {{$replayComment->text }} </p>
        <img src="{{Storage::url($replayComment->image)}}" alt="">
    </div>
</li>