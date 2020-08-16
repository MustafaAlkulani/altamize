<?php $__env->startSection('content'); ?>

    <section>
        <script>
            var user_id = '<?php echo e(social()->user()->id); ?>';
            var username = '<?php echo e(social()->user()->display_name); ?>';
            var typingurl = '<?php echo e(url('/')); ?>/Desing/social/LowgaChat-design/image/typing.gif';
        </script>

        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class="col-md-8 ">

                        <div id="_token">
                            <?php echo e(csrf_field()); ?>

                        </div>

                        <div class="dropdown  hidden">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="current_status" status="online">Online</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item status" status="online" href="#">Online</a>
                                <a class="dropdown-item status" status="offline" href="#">Offline</a>
                                <a class="dropdown-item status" status="bys" href="#">Busy</a>
                                <a class="dropdown-item status" status="dnd" href="#">don't disturb</a>
                            </div>
                        </div>


                        <div class="central-meta">
                            <div class="messages">
                                <h5 class="f-title"><i class="ti-bell"></i><?php echo e(trans('social.All Messages')); ?> <span class="more-options"><i
                                                class="fa fa-ellipsis-h"></i></span></h5>
                                <div class="message-box" id="message-box">

                                </div>
                            </div>
                        </div>
                    </div><!-- centerl meta -->
                    <div class="col-md-4">
                        <aside class="sidebar static">

                            <div class="widget friend-list stick-widget">
                                <h4 class="widget-title"><?php echo e(trans('social.Friends')); ?></h4>
                                <div id="searchDir"></div>
                                <ul id="people-list" class="friendz-list row">


                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="more col-xs-12">
                                            <li id="sidebar-user-box" class="user" uid="<?php echo e($user->id); ?>">
                                                <figure>
                                                    <img class="user_image"
                                                         src="<?php echo e(Storage::url($user->personal_image)); ?>"
                                                         style="width:100px " alt="">
                                                    

                                                    <span id="user_status_user_<?php echo e($user->id); ?>"
                                                          class="user_status user_<?php echo e($user->id); ?>"></span>
                                                </figure>
                                                <div class="friendz-meta">
                                                    <a href="<?php echo e(surl('personalPage/'.$user->id)); ?>"><?php echo e($user->display_name); ?></a>
                                                    
                                                </div>
                                            </li>

                                            <ul class="more-dropdown  UserMassager-dropdown">
                                                <div class="setting-row">
                                                    <span>  <a href="<?php echo e(surl('personalPage/'.$user->id)); ?>"><?php echo e(trans('social.View Profile')); ?></a></span>

                                                </div>

                                                <div class="setting-row">
                                                    <span><?php echo e(trans('social.Blook')); ?></span>
                                                    <?php
                                                    $isBlocked = false;
                                                    ?>
                                                    

                                                    <input blocked="<?php if(canNotMassageMe($user->id,social()->user()->id)==false): ?> 1 <?php else: ?> 0 <?php endif; ?>"
                                                           class="<?php if(isBlokedUser(social()->user()->id,$user->id) ): ?>blocked<?php
                                                           $isBlocked = true;
                                                           ?><?php else: ?> unblocked<?php $isBlocked = false;?><?php endif; ?> blockBtn"
                                                           type="checkbox" id="switch<?php echo e($user->id); ?>"
                                                           <?php if($isBlocked): ?>
                                                           checked
                                                           <?php endif; ?>
                                                           uid="<?php echo e($user->id); ?>"/>
                                                    <label for="switch<?php echo e($user->id); ?>" data-on-label="ON"
                                                           data-off-label="OFF"></label>
                                                </div>


                                                <div class="setting-row">
                                                    <span>  <a class="buttonDeleteConversation" url="deleteAllMessages"
                                                               message="do you want to delete this post"
                                                               user-id="<?php echo e($user->id); ?>"><?php echo e(trans('social.Delete Conversation')); ?>

                                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </span>

                                                </div>


                                            </ul>
                                        </div>




                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>

                            </div><!-- friends list sidebar -->

                        </aside>
                    </div><!-- sidebar -->
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>


    
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo e(url('/')); ?>/desing/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>


    <script>
        function status_user(class1, class2) {
            var status_user = ['f-online', 'off-online', 'dnd', 'f-away'];
            $.each(status_user, function (k, v) {
                $('.' + class1).removeClass(v);
            });


            $('.' + class1).addClass(class2);

        }

        $(document).ready(function () {

            var mylist = [];
            $('.user').each(function () {
                var uid = $(this).attr('uid');
                mylist.push(uid);
            });


            //////
            var my_status = $('.current_status').attr('status');
            // console.log(my_status);
            var socket = io.connect('http://localhost:5000', {
                query: 'user_id=' + user_id + '&username=' + username + '&mylist=' + mylist.join(',') + '&status=' + my_status
            });


            var array_emit = ['is_online', 'iam_online', 'iam_offline', 'new_status'];
            $.each(array_emit, function (k, v) {
                socket.on(v, function (data) {
                    status_user(data.user_id, data.status);
                });

            });

            socket.on('request_status', function (data) {
                console.log($('.current_status').attr('status'));
                socket.emit('response_status', {
                    to_user: data.user_id,
                    my_status: $('.current_status').attr('status')
                });
            });


            socket.on('connect', function (data) {
                $('.user').each(function () {
                    var uid = $(this).attr('uid');
                    socket.emit('check_online', {
                        user_id: 'user_' + uid
                    });
                });
            });


            $(document).on('click', '.status', function () {
                var status_user = $(this).attr('status');
                $('.current_status').attr('status', status_user);

                if (status_user == 'dnd') {
                    $('.current_status').text("don't disturb");
                } else if (status_user == 'bys') {
                    $('.current_status').text('Busy');
                } else {
                    $('.current_status').text(status_user);
                }

                socket.emit('change_status', {
                    status: status_user
                });
            });


            var arr = []; // List of users

            $(document).on('click', '.msg_head', function () {
                var chatbox = $(this).parents().attr("rel");
                $('[rel="' + chatbox + '"] .msg_wrap').slideToggle('slow');
                return false;
            });


            $(document).on('click', '.close', function () {
                var chatbox = $(this).parents().parents().attr("rel");
                $('[rel="' + chatbox + '"]').hide();
                arr.splice($.inArray(chatbox, arr), 1);
                displayChatBox();
                return false;
            });


            function private_chatbox(username, userID, toId, user_image) {
                if ($.inArray(userID, arr) != -1) {
                    arr.splice($.inArray(userID, arr), 1);
                }

                var user_status = 0;
                if ($('#user_status_' + userID).hasClass("online"))
                    user_status = "online";
                else
                    user_status = "offline";

                arr.unshift(userID);
//alert($("#switch"+userID.slice(5)).attr('blocked'));

                <?php
                    $userBlocked_id = "<script>document.write(userID.slice(5));</script>"?>
                    chatPopup = '    <div  style="width: 100%" id="peoples-mesg-box-Open" class="peoples-mesg-box box' + userID + '" rel="' + userID + '" >\n' +
                    '                                        <div class="conversation-head">\n' +
                    '                                            <figure><img src="' + user_image + '" alt=""></figure>\n' +
                    '                                            <span>' + username + '<i> ' + user_status + '</i></span>\n' +
                    '                                        </div>\n' +
                    '                                        <ul id="chatting-area" class="chatting-area">\n' +
                    '                                         <div class="msg_push"></div>   \n' +
                    '                                        </ul> ';

//                if($("#switch"+userID.slice(5)).hasClass('unblocked'))


                if ($("#switch" + userID.slice(5)).attr('blocked') == 1)

                    chatPopup = chatPopup + '                                        <div class="message-text-container">\n' +
                        '                                            <form method="post" enctype="multipart/form-data" >\n' +
                        '                                            <input type="hidden" name="to" value="' + toId + '">  \n' +

                        '                                                <span class="broadcast"></span>' +
                        // '                                                 <textarea id="MessageTextarea"  name="message" class="msg_input" ></textarea>\n' +
                        '  <textarea class="replyCommentText" id="MessageTextarea"   name="message" cols="50" rows="10">\n' +
                        '                           </textarea>\n' +
                        '\n' +
                        '            <div class="attachments photoCommentButtun ">\n' +
                        '                <i class="fa fa-camera">\n' +
                        '                    <label class="fileContainer" for="replyCommentImage">\n' +
                        '\n' +
                        '                        <input single="yes" id="messageFile" class="replyCommentImage" name="image" type="file">\n' +
                        '                    </label>\n' +
                        '                </i>\n' +
                        '            </div> <button  id="btnSendMessage" type="button" class=""><i class="fa fa-paper-plane"></i></button>                                    ' +
                        // '<button  id="btnSendMessage" type="button" title="send"><i class="fa fa-paper-plane"></i></button>\n' +
                        '   <div class="new-comment-image-holder">\n' +
                        '            </div>\n                                           </form>\n' +
                        '                                        </div>\n';

                else
                    chatPopup = chatPopup + '<p class="text-center">  Conversation is blocked </p>';


                chatPopup = chatPopup + '</div>';

                /*     chatPopup =  '<div class="msg_box box'+userID+'" style="right:270px" rel="'+userID+'">'+
                         '<div class="msg_head">'+username +
                         '<div class="close">x</div> </div>'+
                         '<div class="msg_wrap"> <div class="msg_body">	<div class="msg_push"></div> </div>'+
                         '<div class="msg_footer"><span class="broadcast"></span><textarea class="msg_input" rows="4">' +
                         '</textarea></div> 	</div> 	</div>' ;

                     */

                if (!$("#message-box").children(".peoples-mesg-box:first").hasClass("box" + userID)) {

                    $("#message-box").children(".peoples-mesg-box:first").remove();
                    $("#message-box").append(chatPopup);

                }

                displayChatBox();
                var toAppend = $("#chatting-area");
                if (toAppend.children('div:first').hasClass('msg_push'))
                    load_moer_message(userID.slice(5), 0, toAppend);
            }


            socket.on('setViewOrRevived', function (data) {


                $.each(data.massages, function (key, val) {
                    var parent = $("#message_" + val).parent();
                    $("#message_" + val).remove();
                    $("#unReadedMassages_" + val).remove();
                    parent.append('<div class="col-xs-3" >  <i class="fa fa-check-circle"></i> view  </div>');


                });


            });


            function load_moer_message(to, message_id, toAppend) {
                var _token = $('#_token').children('input[name="_token"]').val();
                $('input[name="_token"]').val();

                var data = 'to=' + encodeURIComponent(to) +
                    '&message_id=' + encodeURIComponent(message_id) +
                    '&_token=' + encodeURIComponent(_token);

                var url =$('#surl').val()+'/messenger/getOldMessage';
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',// data type that i want to return
                    data: data,// var form=$('#news').serialize();

                    success: function (data) {
                        //   alert('ddddddddddddddd');

//                        $('#loadMoreMessagesButton').remove();
                        $('#loadMoreMessagesButtonParrent').remove();

                        toAppend.prepend(data.messages);
                        //   alert("mmmmmm"+data.massageUnViewed);

                        socket.emit('checkViewOrRevived', {

                            toId: to,
                            to: 'user_' + to,
                            messages_id: data.massageUnViewed

                        });


                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);


                        console.log(xhr.responseText);
                    }

                });


            }

            function getOldMessages() {


            }


            $(document).on('click', '#loadMoreMessagesButton', function () {
                var last_id = $(this).attr("last-id");
                var to = $(this).attr("to-id");
                var toAppend = $(this).parent().parent();

                load_moer_message(to, last_id, toAppend);
            });


            $(document).on('click', '#sidebar-user-box', function () {
                var userID = $(this).attr("uid");
                var username = $(this).children().text();
                var user_image = $(this).children().children(".user_image").attr("src");

                private_chatbox(username, 'user_' + userID, userID, user_image);

            });


            function makeMassageAsReaded(id) {

                var data = 'id=' + encodeURIComponent(id);
                var url =$('#surl').val()+'/makeMassageAsReaded';


                $.ajax({
                    url: url,//   var url=$('#news').attr('action');
                    method: 'GET',
                    dataType: 'json',// data type that i want to return
                    data: data,// var form=$('#news').serialize();
                    type: 'GET',           // type of request that will send data
                    beforsend: function () {

                    }, success: function (data) {


                        if (data.status == true) {
                            // alert("sucess") ;
                        }
                    }, error: function (xhr, status, error) {
                        alert(xhr.responseText);


                    }

                });

            }

            function newMeassage(message, image, massage_id, created_at, massageStatus, massageStatusIcon, from_uid, whois, to) {

                var massageIconDisplay = ' ';
                var textclass = 'you';
                if (whois == 'user_' + user_id) {
                    massageIconDisplay = '<div class="col-xs-3"  id="message_' + massage_id + '"> ' + massageStatusIcon + ' ' + massageStatus + ' </div> ';
                    textclass = 'me';
                }
                else
                    massageIconDisplay = '<span>   </span>';


                $('<li class="massageBox ' + textclass + '">\n' +
                    '<p>' +
                    '<img   src="' + image + '" alt="">\n ' + message + ' </p>\n' +
                    '</li>' +
                    '<div  class="row messageTools  ' + textclass + ' showMessageInfo" >\n' +
                    '<div class="col-xs-6" >' + created_at + ' </div>\n' +
                    '<div class="col-xs-2">\n' +
                    '<button type="button"  class="btnDeleteMessage" id="' + massage_id + '"  message="do you want delete this message"   >\n' +
                    '<i class="fa fa-trash"></i>\n' +
                    '</button>\n' +
                    '</div>\n' +
                    massageIconDisplay + '\n</div>'
                ).insertBefore('[rel="' + from_uid + '"] .msg_push');

                //alert(massage_id);


            }


            socket.on('new_private_msg', function (data) {


//                if(!$('.peoples-mesg-box').hasClass('box'+data.from_uid))
//                {
//                    private_chatbox(data.username,data.from_uid,data.toId,data.image);
//                }
//
                // to open chat if user online


                /////////////////////

                ///////////////////////////

//                alert(reciveOrView);
//
                var userChatting = document.getElementById('peoples-mesg-box-Open');


                var massageAsReaded = false;
                if (userChatting == null)
                    private_chatbox(data.username, data.from_uid, data.toId, data.image);

//                alert($("#peoples-mesg-box-Open").attr('rel'));
//
                // alert("whois   "+data.whois);
                // alert("whois   "+data.whois);
                //   alert("to   "+data.toId);
                //     alert("from  "+data.from_uid);
                if ($('#user_status_' + data.from_uid).hasClass("online")) {


                    //alert('box'+data.whois);

                    //  if( $('#peoples-mesg-box-Open').hasClass('box'+data.whois) )
                    //      if(!$('.peoples-mesg-box').hasClass('box'+data.from_uid))
                    //  if( $('#user_status_'+data.from_uid).hasClass('box'+data.from_uid))
//                        {
//                         //   alert("viewed");
////                                massageAsReaded=true;
//                            makeMassageAsReaded(data.massage_id);
//                             massageStatus="viewed";
//                             massageStatusIcon=' <i class="fa fa-check-circle"></i> ';
//                        }

                    var massageStatus = "recived";
                    var massageStatusIcon = ' <i class="fa fa-check"></i>  <i class="fa fa-check"></i>  ';

                    newMeassage(data.message, data.image, data.massage_id, data.created_at, massageStatus, massageStatusIcon, data.from_uid, data.whois, data.toId);


                    if ($('.peoples-mesg-box').hasClass('box' + data.from_uid)) {

                        var massage_ids = [];
                        massage_ids.push(data.massage_id);

                        socket.emit('checkViewOrRevived', {

                            toId: data.to,
                            to: data.from_uid,
                            messages_id: massage_ids

                        });

                    }

                    else {
                        var numberOfMessageTap = 0;
                        var numberOfMessage = 1;
                        if ($("#unReadedMassages_" + data.from_uid.slice(5)).hasClass("exist")) {
                            numberOfMessage = parseInt($("#numberOfMessage_" + data.from_uid.slice(5)).text()) + 1;

                            $("#unReadedMassages_" + data.from_uid.slice(5)).remove();


                        }
                        else {
                            if (parseInt($("#countUnreadedMessagesTap").text()) > 0)
                                numberOfMessageTap = parseInt($("#countUnreadedMessagesTap").text()) + 1;
                            else
                                numberOfMessageTap = 1;
                            $("#countUnreadedMessagesTap").text(numberOfMessageTap);
                        }


                        $(".unReadedMassages").append('<li class="exist" id="unReadedMassages_' + data.from_uid.slice(5) + '">\n' +
                            '                                                        <a class="active_a" href="/social/messenger2/' + data.from_uid.slice(5) + '"  onclick="pp(this)" title="">\n' +
                            '                                                            <img src="images/resources/thumb-2.jpg" alt="">\n' +
                            '                                                            <div class="mesg-meta">\n' +
                            '                                                                <h6>' + data.username + '</h6>\n' +
                            '                                                                <span>' + data.message + ' </span>\n' +
                            '                                                                <i>' + data.created_at + '</i>\n' +
                            '                                                            </div>\n' +
                            '                                                        </a>\n' +
                            '                                                        <span id="numberOfMessage_' + data.from_uid.slice(5) + '" class="tag red">' + numberOfMessage + '</span>\n' +
                            '                                                    </li>');
                    }

                }

                else {
                    var massageStatus = "sent";
                    var massageStatusIcon = ' <i class="fa fa-check"></i>  ';

                    // alert("sent");
                    newMeassage(data.message, data.image, data.massage_id, data.created_at, massageStatus, massageStatusIcon, data.from_uid, data.whois, data.toId);

                }


                $('.box' + data.from_uid + ' .broadcast').html('');

                $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);


            });


            $(document).on('click', '#btnSendMessage', function (e) {


                var chatbox = $(this).parents().parents().parents().attr("rel");
                var toId = chatbox.slice(5);
                var user_status = 0;
                if ($('#user_status_' + chatbox).hasClass("online"))
                    user_status = "online";
                else
                    user_status = "offline";

                var msg = $("#MessageTextarea").val();
                var msgImage = $("#messageFile");

                //   $(this).val('');
                if (msg.trim().length != 0) {


                    var form = ($(this).parents())[0];

                    var formData = new FormData(form);
                    var _token = $('#_token').children('input[name="_token"]').val();

//                    var NewMessage='<pre>'+ formData.get("message")+'</pre>';
//                    alert(NewMessage);
//                    formData.delete('message');
//                    formData.append('message',NewMessage);
//
                    formData.append('_token', _token);
                    formData.append('status', user_status);
                    var url =$('#surl').val()+'/messenger/store';

                    /*   var data='to='+encodeURIComponent(chatbox.slice(5)) +
                           '&message='+encodeURIComponent(msg)+
                           '&image='+encodeURIComponent('')+
                           '&_token='+encodeURIComponent(_token);
           */


                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,

                        success: function (data) {

                            socket.emit('send_private_msg', {
                                message: msg,
                                to: chatbox,
                                toId: toId,
                                image: data.image,
                                massage_id: data.massage_id,
                                created_at: data.created_at
                            });


                            $('#MessageTextarea').val('');
                            $('#messageFile').val('');
                            $('.new-comment-image-holder').empty();

                        },
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                            alert(xhr.responseText);
                        }

                    });

                }


            });

            $(document).on('keypress', 'textarea', function (e) {
                var chatbox = $(this).parents().parents().parents().attr("rel");

                socket.emit('broadcast_private', {
                    to: chatbox,
                    username: username,
                });

            });

            socket.on('new_broadcast', function (data) {


                $('.box' + data.from + ' .broadcast').html('<span style="font-size:10px;float:left">' + data.username + '</span> <img class="pull-right" style="width: 50px ;" src="' + typingurl + '" />');

                setTimeout(function () {
                    $('.box' + data.from + ' .broadcast').html('');
                }, 10000);
            });


            function displayChatBox() {
                i = 270; // start position
                j = 260;  //next position

                $.each(arr, function (index, value) {
                    if (index < 4) {
                        $('[rel="' + value + '"]').css("right", i);
                        $('[rel="' + value + '"]').show();
                        i = i + j;
                    }
                    else {
                        $('[rel="' + value + '"]').hide();
                    }
                });
            }


            var mass_name = '<?php echo e($user_messages->display_name); ?>';
            var mass_id = '<?php echo e($user_messages->id); ?>';
            var mass_image = '<?php echo e($user_messages->personal_image); ?>';


            if (user_id != mass_id)
                private_chatbox(mass_name, 'user_' + mass_id, mass_id, mass_image);


        });


        function readURLImage(input) {
            var src = "kkkkkkkkk";
            alert(src);

            // if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function () {
                src = reader.result;


            };
            reader.readAsDataURL(input.target.files[0]);

            // }
            alert(src);
            return src;
        }


        $(document).on('click', '.massageBox', function () {


            $(this).next('.showMessageInfo').slideToggle("slow");


        });


        $(document).on('click', '.btnDeleteMessage', function () {

                var id = $(this).attr('id');

                var message = $(this).attr('message');
                var this_div = $(this).parent().parent();
                var this_message = this_div.prev('.massageBox');


                Swal.fire({
                    title: message,
                    text: "سيتم الحذف نهايا",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f67875",
                    confirmButtonText: "حذف!",
                    showCloseButton: true,
                    reverseButtons: true,
                    cancelButtonText: "الغاء!"
                }).then((result) => {
                    if (result.value) {

                        //صفحة الحذف
                        //  window.location.assign('deleteref/'+id)

                        var data = 'id=' + encodeURIComponent(id);
                        var url =$('#surl').val()+'/deleteMessage/' + id;


                        $.ajax({
                            url: url,//   var url=$('#news').attr('action');
                            method: 'GET',
                            dataType: 'json',// data type that i want to return
                            data: data,// var form=$('#news').serialize();
                            type: 'GET',           // type of request that will send data
                            beforsend: function () {

                            }, success: function (data) {


                                if (data.status == true) {
                                    this_div.remove();
                                    this_message.remove();


                                    Swal.fire("موافق", "تم  الحذف بنجاح!", "success");

                                }
                            }, error: function (data_error, exception) {
                                if (exception == "error") {
                                    Swal.fire("موافق", "لم يتم  الحذف !", "error");

                                }


                            }

                        });

                        return (false);
                    }
                    else {

                        Swal.fire("الغاء", "تم  التراجع عن الحذف بنجاح!", "error");

                    }
                })

            }
        );

        $(document).on('click', '.blockBtn', function () {

            // $(this).next('.showMessageInfo').slideToggle("slow");
            var blocked = 0;
            if ($(this).hasClass("blocked"))
                blocked = 1;
            else
                blocked = 0;

            //  var id=$('#loadMorePostsButton').attr('post-id');


            var uid = $(this).attr('uid');


            var data = 'blocked=' + encodeURIComponent(blocked) + '&uid=' + encodeURIComponent(uid);
            var url =$('#surl').val()+'/blockUser';
            //data=  data.serialize();

            $.ajax({
                url: url,//   var url=$('#news').attr('action');
                method: 'GET',
                dataType: 'json',// data type that i want to return
                data: data,// var form=$('#news').serialize();
                type: 'GET',           // type of request that will send data
                success: function (data) {

                    if (data.status == true) {
                        if (data.blocked == 0) {
                            $("#switch" + uid).prop('checked', false);
                            $("#switch" + uid).removeClass("blocked");
                            $("#switch" + uid).addClass("unblocked");

                        }
                        else {

                            $("#switch" + uid).prop('checked', true);
                            $("#switch" + uid).removeClass("unblocked");
                            $("#switch" + uid).addClass("blocked");

                        }


                    }
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    alert('eeeeeeeeee');

                }


            });

            return (false);
        });


        ;

    </script>
    <script src="<?php echo e(url('/')); ?>/Desing/social/js/socket.io.js"></script>



<?php $__env->stopSection(); ?>






















<?php echo $__env->make('social.layouts.personalPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>