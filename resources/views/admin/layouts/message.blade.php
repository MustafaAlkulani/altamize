@if(count($errors->all()) >0 )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
        </ul>
    </div>
    @endif




@if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        {{session('error')}}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        {{session('success')}}
    </div>
@endif