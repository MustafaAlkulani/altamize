@if($useraccountable_type == 'App\Student')
  {{get_dep(App\UserAccount::find($id)->userAccountable->department_id) }}
@else
   @if(App\UserAccount::find($id)->userAccountable->type =='doctor')
       دكتور
       @else
       استاذ
       @endif

@endif