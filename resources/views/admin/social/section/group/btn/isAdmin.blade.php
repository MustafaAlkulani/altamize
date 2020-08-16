@if($isAdmin == 1)
    <a href="{{asurl('/group/'.$group_id.'/user/'.$user_id.'/isAdmin')}}" class="btn btn-success"> <i class="fa fa-user-secret"></i> </a>

    @else
    <a href="{{asurl('/group/'.$group_id.'/user/'.$user_id.'/isAdmin')}}" class="btn btn-primary"> <i class="fa fa-close"></i> </a>

    @endif