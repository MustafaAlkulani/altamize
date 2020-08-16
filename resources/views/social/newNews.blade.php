<input type="hidden" id="hasPosts" class="hasPosts"/>
<input type="hidden" id="typePosts" name="typePosts" value="newNews"/>
<input type="hidden" id="userProfileId" name="userProfileId" value="{{$userProfileId}}"/>
@extends('social.layouts.without')

@section('content')

    <?php $group_id = 0 ;
    $block= 0;?>
    @include('social.includes.allPosts')
@endsection

@section('footer')

    <script>


    </script>

@endsection

