
@if($useraccountable_type == 'App\Student')

  {{get_dep(App\UserAccount::find($id)->userAccountable->department_id) }}

@elseif($useraccountable_type == 'App\Teacher')

   @if(App\UserAccount::find($id)->userAccountable->type =='doctor')

       دكتور
       @else
       استاذ
       @endif

@endif