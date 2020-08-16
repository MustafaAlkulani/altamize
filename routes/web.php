<?php

Route::group(['middleware'=>'Maintenance'],function (){

});



Route::get('/home',"HomeController@viewslider");

Route::get('/',"HomeController@viewslider");

Route::get('/student',function (){
    return view('style.student');
});

Route::get('/newstype/{type}',"HomeController@viewslider");
Route::get('/news',"HomeController@viewallnews");

Route::get('/moreDetials/{id}',"HomeController@showmoredetials");
Route::get('/department/{id}',"HomeController@showdepartment");

Route::get('/department{id}',function (){
    return view('style.department');
});




//Route::get('/resultsearch',function (){
//    $news=App\News::where('title','like','%'.request('search').'%')->get();
//    $event=App\Event::where('context','like','%'.request('search').'%')->get();
//    $department=App\Department::where('name','like','%'.request('search').'%')->get();
//    $advertising=App\Advertising::where('text','like','%'.request('search').'%')->get();
//  // dd($news);
//  // dd($advertising);
//    if($news)
//    {
//        return view('style.resultsearch')
//            ->with('news',$news);
//    } elseif ($event)
//    {
//        return view('style.resultsearch')
//            ->with('event',$event);
//    }elseif ($advertising)
//    {
//        return view('style.resultsearch')
//            ->with('advertise',$advertising);
//    }else
//    {
//        return view('style.resultsearch');
//    }
//
//
//
//});


Route::get('/reusltnews',function (){

    $q=request('q');


    if($q!=" ")
    {

        $department=\App\Department::where('vision','like','%'.$q.'%')
            ->orwhere('message','like','%'.$q.'%')
            ->orwhere('fees','like','%'.$q.'%')->get();

        $news=App\News::where('title','like','%'.$q.'%')
            ->orwhere('detail','like','%'.$q.'%')->get();



        $maininfo=\App\MainInfo::where('slug','like','%'.$q.'%')
            ->orwhere('value','like','%'.$q.'%')->get();



        return view('style.result.reusltnews')
            ->with('news',$news)
            ->with('mainInfo',$maininfo)
            ->with('departments',$department)->withQuery($q);





    }
    else
        return view('style.result.reusltnews')
            ->withMessage('not found');






});









Route::get('/contactUs',"HomeController@addcontact");
Route::post('/contactUs',"HomeController@addcontact");
Route::get('/contactUs',function (){
    return view('style.contactUs');
});

Route::get('/aboutUniversity',function (){
    return view('style.aboutUniversity');
});
Route::get('/accept',function (){
    return view('style.accept');
});

Route::get('maintenance',function (){
    if(setting()->status == 'open'){
        return url('/');
    }else {
        return view('style.maintenance');
    }


});


