


<header class="main-header">
    <!-- Logo -->
    <a href="{{aurl('home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>F</b>CIT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>كلية</b>التميز</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle"  role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

      @include('admin.layouts.menu')
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{Storage::url(admin()->user()->image)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{admin()->user()->username}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li class="header">لوحة التحكم</li>
            <li class="{{active_menu('home')[0]}}">
                <a href="{{aurl('home')}}">
                    <i class="fa fa-home"></i>
                    <span>الرئيسية</span>
                </a>
            </li>
            @if(admin()->user()->is_un == 1)
            <li class="treeview {{active_menu(' ')[0]}} ">
                <a href="#">
                    <i class="fa  fa-university"></i> <span>ادارة الكلية</span>
                    <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class=" treeview {{active_menu('department')[0]}}">
                        <a href="#"><i class="fa fa-building-o"></i> الاقسام <i class="fa fa-angle-left pull-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{aurl('department/create')}}"><i class="fa fa-plus"></i> اضافة قسم </a></li>
                            <li><a href="{{aurl('department')}}"><i class="fa fa-pencil-square-o"></i> ادارة الاقسام </a></li>

                        </ul>
                    </li>

                    <li class="active treeview {{active_menu('student')[0]}}">
                        <a href="#">

                            <i class="fa fa-users"></i> <span>الطلاب</span> <i class="fa fa-angle-left pull-left"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{aurl('student/create')}}"><i class="fa fa-user-plus"></i> اضافة طالب</a></li>
                            <li><a href="{{aurl('student')}}"><i class="fa fa-pencil-square-o"></i> ادارة الطلاب</a></li>
                        </ul>
                    </li>

                    <li class=" treeview {{active_menu('teacher')[0]}}">
                        <a href="#">

                            <i class="fa fa-users"></i> <span>المدرسين</span> <i class="fa fa-angle-left pull-left"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{aurl('teacher/create')}}"><i class="fa fa-user-plus"></i> اضافة مدرس</a></li>
                            <li><a href="{{aurl('teacher')}}"><i class="fa fa-pencil-square-o"></i> ادارة المدرسين</a></li>
                        </ul>
                    </li>

                </ul>

            </li>
@endif
            @if(admin()->user()->is_social == 1)
            <li class="treeview {{active_menu('social')[0]}} ">
                <a href="{{asurl('/')}}">
                    <i class="fa   fa-weixin"></i> <span>ادارة التواصل </span>
                    <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">

                    <li class="{{active_menu('home')[0]}}">
                        <a href="{{asurl('/home')}}">
                            <i class="fa fa-home"></i>
                            <span>الرئيسية-التواصل</span>
                        </a>
                    </li>

                    <li class=" treeview {{active_menu('depart',3)[0]}}">
                        <a href="#">
                            <i class="fa fa-building-o"></i> <span>الاقسام </span> <i class="fa fa-angle-left pull-left"></i> </a>
                        <ul class="treeview-menu">

                            <li><a href="{{asurl('/depart')}}"><i class="fa fa-newspaper-o"></i> ادارة الاقسام  </a></li>
                            <li class=" treeview {{active_menu('depart',3)[0]}}">
                                <a href="#">
                                    <i class="fa  fa-plus-square"></i> <span>اختيار القسم </span> <i class="fa fa-angle-left pull-left"></i> </a>
                                <ul class="treeview-menu">

                            @foreach ( App\Department::all() as $role)
                            <li><a href="{{asurl('/depart/'.$role->id)}}"><i class="fa fa-pencil-square-o"></i>{{$role->name}}  </a></li>
                             @endforeach
                                </ul>
                            </li>
                        </ul>

                    </li>

                    <li><a href="{{asurl('/users')}}"><i class="fa fa-users"></i> <span> المستخدمين </span></a></li>

                    <li class=" treeview {{active_menu('notfaction')[0]}}">
                        <a href="#">

                            <i class="fa  fa-bolt"></i> <span>الاشعارات  </span> <i class="fa fa-angle-left pull-left"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{asurl('/notification/create')}}"><i class="fa fa-user-plus"></i> اضافة اشعار</a></li>
                            <li><a href="{{asurl('/notification')}}"><i class="fa fa-pencil-square-o"></i> ادارة الاشعارات </a></li>
                        </ul>
                    </li>

                    <li><a href="{{asurl('/upgrade/home')}}"><i class="fa  fa-upload"></i> <span> التحديثات </span></a></li>

                    <li><a href="{{asurl('/courses')}}"><i class="fa   fa-sticky-note "></i> <span> الكورسات الدراسية </span></a></li>

                    <li><a href="{{asurl('/groups')}}"><i class="fa  fa-commenting-o "></i> <span> المجموعات  </span></a></li>


                </ul>

            </li>

            @endif
            @if(admin()->user()->is_control == 1)
            <li class=" treeview {{active_menu('control')[0]}}">
                <a href="#">

                    <i class="fa fa-suitcase"></i> <span>الكنترول</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{aurl('control/')}}/addStudentResult/add"><i class="fa fa-plus"></i>اضافة النتائج  </a></li>
                    <li><a href="{{aurl('control/')}}/editresult"><i class="fa fa-upload"></i>تحديث نتيجة طالب </a></li>
                    <li><a href="{{aurl('control/')}}/addStudentResult/edit"><i class="fa fa-upload"></i>تحديث نتيجة مادة  </a></li>
                    <li><a href="{{aurl('control/')}}/viewResult"><i class="fa  fa-heart"></i>عرض النتائج</a></li>
                    <li><a href="{{aurl('control/')}}/showResult"><i class="fa fa-pencil-square-o"></i>عرض نتيجة طالب</a></li>
                </ul>
            </li>
            @endif
            @if(admin()->user()->is_sit == 1)
            <li class=" treeview {{active_menu('sit')[0]}}">
                <a href="#">

                    <i class="fa fa-globe"></i> <span>الموقع التعريفي</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{active_menu('home',4)[0]}}">
                        <a href="{{aurl('sit/home')}}">
                            <i class="fa fa-home"></i>
                            <span>الرئيسية-التعريفي</span>
                        </a>
                    </li>
                    <li class="{{active_menu('mainInfo',4)[0]}}"><a href="{{aurl('sit/mainInfo')}}"><i class="fa fa-wrench"></i> البيانات الاساسية </a></li>
                    <li class="{{active_menu('postNews',4)[0]}}"><a href="{{aurl('sit/postNews/create')}}"><i class="fa fa-send"></i>اضافة خبر </a></li>
                    <li class="{{active_menu('postNews')[0]}}"><a href="{{aurl('sit/postNews')}}"><i class="fa fa-globe "></i>الاخبار </a></li>
                    <li class="{{active_menu('slider',4)[0]}}"><a href="{{aurl('sit/slider')}}"><i class="fa fa-image "></i>الصور المتحركة </a></li>
                    <li class="{{active_menu('advertising',4)[0]}}"><a href="{{aurl('sit/advertising')}}"><i class="fa fa-bullhorn"></i>الاعلانات </a></li>
                    <li class="{{active_menu('event',4)[0]}}"><a href="{{aurl('sit/event')}}"><i class="fa fa-bullhorn"></i>الاحداث</a></li>
                    <li class="{{active_menu('contact',4)[0]}}"><a href="{{aurl('sit/contact')}}"><i class="fa  fa-envelope"></i>اتصل بنا</a></li>


                </ul>
            </li>
            @endif
            @if(admin()->user()->is_admin == 1)
            <li class=" treeview {{active_menu('admin')[0]}}">
                <a href="#">

                    <i class="fa fa-user-secret"></i> <span>مدراء النظام</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{active_menu('create',3)[0]}}"><a href="{{aurl('admin/create')}}"><i class="fa fa-user-plus"></i>اضافة مدير جديد</a></li>
                    <li class="{{active_menu('admin')[0]}}"><a href="{{aurl('admin')}}"><i class="fa  fa-gears"></i>ادارة مدراء النظام</a></li>
                </ul>
            </li>
@endif

            <li><a href="{{aurl('acountSetting')}}"><i class="fa fa-edit"></i> <span>اعدادات الحساب</span></a></li>
            <li><a href="{{aurl('logout')}}"><i class="fa fa-sign-out"></i> <span>تسجيل الخروج</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
