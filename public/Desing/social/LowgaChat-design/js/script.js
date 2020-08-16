function status_user(class1,class2)
{
    var status_user = ['online','offline','dnd','bys'];
    $.each(status_user,function(k,v){
        $('.'+class1).removeClass(v);
    });


    $('.'+class1).addClass(class2);

}

$(document).ready(function(){

    var mylist = [];
    $('.user').each(function(){
        var uid = $(this).attr('uid');
        mylist.push(uid);
    });

    //////
    var my_status = $('.current_status').attr('status');
    // console.log(my_status);
    var socket = io.connect('http://localhost:5000',{
        query:'user_id='+user_id+'&username='+username+'&mylist='+mylist.join(',')+'&status='+my_status
    });


    var array_emit = ['is_online','iam_online','iam_offline','new_status'];
    $.each(array_emit,function(k,v){
        socket.on(v,function(data){
            status_user(data.user_id,data.status);
        });

    });

    socket.on('request_status',function(data){
        console.log($('.current_status').attr('status'));
        socket.emit('response_status',{
            to_user:data.user_id,
            my_status:$('.current_status').attr('status')
        });
    });



    socket.on('connect',function(data){
        $('.user').each(function(){
            var uid = $(this).attr('uid');
            socket.emit('check_online',{
                user_id:'user_'+uid
            });
        });
    });



    $(document).on('click','.status',function(){
        var status_user = $(this).attr('status');
        $('.current_status').attr('status',status_user);

        if(status_user == 'dnd')
        {
            $('.current_status').text("don't disturb");
        }else if(status_user == 'bys'){
            $('.current_status').text('Busy');
        }else{
            $('.current_status').text(status_user);
        }

        socket.emit('change_status',{
            status:status_user
        });
    });




    var arr = []; // List of users

    $(document).on('click', '.msg_head', function() {
        var chatbox = $(this).parents().attr("rel") ;
        $('[rel="'+chatbox+'"] .msg_wrap').slideToggle('slow');
        return false;
    });


    $(document).on('click', '.close', function() {
        var chatbox = $(this).parents().parents().attr("rel") ;
        $('[rel="'+chatbox+'"]').hide();
        arr.splice($.inArray(chatbox, arr), 1);
        displayChatBox();
        return false;
    });


    function private_chatbox(username,userID)
    {
        if ($.inArray(userID, arr) != -1)
        {
            arr.splice($.inArray(userID, arr), 1);
        }

        arr.unshift(userID);
        chatPopup =  '<div class="msg_box box'+userID+'" style="right:270px" rel="'+userID+'">'+
            '<div class="msg_head">'+username +
            '<div class="close">x</div> </div>'+
            '<div class="msg_wrap"> <div class="msg_body">	<div class="msg_push"></div> </div>'+
            '<div class="msg_footer"><span class="broadcast"></span><textarea class="msg_input" rows="4"></textarea></div> 	</div> 	</div>' ;

        $("body").append(  chatPopup  );
        displayChatBox();
         var toAppend=$('.box'+userID).children('.msg_wrap').children('.msg_body').first() ;
         if(toAppend.children('div:first').hasClass('msg_push'))
          load_moer_message(userID.slice(5),0,toAppend) ;
    }


    function load_moer_message(to,message_id,toAppend) {
        var _token=$('#_token').children('input[name="_token"]').val();
        $('input[name="_token"]').val() ;

        var data='to='+encodeURIComponent(to) +
            '&message_id='+encodeURIComponent(message_id)+
            '&_token='+encodeURIComponent(_token);

        var url='/social/messenger/getOldMessage';
        $.ajax({
            url: url,
            type: 'POST',
            dataType:'json',// data type that i want to return
            data:data ,// var form=$('#news').serialize();

            success: function(data)
            {
                //   alert('ddddddddddddddd');
                 $('#loadMoreMessagesButton').remove();
                toAppend.prepend(data.messages);
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);


                console.log(xhr.responseText);
            }

        });


    }

    function getOldMessages() {



}

    $(document).on('click', '#loadMoreMessagesButton', function() {
        var last_id = $(this).attr("last-id");
        var to = $(this).attr("to-id");
        var toAppend = $(this).parent() ;

        load_moer_message(to,last_id,toAppend) ;
    });


    $(document).on('click', '#sidebar-user-box', function() {
        var userID = $(this).attr("uid");
        var username = $(this).children().text() ;
        private_chatbox(username,'user_'+userID);

    });



    socket.on('new_private_msg',function(data){
        if(!$('.msg_box').hasClass('box'+data.from_uid))
        {
            private_chatbox(data.username,data.from_uid);
        }

        $('.box'+data.from_uid+' .broadcast').html('');

        if(data.whois == 'user_'+user_id)
        {
            var textclass = 'msg-right';
        }else{
            var textclass = 'msg-left';
        }

        $('<div class="'+textclass+'">'+data.message+'</div>').insertBefore('[rel="'+data.from_uid+'"] .msg_push');
        $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
    });


    $(document).on('keypress', 'textarea' , function(e) {
        var chatbox = $(this).parents().parents().parents().attr("rel");
        if (e.keyCode == 13) {
            var msg = $(this).val();
            $(this).val('');
            if(msg.trim().length != 0){

             //   alert('bbb');
                var _token=$('#_token').children('input[name="_token"]').val();
             //   alert(_token);
                $('input[name="_token"]').val() ;

                var data='to='+encodeURIComponent(chatbox.slice(5)) +
                    '&message='+encodeURIComponent(msg)+
                    '&image='+encodeURIComponent('')+
                    '&_token='+encodeURIComponent(_token);

                var url='/social/messenger/store';
           //     alert(chatbox.slice(5));
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType:'json',// data type that i want to return
                    data:data ,// var form=$('#news').serialize();

                    success: function(data)
                    {

                        socket.emit('send_private_msg',{
                            message:msg,
                            to:chatbox
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        alert(xhr.responseText);
                    }

                });

            }
        }else{
            socket.emit('broadcast_private',{
                to:chatbox,
                username:username,
            });
        }
    });

    socket.on('new_broadcast',function(data){

        $('.box'+data.from+' .broadcast').html('<span style="font-size:10px;float:left">'+data.username+'</span> <img class="pull-right" style="width: 50px ;" src="'+typingurl+'" />');

        setTimeout(function(){
            $('.box'+data.from+' .broadcast').html('');
        },10000);
    });


    function displayChatBox(){
        i = 270 ; // start position
        j = 260;  //next position

        $.each( arr, function( index, value ) {
            if(index < 4){
                $('[rel="'+value+'"]').css("right",i);
                $('[rel="'+value+'"]').show();
                i = i+j;
            }
            else{
                $('[rel="'+value+'"]').hide();
            }
        });
    }




});