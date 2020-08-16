<?php


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Config::set('auth.defines', 'Admin');

    Route::get('login', 'AdminAuth@login');
    Route::post('login', 'AdminAuth@dologin');
    Route::get('forgot/password', 'AdminAuth@forgot_password');
    Route::post('forgot/password', 'AdminAuth@forgot_password_post');
    Route::get('reset/password/{token}', 'AdminAuth@reset_password');
    Route::post('reset/password/{token}', 'AdminAuth@reset_password_final');

    Route::group(['middleware' => 'Admin:admin'], function () {


        Route::get('home', function () {
            $title = 'الرئيسية';
            return view('admin.home', compact('title'));
        });
        Route::get('/', function () {

            $title = 'الرئيسية';
            return view('admin.home', compact('title'));
        });


        Route::group(['middleware' => 'perm_un'], function () {

            Route::resource('student', 'StudentController');
            Route::delete('student/destroy/all', 'StudentController@multe_delete');

            Route::resource('teacher', 'TeacherController');
            Route::delete('teacher/destroy/all', 'TeacherController@multe_delete');
            ;
            Route::post('teacher/{id}/changeCourse', 'TeacherController@changeCourse');
            Route::resource('department', 'DepartmentController');
            Route::delete('department/destroy/all', 'DepartmentController@multe_delete');
            Route::get('department/{id}/destroy', 'DepartmentController@destroy');

            Route::resource('department/{dep_id}/study', 'StudyPlanController');
            Route::get('department/{dep_id}/study/{id}/destroy', 'StudyPlanController@destroy');
            Route::delete('department/{dep_id}/study/all', 'StudyPlanController@multe_delete');

            Route::get('editMainInfo/{name}', 'SettingController@setting');
            Route::post('editMainInfo', 'SettingController@setting_save');
        });

        Route::group(['middleware'=>['perm_admin']], function () {
            Route::resource('admin', 'AdminController');
            Route::delete('admin/destroy/all', 'AdminController@multe_delete');

        });


        Route::group(['prefix' => 'sit', 'middleware' => ['perm_sit']], function () {
            Route::get('home', function () {
                $title = 'الرئيسية-التعريفي ';
                return view('admin..sit.home', compact('title'));
            });

            Route::post('contact/raplay/{id}', 'ContactUsController@raplay');
            Route::resource('contact', 'ContactUsController');


            Route::resource('postNews', 'PostNewsController');
            Route::get('postNews/{id}/destroy', 'PostNewsController@destroy');


            Route::get('mainInfo', function () {
                $title = 'بيانات الموقع الاساسية';
                return view('admin.sit.mainInfo', compact('title'));
            });


            Route::get('slider/{id}/destroy', 'SliderController@destroy');
            Route::resource('slider', 'SliderController');

            Route::get('advertising/{id}/destroy', 'AdvertisingController@destroy');
            Route::resource('advertising', 'AdvertisingController');

            Route::get('event/{id}/destroy', 'EventController@destroy');
            Route::resource('event', 'EventController');

        });


////////////////////////////////////////////////////////////////////////////////////////
        Route::group(['prefix' => 'social', 'middleware' => ['perm_social']], function () {
            Route::get('home', function () {

                $title = 'الرئيسية-التواصل ';
                return view('admin..social.home', compact('title'));
            });


            Route::post('/count/countfetch', 'SocailDepartmentController@countfetch')->name('count.countfetch');

            Route::get('/depart/{id}', 'SocailDepartmentController@subDepart');
            Route::get('/depart', 'SocailDepartmentController@index');
            Route::get('/depart/{id}/level/{level}', 'SocailDepartmentController@Infolevel');


            Route::get('/courses', 'SocailDepartmentController@courseAll');
            Route::get('/groups', 'SocailDepartmentController@groupsAll');

            Route::get('{group_id}/group', 'SocailDepartmentController@InfoGroup');
            Route::get('group/{id}/create', 'SocailDepartmentController@groupCreate');
            Route::post('group/{id}/add', 'SocailDepartmentController@groupAdd');
            Route::get('group/{id}/addusers', 'SocailDepartmentController@groupAddUsers');
            Route::post('group/{id}/addusers', 'SocailDepartmentController@groupAddUsersPost');
            Route::get('{group_id}/group/{member_id}/deleteMember', 'SocailDepartmentController@deleteMember');
            Route::delete('group/{id}/destroy', 'SocailDepartmentController@deleteGroup');

            Route::get('group/{id}/deleteGroup', 'SocailDepartmentController@deleteGroup');
            Route::get('group/{group_id}/user/{user_id}/isBlocked', 'SocailDepartmentController@isBlockedGroup');
            Route::get('group/{group_id}/user/{user_id}/isAdmin', 'SocailDepartmentController@isAdminGroup');

            Route::get('{course_id}/course', 'SocailDepartmentController@InfoCourse');
            Route::get('courses/create', 'SocailDepartmentController@courseCreate');
            Route::post('/course/studyfetch', 'SocailDepartmentController@studyfetch')->name('course.studyfetch');
            Route::post('/course/add', 'SocailDepartmentController@courseAdd');
            Route::delete('course/{id}/delete', 'SocailDepartmentController@deleteCourse');
            Route::post('/course/{id}/editTeacher', 'SocailDepartmentController@editTeacher');

            Route::get('course/{id}/studyAdd', 'SocailDepartmentController@StudyCourseCreate');
            Route::post('course/{id}/studyAdd', 'SocailDepartmentController@StudyCourseCreateAdd');

            Route::get('user/{id}/deleteLevel', 'SocailDepartmentController@deleteUserLevel');


            Route::resource('users', 'UsersController');
            Route::get('users/{id}/show', 'UsersController@show');
            Route::delete('users/destroy/all', 'UsersController@multe_delete');
            Route::post('users/{id}/changePassword', 'UsersController@changePassword');

            Route::resource('notification', 'NotificationController');
            Route::delete('notification/destroy/all', 'NotificationController@multe_delete');
            Route::get('/notification/{id}/user/add/', 'NotificationController@addUsers');
            Route::post('/notification/{id}/user/add/', 'NotificationController@addUsersPost');


            Route::get('/upgrade/home', function (\Illuminate\Http\Request $request) {

                $title = 'اداره التحديثات  ';
                return view('admin.social.upgrade.index', compact('title'));
            });

            Route::get('/upgrade/incomplate', 'UpgradeController@upgradeIncomplate');
            Route::get('/upgrade/correct', 'UpgradeController@upgradeCorrect');

            Route::get('/upgrade/select', 'UpgradeController@selectget');
            Route::get('/upgrade/stape1/{stape}', 'UpgradeController@showStape');
            Route::get('/upgrade/stape2/{stape}', 'UpgradeController@showStape2');
            Route::post('/upgrade/stape3/{stape}/studentUp/', 'UpgradeController@updataStudentLevel');


            Route::post('/upgrade/{stape}/createcourses', 'UpgradeController@createCousers');

            Route::post('/upgrade/levelfetch', 'UpgradeController@levelsfetch')->name('department.levelsfetch');
            Route::post('/upgrade/showgroups', 'UpgradeController@showgroups')->name('upgrade.showgroups');




            Route::post('/upgrade/deletegroups', 'UpgradeController@deletegroups')->name('upgrade.deletegroups');
            Route::post('/upgrade/showCouselevel', 'UpgradeController@showCourselevel')->name('upgrade.showCourselevel');
            Route::get('/upgrade/{id}/delete', 'UpgradeController@upgradeDelete');

            Route::get('/upgrade/years', 'UpgradeController@years');


            Route::post('/upgrade/years/add', 'UpgradeController@yearAdd');

            Route::post('/upgrade/years/update', 'UpgradeController@yearUpdate');


        });
///////////////////////////////controle
        Route::group(['prefix' => 'control', 'middleware' => ['perm_control']], function () {
            Route::get('home', function () {

                $title = 'الكنترول  ';
                return view('admin..controle.home', compact('title'));
            });
            Route::get('addStudentResult/{type}', function ($type) {
                if($type=='add')
                    $title = 'اضافة النتيجة ';
                else
                    $title = 'تعديل النتيجة ';

                return view('admin.control.addStudentResult')
                    ->with('title',$title)
                    ->with('type',$type);

            });



            Route::post('/addResult/{type}', 'ControlController@store');


            Route::get('/viewResult', 'ControlController@index');


            Route::get('viewresultstudent', 'ControlController@showResult2');
            Route::get('editresult', function () {

                $title = 'تعديل النتيجة ';
                return view('admin.control.editStudentResult', compact('title'));

            });

            Route::post('/edit', 'ControlController@edit');

            Route::post('control.studentfetch', 'ControlController@studentfetch')->name('control.studentfetch');

            Route::post('control.coursefetch', 'ControlController@coursefetch')->name('control.coursefetch');
            Route::get('/viewerror', function () {


                return view('admin.control.viewerror')->name('admin.control.viewerror');

            });


            Route::get('/showResultCourse', 'ControlController@showResultCourse');
            Route::get('/showResult', 'ControlController@showResult');


            Route::post('control.getresult', 'ControlController@getResult')->name('control.getresult');


        });

        ///////////////////////////////////

        Route::any('logout', 'AdminAuth@logout');
        Route::post('acountSetting', 'AdminController@acountSetting');
          Route::get('acountSetting',
              function () {
     $admin=admin()->user();

                  $title = 'تعديل اعدادات الحساب';
                  return view('admin.admins.acountSetting', compact('title','admin'));
              }

              );
        Route::get('lang/{lang}', function () {
            $lang = request('lang');
            session()->has('lang') ? session()->forget('lang') : '';
            $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
            return back();
        });

    });

});


Route::get('/instail',function (){
    $data=[
        [   'slug' => 'اسم الموقع','name' => 'sit_name','value' => ' ','type' => '1'],
        [ 'slug' => 'شعار الموقع ','name' => 'logo','value' => ' ','type' => '3'],
        [ 'slug' => 'رقم الهاتف','name' => 'phone','value' => '..77777777777','type' => '1'],
        [ 'slug' => 'حساب الفيس بوك','name' => 'facebook','value' => '..www.facebook,com','type' => '1'],
        ['slug' => 'قناه اليوتيوب','name' => 'youtube','value' => '..www.youtube/altamez.com','type' => '1'],
        ['slug' => 'حساب التويتر','name' => 'twetter','value' => '..','type' => '1'],
        ['slug' => 'رقم الواتساب','name' => 'whatsap','value' => '777888999','type' => '1'],
        [ 'slug' => 'عن الجامعة','name' => 'about_u','value' => '','type' => '2'],
        [ 'slug' => 'اسم عميد الكلية','name' => 'name_b','value' => '..abdallah ali','type' => '1'],
        [ 'slug' => 'كلمة عميد الكلية','name' => 'word_b','value' => ' ','type' => '2'],
        [ 'slug' => 'صوره عميد الكلية','name' => 'image_b','value' => '','type' => '3'],
        ['slug' => 'روية الكلية','name' => 'vision','value' => ' ','type' => '2'],
        [  'slug' => 'رسالة الكلية ','name' => 'message_u','value' => '','type' => '2'],
        ['slug' => 'اهداف الكلية ','name' => 'object_u','value' => ' ','type' => '2'],
        ['slug' => 'الهيكل التنضيمي','name' => 'structure_u','value' => ' ','type' => '3'],
        ['slug' => 'البريد الالكتروني','name' => 'email','value' => 'altameez123@gmail.com','type' => '1'],

        ['slug' => 'شؤون الطلاب','name' => 'about_student','value' => ' ','type' => '2'],


        ['slug' => 'التحويل الداخلي','name' => 'internal_switch','value' => ' ','type' => '2'],
        [ 'slug' => 'االتحويل الخارجي','name' => 'external_switch ','type' => '2'],

        ['slug' => 'وقف القيد','name' => 'stop_study','value' => ' ','type' => '2'],
        [ 'slug' => 'الانسحاب','retreating' => ' ','type' => '2'],
    ];

    if(Config::get('app.instail') == false) {
        $dd = App\MainInfo::all()->count();
        if ($dd <= 1) {
            foreach ($data as $item){
                App\MainInfo::updateOrCreate($item);
            }

        }
        if (App\Admin::all()->count() < 0) {
            $password = bcrypt('123456');
            App\Admin::create(['name' => 'admin', 'email' => 'admin@test.com', 'password' => $password, 'username' => 'Admin ', 'phone' => '123', 'is_admin' => true, 'is_sit' => true, 'is_social' => true, 'is_control' => true, 'is_un' => true]);
        }
        Config::set('app.instail',true);
    }
    return redirect(url('/home'));
});