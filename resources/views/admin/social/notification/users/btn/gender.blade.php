
@if(App\UserAccount::find($id)->userAccountable->gender =='male')
ذكر
    @else

انثى
@endif

