@if($status == 0)
    @if($stape == 1 )
<a href="{{asurl('/upgrade/stape1/'.$id)}}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
@elseif($stape == 2)
        <a href="{{asurl('/upgrade/stape2/'.$id)}}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
        @endif
    <a href="{{asurl('/upgrade/'.$id.'/delete')}}" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
    @else
    <a href="{{asurl('/upgrade/'.$id.'/delete')}}" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>

@endif