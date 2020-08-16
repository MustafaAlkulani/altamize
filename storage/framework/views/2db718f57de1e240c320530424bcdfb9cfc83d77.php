<input type="hidden" id="followingPage"  class="followingPage"/>
<input type="hidden" id="userProfileId"  name="userProfileId" value="<?php echo e($userPage_id); ?>"/>
<?php $__env->startSection('content'); ?>

    <?php if(social()->user()->id==$userPage_id): ?>
      <?php  $userInfo=social()->user();  ?>
    <?php endif; ?>

    <section>


        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class="col-lg-8 center-block">
                        <div class="central-meta">
                            <div class="frnds"> .
                                <ul class="nav nav-tabs">

                                    <?php if($userInfo->Ifollow==true or social()->user()->id==$userPage_id ): ?>
                                    <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">متابع لهم</a> <span><?php echo e(($fllowingUserCount)); ?></span></li>
                                    <?php endif; ?>

                                    <?php if($userInfo->Myfollow==true or social()->user()->id==$userPage_id ): ?>
                                            <li class="nav-item"><a class="" href="#frends2" data-toggle="tab">متابعيني</a> <span><?php echo e(($myFllowingUserCount)); ?></span></li>
                                        <?php endif; ?>

                                        <?php if(social()->user()->id==$userPage_id): ?>
                                            <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">المستخدمين </a><span><?php echo e(($usersCount)); ?></span></li>
                                        <?php endif; ?>


                                        <?php if(social()->user()->id==$userPage_id): ?>
                                            <li class="nav-item"><a class="" href="#frends-myReq" data-toggle="tab">my request </a><span><?php echo e(($fllowingMyRequestCount)); ?></span></li>
                                        <?php endif; ?>

                                        <?php if(social()->user()->id==$userPage_id): ?>
                                            <li class="nav-item"><a class="" href="#frends-yourReq" data-toggle="tab"> your request </a><span><?php echo e(($fllowingYourRequestCount)); ?></span></li>
                                        <?php endif; ?>


                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active fade show user_fllower_list " id="frends" >
                                        <ul id="UlIfollow"  class="nearby-contct">

                                            


                                                
                                            


                                        </ul>
                                        <div class="lodmore">

                                            <button id="Btn_Ifollow" user-id="<?php echo e($userPage_id); ?>"  class="loadMoreFollowButton btn-view btn-load-more" type_follow="Ifollow"   last-id="0" ></button>
                                        </div>
                                    </div>


                                    <div class="tab-pane  fade  " id="frends2" >
                                        <ul id="Ulmyfollow" class="nearby-contct user_fllower_list">

                                            

                                                
                                                    
                                                        
                                                            
                                                        
                                                        
                                                            
                                                            
                                                            
                                                        
                                                    
                                                
                                            

                                        </ul>
                                        <div class="lodmore">

                                            <button id="Btn_myfollow" user-id="<?php echo e($userPage_id); ?>"  class="loadMoreFollowButton btn-view btn-load-more" type_follow="myfollow"   last-id="0" ></button>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade alluser_fllower_list" id="frends-req" >
                                        <ul id="UlallUsers" class="nearby-contct">

                                        </ul>
                                        <div class="lodmore">

                                            <button id="Btn_allUsers" user-id="<?php echo e($userPage_id); ?>"  class="loadMoreFollowButton btn-view btn-load-more" type_follow="allUsers"   last-id="0" ></button>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade myReq_fllower_list" id="frends-myReq" >
                                        <ul id="UlmyReq" class="nearby-contct">

                                        </ul>
                                        <div class="lodmore">

                                            <button id="Btn_myReq" user-id="<?php echo e($userPage_id); ?>"  class="loadMoreFollowButton btn-view btn-load-more" type_follow="myReq"   last-id="0" ></button>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade yourReq_fllower_list" id="frends-yourReq" >
                                        <ul id="UlyourReq" class="nearby-contct">

                                        </ul>
                                        <div class="lodmore">

                                            <button id="Btn_yourReq" user-id="<?php echo e($userPage_id); ?>"  class="loadMoreFollowButton btn-view btn-load-more" type_follow="yourReq"   last-id="0" ></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- centerl meta -->






                </div>


            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
    <script>


        $(document).on('click','.UnfollowUser',function () {
            var this_user= $(this).parent().parent().parent();
            var data='user1='+encodeURIComponent($(this).attr('u1id') )+ '&user2='+encodeURIComponent($(this).attr('u2id'))+'&type='+encodeURIComponent('profile')+'&typeFllow='+encodeURIComponent($(this).attr('typeFllow')) ;
            var url='/social/UnfollowUser';

            $.ajax({
                url:url,//   var url=$('#news').attr('action');
                method:'GET',
                dataType:'json',// data type that i want to return
                data:data ,// var form=$('#news').serialize();
                type:'GET'      ,           // type of request that will send data
                beforsend:function () {

                },success:function (data) {


                    if(data.status==true  )
                    {

                        if("<?php echo e($userPage_id); ?>"=="<?php echo e(social()->user()->id); ?>")
                        {
                            this_user.remove();
                            var fllowing= $('.frnds ul li span:first');
                            var fllowingMy= $('.frnds ul li').first().next().find('span');
                            var allUsers= $('.frnds ul li').first().next().next().find('span');
                            var allMyReq= $('.frnds ul li').first().next().next().next().find('span');
                            var allYourReq= $('.frnds ul li').first().next().next().next().next().find('span');

                            if( data.typeFllow=="confirm")
                            {

                                $('#Ulmyfollow').prepend(data.userData);
                                allYourReq.text(parseInt(allYourReq.text())-1);
                                fllowingMy.text(parseInt(fllowingMy.text())+1);



                            }

                            else
                            {

                                $('#UlallUsers').prepend(data.userData);
                                allMyReq.text(parseInt(allMyReq.text())-1);
                                allUsers.text(parseInt(allUsers.text())+1);

                            }


                        }



                    }
                },error:function(data_error,exception) {
                    if(exception=="error")
                    {
                        alert('error');

                    }


                }

            });

            return(false);
        });

      $(document).on('click','.followingUser',function () {

            var this_user= $(this).parent().parent().parent();
            var _this= $(this);



            var data='user1='+encodeURIComponent($(this).attr('u1id') )+ '&user2='+encodeURIComponent($(this).attr('u2id'))+'&typeFllow='+encodeURIComponent($(this).attr('typeFllow')) ;
            var url='/social/followingUser';
            //data=  data.serialize();


            $.ajax({
                url:url,//   var url=$('#news').attr('action');
                method:'GET',
                dataType:'json',// data type that i want to return
                data:data ,// var form=$('#news').serialize();
                type:'GET'      ,           // type of request that will send data
                beforsend:function () {

                },success:function (data) {


                    if(data.status==true  )
                    {
                        if("<?php echo e($userPage_id); ?>"=="<?php echo e(social()->user()->id); ?>") {

                            var deleted = this_user;
                            this_user.remove();

                            var fllowing = $('.frnds ul li span:first');
                            var fllowingMy = $('.frnds ul li').first().next().find('span');
                            var allUsers = $('.frnds ul li').first().next().next().find('span');
                            var myReq = $('.frnds ul li').first().next().next().next().find('span');


                            if (data.follow_my==true)
                             {
                                 $('.user_fllower_list ul').prepend(data.userData);
                                 fllowing.text(parseInt(fllowing.text()) + 1);
                                 allUsers.text(parseInt(allUsers.text()) - 1);

                             }

                             else
                             {
                                 $('.myReq_fllower_list ul').prepend(data.userData);
                                 myReq.text(parseInt(myReq.text()) + 1);
                                 allUsers.text(parseInt(allUsers.text()) - 1);

                             }

                        }
                        else
                        {
                            if (data.follow_my==true){
                                _this.text('اصدقاء');
                                _this.removeClass('followingUser');

                                _this.attr('href','/social/personalPage/'+_this.attr('u2id'));
                            }
                            else
                            {
                                _this.removeClass('followingUser');
                                _this.addClass('UnfollowUser');
                                _this.text('الغاء الطلب ');

                            }

                        }


                    }
                },error:function(data_error,exception) {
                    if(exception=="error")
                    {
                        alert('error');

                    }


                }

            });

            return(false);
        });


        function loadMoreFollowButton(last_id,type,user_id) {


                var url='/social/LoadMoreFllowUser';
                var data='last_id='+encodeURIComponent(last_id)+'&type='+encodeURIComponent(type )+'&user_id='+encodeURIComponent(user_id )  ;

                $.ajax({
                    url:url,//   var url=$('#news').attr('action');
                    method:'GET',
                    dataType:'json',// data type that i want to return
                    data:data ,// var form=$('#news').serialize();
                    type:'GET'       ,           // type of request that will send data
                    success:function (data) {


                        $('#Ul'+type).append(data.users) ;

                        if(data.last_id==0)
                            $('#Btn_'+type).parent().remove();
                        else
                        {
                            var parent=$('#Btn_'+type).parent();
                            $('#Btn_'+type).remove();
                            parent.append('     <button id="Btn_'+type+'" class="loadMoreFollowButton btn-view btn-load-more" type_follow="'+type+'"   last-id="'+data.last_id+'" ></button>\n' +
                                '                                   ');

                        }

                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                        alert('eeeeeeeeee');

                    }
                });


            }

            $(document).on('click','.loadMoreFollowButton',function () {

                var last_id=$(this).attr('last-id');
                var type=$(this).attr('type_follow');
                var user_id=$(this).attr('user-id');
                loadMoreFollowButton(last_id,type,user_id);

                return(false);
            });

        <?php if($userInfo->Ifollow==true or social()->user()->id==$userPage_id ): ?>
            loadMoreFollowButton(0,"Ifollow",<?php echo e($userPage_id); ?>);
        <?php endif; ?>

        <?php if($userInfo->Myfollow==true or social()->user()->id==$userPage_id ): ?>
                loadMoreFollowButton(0,"myfollow",<?php echo e($userPage_id); ?>);
                <?php endif; ?>

                if("<?php echo e($userPage_id); ?>"=="<?php echo e(social()->user()->id); ?>")

                    loadMoreFollowButton(0,"allUsers",<?php echo e($userPage_id); ?>);






    </script>

<?php $__env->stopSection(); ?>