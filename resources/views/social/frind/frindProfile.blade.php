<input type="hidden" id="hasPosts" class="hasPosts"/>
<input type="hidden" id="typePosts" name="typePosts" value="personalPage"/>
<input type="hidden" id="userProfileId" name="userProfileId" value="{{$userProfileId}}"/>
@extends('social.layouts.frindLayout')

@section('content')
    <?php $group_id = 0 ?>

    @include('social.includes.allPosts')

@endsection

@section('footer')

    <script>


    </script>

@endsection

