jQuery(document).ready(function($) {



    $(document).on('click','.assignmentInfoBtn',function () {

        $(this).next('.vv').toggleClass("assignmentInfoText");

    });


    $(document).on('click','.assignmentUploadBtn',function () {



        $(this).next().next().next('.asignmentUpload').toggleClass("asignmentUploadForm");

    });


    $(document).on('click','.SoulassignmentInfoBtn',function () {



        $(this).next('.vv').toggleClass("assignmentInfoText");
    });

    $(document).on('click','.SoulassignmentUploadBtn',function () {


        $(this).next().next().next('.asignmentUpload').toggleClass("asignmentUploadForm");

    });







    $(document).on('click','.comments-button',function () {

        $(this).parent().parent().parent().parent('.friend-info').next('.coment-area').slideToggle("slow");


    });

    $(document).on('click','.replyCommentsButton',function () {

        $(this).parent().parent().parent().next('.replyPostComment').slideToggle("slow");

    });

    $(document).on('click','#replyCommentsButton',function () {

        $("#replyPostComment").slideToggle("slow");
    });

    $(document).on('keyup','.CommentText',function () {

        if (($(this).val()).trim() == "") {
            $(".sendCommentButtun").addClass("sendCommentButtunHasNotValue");
            $(".sendCommentButtun").removeClass("sendCommentButtunHasValue");
        }

        else {
            $(".sendCommentButtun").addClass("sendCommentButtunHasValue");
            $(".sendCommentButtun").removeClass("sendCommentButtunHasNotValue");

        }

    });
    $(document).on('keyup','#replyCommentText',function () {

        if(($("#replyCommentText").val()).trim()=="")
        {
            $(".sendCommentReplyButtun").addClass("sendCommentReplyButtunHasNotValue");
            $(".sendCommentReplyButtun").removeClass("sendCommentReplyButtunHasValue");
        }

        else{
            $(".sendCommentReplyButtun").addClass("sendCommentReplyButtunHasValue");
            $(".sendCommentReplyButtun").removeClass("sendCommentReplyButtunHasNotValue");

        }

    });




    $(".mycustomList").click(function () {


    });


    $(document).on('click','.mycustomList',function () {

        $(".mycustomListItems").slideToggle("slow");

    });

});

