@if(App\UserAccount::find($id)->userAccountable->ginder =='male')
ذكر
    @else

انثى
@endif