<?php

Route::group(['middleware'=>'Maintenance'],function (){

});

Route::group(['prefix'=>'social','namespace'=>'Social'],function () {

    /////////////////////////Register and login /////////////////////////




    Route::post('login','RigisterAndLoginController@login_set')->name('login');
    Route::get('login', function () {

        return view('social.login');
    })->name('login');

    Route::post('register1','RigisterAndLoginController@step1');
    Route::get('register2','RigisterAndLoginController@step2');
    Route::post('register2','RigisterAndLoginController@step2');

    Route::any('logout','RigisterAndLoginController@logout');


///////////////////////////Register and login /////////////////////////





    Route::group(['middleware'=>'social'],function (){
        Config::set('auth.defines','social');



        /************************  start group memberts  *******************////////////

        Route::post('groupFile','GroupsControlller@storeFiles');
        Route::get('allGroupFile','GroupsControlller@index')->name('course.allReferences');

        Route::post('updaterGroupFile/{id}','GroupsControlller@update');
        Route::get('groupMembers/{id}','GroupsControlller@groupMembers');
        Route::get('searchGeoupMember','GroupsControlller@searchGeoupMember');


        Route::get('loadMoreSearchMemberResult','GroupsControlller@loadMoreSearchMemberResult');
        Route::get('blockGroupMember','GroupsControlller@blockGroupMember');
        Route::get('removeGroupMember','GroupsControlller@removeGroupMember');
        Route::get('AddGroupMember','GroupsControlller@AddGroupMember');




        /**************************  end group memberts *****************////////////


        Route::get('lang/{lang}',function (){
            $lang=request('lang');
            session()->has('lang')?session()->forget('lang'):'';
            $lang == 'ar'? session()->put('lang','ar'):session()->put('lang','en');

            return back();
        });


        /***********************all users********************////////////

        Route::get('reference/{department_name}/{level}/{symster}','GroupsControlller@getReference')->name('course.allReferences');
        Route::get('search','FllowingUsers@search');

        Route::get('loadMoreSearchResult','FllowingUsers@loadMoreSearchResult');

        Route::get('about/{id}','PostController@about');

        Route::get('getPhotos/{id}','PostController@getPhotos');

        Route::post('loadMorePost','PostController@loadMorePost');
        Route::post('loadMoreReplayComment','PostController@loadMoreReplayComment');
        Route::post('loadMoreComment','PostController@loadMoreComment');

        Route::get('LoadMorephotos','DeleteController@LoadMorephotos');



        /*************************** end  all users*****************/////






        /*********************** start under testing*******************////////////
        Route::get('ccc/{id}','PostController@ccc');
        Route::get('fileNotify/{id}','AccountSetting@downloadnotify');
        Route::get('coursesSchedule', function () {

            return view('social.personalPages.coursesSchedule')
                ->with('active','coursesSchedule')
                ->with('myCources',myCources())
                ->with('departments', getAlldepartments());
        })->name('personalPages.coursesSchedule');


        Route::get('allnotification', function () {


            return view('social.personalPages.allnotification')
                ->with('active','notifications')
                ->with('myCources',myCources())
                ->with('Cource_id',0)
                ->with('groups',getAllGroups())
                ->with('departments', getAlldepartments());

        })->name('personalPages.allnotification');

        Route::get('notifications', function () {

            return view('social.personalPages.notifications')
                ->with('active','notifications')
                ->with('myCources',myCources())
                ->with('departments', getAlldepartments());
        })->name('personalPages.notifications');





        Route::get('result', function () {

            return view('social.personalPages.result')
                ->with('active','result')
                ->with('myCources',myCources())
                ->with('departments', getAlldepartments());
        })->name('personalPages.result');




        /*************************** end under testing****************/////
        ///
        ///

        /*********************** start massanger*******************////////////

        Route::get('blockUser','massangerController@blockUser');
        Route::get('deleteMessage/{id}','massangerController@deleteMessage');


        Route::get('deleteAllMessages','massangerController@deleteAllMessages');

        Route::get('makeMassageAsReaded','massangerController@makeMassageAsReaded');
        Route::get('get_usrs_ids','massangerController@get_usrs_ids');





        /*************************** end massanger****************/////


//        Route::get('reference/{department_name}/{level}/{symster}','GroupsControlller@getReference')->name('course.allReferences');


//    if(\Illuminate\Support\Facades\Gate::allows('showData',social()->user()))
//    {
//        Route::get('downloadGroupFile/{id}','GroupsControlller@download');
//    }
//    else
//    {
//        return " you can not download  this file";
//    }

//    Route::get('downloadGroupFile/{id}','GroupsControlller@download');



        //////////////////////block//////////////////////
///


//////////////////////Deleted//////////////////////
///

        Route::get('delete/{type}/{id}','DeleteController@deletebook');
        Route::get('deletePost/{id}','DeleteController@deletePost');
        Route::get('deleteComment/{type}/{id}','DeleteController@deleteComment');
        Route::get('deleteReplyComment/{type}/{id}','DeleteController@deleteReplyComment');
        Route::post('deleteImage','DeleteController@deleteImage');

//////////////////////Update//////////////////////
        Route::get('editComment/{type}/{id}','DeleteController@editComment');
        Route::get('editReplayComment/{type}/{id}','DeleteController@editReplayComment');
        Route::get('editBook/{type}/{id}','DeleteController@editBook');


/// //////////////////////postprofile//////////////////////
        Route::get('/','PostController@newNews');
        Route::post('postprofile','PostController@store');
        Route::get('newNews','PostController@newNews')->name('newNews');

        Route::get('commentpost/{id}','PostController@index');

/////////////likepost/////////

        Route::post('replycommpostpro/{id}','PostController@newReplayComment');///


        Route::post('commentpostpro/{id}','PostController@newComment');///


        //   Route::get('commentpostpro/{id}','CommentPostController@index');

        Route::get('postprofile','PostController@index');
        Route::get('myCource/group/{id}','GroupsControlller@groupPosts');
        Route::get('myCource/files/{id}','GroupsControlller@files');



        Route::get('personalPage/{id}','PostController@index')->name('personalPage');
/////////////////Edit//////////////
        Route::get('editpostpro/{id}','PostController@edit')->name('edit');

        Route::post('editpostpro/{id}','PostController@update');

        Route::get('likePostProfile','PostController@like');


////////////reply////////////


////////////////////////////////////////////



////////////////////flowing////////////////////////////

        Route::get('following/{id}','FllowingUsers@allUsers')->name('personalPages.following');

        Route::get('followingUser','FllowingUsers@followUser')->name('personalPages.following.followUser');
        Route::get('UnfollowUser','FllowingUsers@UnfollowUser')->name('personalPages.following.UnfollowUser');
        Route::get('LoadMoreFllowUser','FllowingUsers@LoadMoreFllowUser');

////////
////////////////////////////////////////////



        Route::get('messenger','massangerController@massangerFrinds')->name('personalPages.messenger');
        Route::post('messenger/store','massangerController@store');
        Route::post('messenger/getOldMessage','massangerController@getOldMessage');
        Route::GET('messenger/getLastsMessage','massangerController@getLastsMessage');

        Route::get('showResult', 'AccountSetting@showResult');
        Route::get('assigment/{id}/{type}', 'AssignmentController@assign_notify');
        Route::get('messenger2/{id}','massangerController@massangerFrinds2')->name('personalPages.messenger2');
        Route::get('notifications', function () {

            return view('social.personalPages.notifications')
                ->with('active','notifications')
                ->with('myCources',myCources())
                ->with('Cource_id',0)
                ->with('departments', getAlldepartments())
                ->with('groups',getAllGroups());
        })->name('personalPages.notifications');

//        Route::get('group', function () {
//
//            return view('social.courses.group')
//                ->with('active','group')
///              ->with('myCources',myCources())
//              ->with('departments', getAlldepartments());
//        })->name('course.group');
  


        Route::any('ttt', function () {

            return view('test');

        })->name('ttt')->middleware('social:social');



//


////////////////////////////Setting /////////////////////////////

        Route::post('setting/changePassword','AccountSetting@changePassword');
        Route::post('changeCoverImage/{id}/{type}','AccountSetting@changeCoverImage')->name('changeCoverImage');

        Route::post('fileUpload/{id}','AccountSetting@fileUpload')->name('fileUpload');

        Route::get('setting','AccountSetting@index')->name('personalPages.setting');
        Route::post('setting/{id}','AccountSetting@edit')->name('personalPages.setting.edit');

        Route::post('setting2/{id}','AccountSetting@edit2');



        Route::get('setting/privacy','AccountSetting@privacy');






//////////////////////////// Assignment/////////////////////////////
///






        Route::post('myCource/AddStudentAssignmentAssignment/{id}','AssignmentController@AddStudentAssignmentAssignment');
        Route::get('myCource/StudentAssignmentAssignment/{id}','AssignmentController@StudentAssignmentAssignment');



        Route::get('myCource/assignment/{id}','AssignmentController@myCourceAssignment');
        Route::post('myCource/AddAssignment/{id}','AssignmentController@AddAssignment');

        Route::get('download/{id}/{counter}','AssignmentController@download');
        Route::get('downloadTeaherAssignment/{id}/{counter}','AssignmentController@downloadTeaherAssignment');

        Route::get('checkAssignment','AssignmentController@checkAssignment');

        Route::get('assignment','AssignmentController@getTeacherAssignment')->name('course.assignment');
        Route::post('addTeacherAssgignmet','AssignmentController@addTeacherAssgignmet');


        Route::get('studentAssignment', function () {

            return view('social.courses.studentAssignment')
                ->with('active','studentAssignment')
                ->with('myCources',myCources())
                ->with('departments', getAlldepartments());
        })->name('course.studentAssignment');



///////////////////////////References/////////////////////////////////////////
        Route::post('references','ReferenceController@store');
        Route::get('allReferences','ReferenceController@index')->name('course.allReferences');
        Route::get('reference/{department_name}/{level}/{symster}','ReferenceController@getReference')->name('course.allReferences');
        Route::get('downloadref/{id}','ReferenceController@download');


        Route::get('refer/{id}','ReferenceController@reference')->name('course.references');

        Route::post('updaterefrens/{id}','ReferenceController@update');

        Route::post('deleteref/{id}','ReferenceController@delete');




        Route::post('fileUpload/{id}','AccountSetting@fileUpload')->name('fileUpload');





/////////////////
///
        Route::get('test', function () {
            event(new App\Events\StatusLiked('Someone'));
            return "Event has been sent!";
        });////////////////



    });


});

