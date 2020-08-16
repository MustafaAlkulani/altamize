@if($isBlocked == 1)
    <a href="{{asurl('/group/'.$group_id.'/user/'.$user_id.'/isBlocked')}}" class="btn btn-primary"> <i class="fa fa-hand-stop-o"></i> </a>

@else
    <a href="{{asurl('/group/'.$group_id.'/user/'.$user_id.'/isBlocked')}}" class="btn btn-success"> <i class="fa fa-eye"></i> </a>

@endif