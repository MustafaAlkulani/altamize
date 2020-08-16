<input type="hidden" id="hasPosts" class="hasPosts"/>
<input type="hidden" id="typePosts" name="typePosts" value="group"/>
<input type="hidden" id="userProfileId" name="userProfileId" value="{{$userProfileId}}"/>
@extends('social.layouts.course')

@section('content')


    <?php $group_id = $groupInfo->id;
    $block= isGroupMemberBlocked(social()->user()->id,$groupInfo->id);
    ?>

    @include('social.includes.allPosts')
@endsection

@section('footer')

    <script>


    </script>

@endsection

