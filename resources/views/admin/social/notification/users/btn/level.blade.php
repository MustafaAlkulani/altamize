
@if($useraccountable_type == 'App\Student')
    {{App\UserAccount::find($id)->userAccountable->level}}
@else
 --

@endif

