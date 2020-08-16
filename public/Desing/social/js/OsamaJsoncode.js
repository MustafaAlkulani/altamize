var validFiles = [];
var NewCommentImage = "";

$(document).ready(function () {


    // $(document).on('click','.personal_photo',function () {
    //
    //     $(this).prev().addClass('btn_image');
    //     $(this).prev().removeClass('hidden');
    //
    // });
    // $(document).on('mouseleave','.personal_photo',function () {
    //
    //     $(this).prev().removeClass('btn_image');
    //     $(this).prev().addClass('hidden');
    //
    //
    // });
    // this.mouseleave


    $(document).on('click', '.buttonDeleteImages', function () {


            var id = $(this).attr('image_id');
            var type = $(this).attr('type_image');
            var message = $(this).attr('message');

            var this_div = $(this).parent();
            var _token = $('#_token').children('input[name="_token"]').val();


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
                    var data = 'id=' + encodeURIComponent(id) + '&type=' + encodeURIComponent(type) + '&_token=' + encodeURIComponent(_token);
                    var url =$('#surl').val()+'/deleteImage';


                    $.ajax({
                        url: url,//   var url=$('#news').attr('action');
                        method: 'post',
                        dataType: 'json',// data type that i want to return
                        data: data,// var form=$('#news').serialize();
                        type: 'post',           // type of request that will send data
                        beforsend: function () {

                        }, success: function (data) {


                            if (data.status == true) {
                                this_div.remove();


                                MyMassageAlert("موافق", "تم  الحذف بنجاح!", "success", 1000);

                            }
                        },
                        error: function (xhr, status, error) {

                            console.log(xhr.responseText);
                            // alert(xhr.responseText);
                        }
                    });

                    return (false);
                }
                else {

                    MyMassageAlert("الغاء", "تم  التراجع عن الحذف بنجاح!", "error", 1000);

                }
            })

        }
    );

    $(document).on('click', '.loadMoreImageButton', function () {


        var id = $(this).attr('image-id');
        var type = $(this).attr('type_image');
        var user_id = $(this).attr('user-id');


        var url =$('#surl').val()+'/LoadMorephotos';
        var data = 'id=' + encodeURIComponent(id) + '&type=' + encodeURIComponent(type) + '&user_id=' + encodeURIComponent(user_id);

        $.ajax({
            url: url,//   var url=$('#news').attr('action');
            method: 'GET',
            dataType: 'json',// data type that i want to return
            data: data,// var form=$('#news').serialize();
            type: 'GET',           // type of request that will send data
            success: function (data) {
                if (type == "post")
                    $('#postImages').append(data.photos);
                else if (type == "personal")
                    $('#personalImages').append(data.photos);
                else
                    $('#coverImages').append(data.photos);

                if (data.last_id == 0)
                    $('#Btn_' + type).parent().remove();
                else {
                    var parent = $('#Btn_' + type).parent();
                    $('#Btn_' + type).remove();
                    parent.append('     <button id="Btn_' + type + '" class="loadMoreImageButton btn-view btn-load-more" type_image="' + type + '"   image-id="' + data.last_id + '" ></button>\n' +
                        '                                   ');

                }

            },
            error: function (xhr, status, error) {
                // alert(xhr.responseText);
                // alert('eeeeeeeeee');

            }
        });

        return (false);


    });


    function loadUnreadedMessage() {


        //


        var url =$('#surl').val()+'/messenger/getLastsMessage';
        var data = 'id=' + encodeURIComponent('k');

//        alert(url);


        $.ajax({
            url: url,//   var url=$('#news').attr('action');
            method: 'GET',
            dataType: 'json',// data type that i want to return
            data: data,// var form=$('#news').serialize();
            type: 'GET',           // type of request that will send data
            success: function (data) {
                // alert("xxx");
                $(".unReadedMassages").append(data.messages);
                if (data.countUnreadedMessages != 0) {
                    $("#countUnreadedMessages").text(data.countUnreadedMessages + ' New Messages');
                    $("#countUnreadedMessagesTap").text(data.countUnreadedMessages);
                }
                else {
                    $("#countUnreadedMessages").text('Not there New Messages');
                    $("#countUnreadedMessagesTap").text('');
                }


            },
            error: function (xhr, status, error) {
                // alert(xhr.responseText);
                // alert('eeeeeeeeee');

            }
        });

        return (false);

    }

    loadUnreadedMessage();

    $(document).on('submit', '.newReplayComment', function (event) {

        event.preventDefault();

        var url = $(this).attr('url');
        var commentType = $(this).attr('commentType');

        //  alert(url);


        var form = $(this)[0];

        var formData = new FormData(form);
        //   formData.append('<input type="hidden" name="_token" value="'+csrf_token()+'">')

        //    formData.append('_token', csrf_token());

        // alert(url);
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                // alert(result.commentUl);

                $('.replyCommentText').val('');
                $('.replyCommentImage').val('');
                $('.new-comment-image-holder').children('.pip').remove();
                $(result.commentUl + ' li:last').before(result.replayCommentData);
                //  $(result.commentUl).children().last().append("{{csrf_field()}}");

            },
            error: function (xhr, status, error) {
                // alert(xhr.responseText);
                // alert('eeeeeeeeee');

            }

        });

    });

    var id = $('#loadMorePostsButton').attr('post-id');

    //  alert(id);
    var _token = $('#_token').children('input[name="_token"]').val();

    //  alert(_token);
    $('input[name="_token"]').val();
    var typePosts = $('input[name="typePosts"]').val();
    var userProfileId = $('input[name="userProfileId"]').val();

    if ($('#hasPosts').hasClass('hasPosts'))
        load_moer_post(id, _token);

    function load_moer_post(id, _token) {
        var course_id = $('#loadMorePostsButton').attr('course-id');
        var _token = $('#_token').children('input[name="_token"]').val();
        var data = 'id=' + encodeURIComponent(id) +
            '&_token=' + encodeURIComponent(_token)
            + '&course_id=' + encodeURIComponent(course_id)
            + '&typePosts=' + encodeURIComponent(typePosts)
            + '&userProfileId=' + encodeURIComponent(userProfileId);

        // var url = '/social/loadMorePost';
        var url =$('#surl').val()+'/loadMorePost';


        $.ajax({
            url: url,
            type: 'POST',
            //  dataType:'json',// data type that i want to return
            // data: data,// var form=$('#news').serialize();
            data:{id:id,_token:_token,course_id:course_id,typePosts:typePosts,userProfileId:userProfileId},
            dataType:'json',


            //  data:{id:id,_token:_token},
            // contentType: false,
            // processData: false,
            success: function (data) {
                $('#loadMorePostsButton').remove();


                $('#loadMorePosts').append(data['posts']);



            },
            error: function (xhr, status, error) {
                // alert(xhr.responseText);
                // alert('eeeeeeeeee');

                console.log(xhr.responseText);
            }

        });


    }


    function load_moer_replayComment(id, comment_id, _token) {

        var data = 'id=' + encodeURIComponent(id) + '&comment_id=' + encodeURIComponent(comment_id) + '&_token=' + encodeURIComponent(_token);

        var url =$('#surl').val()+'/loadMoreReplayComment';
        //     alert(url);
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',// data type that i want to return
            data: data,// var form=$('#news').serialize();


            //  data:{id:id,_token:_token},
            // contentType: false,
            // processData: false,
            success: function (data) {
                //   alert('ddddddddddddddd');
                //  $('#loadMorePReplayCommentButton').remove();
                //   $('#ReplayComment'+comment_id).parent().slideToggle("slow");
                $('#ReplayComment' + comment_id + ' #loadMoreReplayButton').remove();
                $('#ReplayComment' + comment_id + ' li:last').before(data.replayComments);
                //  $('#ReplayComment'+comment_id).append(data.replayComments);
                //    $(result.commentUl+' li:last').before(data.replayComments);
                //   $('#ReplayComment'+id).parent().slideToggle("slow");

                //  $(result.commentUl+' li:last').before(result.replayCommentData);
            },
            error: function (xhr, status, error) {
                // alert(xhr.responseText);
                // alert('eeeeeeeeee');

                console.log(xhr.responseText);
            }

        });


    }


    function load_moer_Comment(id, post_id, _token) {

        var data = 'id=' + encodeURIComponent(id) + '&post_id=' + encodeURIComponent(post_id) + '&_token=' + encodeURIComponent(_token);

        var url =$('#surl').val()+'/loadMoreComment';
        //   alert(url);
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',// data type that i want to return
            data: data,// var form=$('#news').serialize();


            //  data:{id:id,_token:_token},
            // contentType: false,
            // processData: false,
            success: function (data) {
                //   alert('ddddddddddddddd');
                //  $('#loadMorePReplayCommentButton').remove();
                //   $('#ReplayComment'+comment_id).parent().slideToggle("slow");
                $('#CommentList' + post_id + ' #loadMoreCommontButton').remove();
                $('#CommentList' + post_id + ' li:last').before(data.Comments);
                //  $('#ReplayComment'+comment_id).append(data.replayComments);
                //    $(result.commentUl+' li:last').before(data.replayComments);
                //   $('#ReplayComment'+id).parent().slideToggle("slow");

                //  $(result.commentUl+' li:last').before(result.replayCommentData);
            },
            error: function (xhr, status, error) {
                // alert(xhr.responseText);
                // alert('eeeeeeeeee');

                console.log(xhr.responseText);
            }

        });


    }


    $(document).on('click', '#loadMorePostsButton', function () {
        var id = $(this).attr('post-id');

        $('#loadMorePostsButton').html('<b> Loading ... </b>');

        load_moer_post(id, _token);
    });


    $(document).on('click', '.comments-button', function () {

        var post_id = $(this).attr('post-id');
        //    $('#loadMorePostsButton').html('<b> Loading ... </b>');

        // Image upload on create post on timeline


        var temp = $('#CommentList' + post_id).children().first();
        var child = temp.attr("class");//
        if (child == "post-comment")
            load_moer_Comment(0, post_id, _token);
    });


    $(document).on('click', '#loadMoreCommontButton', function (event) {
        event.preventDefault();
        var post_id = $(this).attr('post-id');
        var last_id = $(this).attr('last-id');

        $('#loadMoreReplayButton').html('<b> Loading ... </b>');

        load_moer_Comment(last_id, post_id, _token);
    });


    $(document).on('click', '.replyCommentsButton', function () {

        //  alert('xxxxxx');
        //    $(this).parent().parent().parent().next('.replyPostComment').slideToggle("slow");

        var comment_id = $(this).attr('comment-id');
        //    $('#loadMorePostsButton').html('<b> Loading ... </b>');

        // Image upload on create post on timeline


        var temp = $('#ReplayComment' + comment_id).children().first();
        var child = temp.attr("class");//
        // alert(child);
        if (child == "post-comment")
            load_moer_replayComment(0, comment_id, _token);
    });


    $(document).on('click', '#loadMoreReplayButton', function (event) {
        event.preventDefault();
        var comment_id = $(this).attr('comment-id');
        var last_id = $(this).attr('last-id');

        $('#loadMoreReplayButton').html('<b> Loading ... </b>');

        load_moer_replayComment(last_id, comment_id, _token);
    });


});

$(document).on('click', '.buttonD', function () {
    var post_id = $(this).attr('post-id');
    $('#editPostGroupButtons_post_id').val(post_id);
    var RootDiv = $(this).parent().parent().parent().parent();
    var RootDivToReplace = RootDiv.parent();

    //var h=RootDiv.children(0).next();
    var photos = RootDiv.children('.post-meta');// all photos
    var text = RootDiv.children('.description').children('p').text();//post text
    var photoNumber = photos.children('.photos').children('li').length;//number of image
    //  var photo=photos.children('.photos').children('li:nth-child('+(photoNumber)+')');//one image
    var photo_id = photos.children('.photos').children('li:nth-child(' + (photoNumber) + ')').children('a').children('img').attr('id');//one image
    var photos_id = getOldPhoto(photos);


    var newPost = $('#bodyUpdatePostGroup').children('#UpdatePostForm');
    var newPostForm = newPost.find('#UpdatePostForm');

    var newPostFormButtons = newPost.find('#UpdatePostFormBottons');
    var buttonAddFileDiv = newPost.find('.buttonPhotoDiv').first();
    var buttonAddFile = newPost.find('.buttonAddFile').last();
    var fileName = buttonAddFile.val();

    //  text=text.stringValue;
    var newFormText = newPostForm.find('#editor2');
    newFormText.val(text);


    function getOldPhoto(photos) {

        var photos_id = {};
        for (var index = 1; index <= photoNumber; index++) {
            photos.children('.photos').children('li:nth-child(' + (index) + ')').append(' <button type="button"  class="btn btn-danger" id="buttonDeletePostImage"> <i class="fa fa-trash"></i>  </button>\n')
            photos_id[photos.children('.photos').children('li:nth-child(' + (index) + ')').children('a').children('img').attr('id')] =
                photos.children('.photos').children('li:nth-child(' + (index) + ')').children('a').children('img').attr('path');
            //  alert(photos.children('.photos').children('li:nth-child('+(index)+')').children('a').children('img').attr('path'));
        }
        return photos_id;
    }


    $('#UpdatePostForm').submit(function (event) {
        event.preventDefault();
        var photo_id = [];
        /*         var photo_path=[]
         */
        for (var index = 1; index <= photoNumber; index++) {
            /*      photo_path[index-1]= photos.children('.photos').children('li:nth-child('+(index)+')').children('a').children('img').attr('path') ;
             */
            photo_id[index - 1] = photos.children('.photos').children('li:nth-child(' + (index) + ')').children('a').children('img').attr('id');

        }

        var url = $('#UpdatePostForm').attr('action') + '/' + $('#editPostGroupButtons_post_id').val();

        // alert(url);
        // alert(photo_id);


        $('#editPostGroupButtons_image_id').val(photo_id);


        //      var form = $(this).serialize();
        var form = $('#UpdatePostForm')[0];
        var formData = new FormData(form);

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {

                for (var i = 0; i <= validFiles.length; i++) {

                    if (validFiles[i] != null) {
                        var file = new File([validFiles[i]], validFiles[i].name, {type: validFiles[i].type});


                        formData.append('post_images_upload_modified[]', file);
                        // alert('del     '+i);


                        //   form_data.append('file', img.files[0]);


                    }
                }

                validFiles = []; // making array empty
                //formData.delete('file[]');
                //  alert('deleted');
            },
            success: function (result) {

                // alert("has  "+formData.has('post_images_upload_modified[]'));
                // alert("has  file  "+formData.has('file[]'));
                //    alert('sucesssssssssssssssssss');
                //   $('.user_fllower_list ul').prepend(data.userData);
                //


                RootDiv.remove();
                //   replaceChild(,);
                //    alert('sucesssssssssssssssssss');
                RootDivToReplace.prepend(result.PostData);
                // alert('sucesssssssssssssssssss');
                // $('#editPostGroupButtons_image_id').val("");
                // $('#editPostGroupButtons_post_id').val("");
                //     $('#post_images_upload').val("");
                // newFormText.val("");
                // //       alert($('#post_images_upload').val());
                console.log(result.status);
                // location.reload();
                $('#EditPostGroupForm').modal('hide');
            },
            error: function (xhr, status, error) {
                // alert(xhr.responseText);
                // alert('eeeeeeeeee');

            }

        });

    });


    $(document).on('click', '#buttonDeletePostImage', function () {

        $(this).parent().remove();
        photoNumber = photoNumber - 1;

    });

    $('#bodyUpdatePostGroup').append(photos);

    $('#EditPostGroupForm').modal('show');
});
$(document).on('click', '.buttonUpdateBook', function () {

    $('#UpdateBookModle').modal('show');
    var url = $(this).attr('href');

    CKEDITOR.instances['editor2'].setData($(this).attr('info'));

    var book_id = $(this).attr('book-id');

    var Originalinfo = $('#' + book_id);

    //  alert(Originalinfo.text());
    $(document).on('click', '#UpdateBookButtonSave', function () {


        var data = 'describtion=' +CKEDITOR.instances['editor2'].getData();


        $.ajax({
            url: url,//   var url=$('#news').attr('action');
            method: 'GET',
            dataType: 'json',// data type that i want to return
            data: data,// var form=$('#news').serialize();
            type: 'GET',           // type of request that will send data
            beforsend: function () {


            }, success: function (data) {


                if (data.status == true) {

                    Originalinfo.html(CKEDITOR.instances['editor2'].getData());
                    // alert(data.message);
                    $('#UpdateBookModle').modal('hide');
                    MyMassageAlert("موافق", "تم  التعديل بنجاح!", "success", 2000);
                    CKEDITOR.instances['editor2'].setData($(this).attr(''));
                }
                if (data.status == false) {
                    //  alert(data.message);
                }

            }, error: function (data_error, exception) {
                if (exception == "error") {
                    // alert('error');
                }


            }

        });

        return (false);
    });


});


$(document).on('click', '.buttonUpdateComment', function () {

    $('#UpdateCommentModle').modal('show');

    var url = $(this).attr('url');
    var updateCommentEditor = $('#bodyUpdateComment').find('#editor2');
    updateCommentEditor.val($(this).attr('info'));

    var comment_id = $(this).attr('comment-id');

    var Originalinfo = $('#' + comment_id);

    //  alert(Originalinfo.text());


    $(document).on('click', '#UpdateCommentButtonSave', function () {


        var data = 'text=' + encodeURIComponent($('#bodyUpdateComment').find('#editor2').val());


        $.ajax({
            url: url,//   var url=$('#news').attr('action');
            method: 'GET',
            dataType: 'json',// data type that i want to return
            data: data,// var form=$('#news').serialize();
            type: 'GET',           // type of request that will send data
            beforsend: function () {


            }, success: function (data) {


                if (data.status == true) {
                    Originalinfo.text($('#bodyUpdateComment').find('#editor2').val());
                    // alert(data.message);
                    $('#UpdateCommentModle').modal('hide');
                    MyMassageAlert("موافق", "تم  التعديل بنجاح!", "success", 1000);
                    CKEDITOR.instances['editor2'].setData('');
                }
                if (data.status == false) {
                    //  alert(data.message);
                }

            }, error: function (data_error, exception) {
                if (exception == "error") {
                    //alert('error');
                }


            }

        });

        return (false);
    });


});
$(document).on('click', '.buttonUpdateReplayComment', function () {

    $('#UpdateReplayCommentModle').modal('show');

    var url = $(this).attr('url');
    var updateCommentEditor = $('#bodyUpdateReplayComment').find('#editor2');
    updateCommentEditor.val($(this).attr('info'));

    var comment_id = $(this).attr('comment-id');

    var Originalinfo = $('#' + comment_id);

    //  alert(Originalinfo.text());


    $(document).on('click', '#UpdateReplayCommentButtonSave', function () {
        var data = 'text=' + encodeURIComponent($('#bodyUpdateReplayComment').find('#editor3').val());
        $.ajax({
            url: url,//   var url=$('#news').attr('action');
            method: 'GET',
            dataType: 'json',// data type that i want to return
            data: data,// var form=$('#news').serialize();
            type: 'GET',           // type of request that will send data
            beforsend: function () {


            }, success: function (data) {


                if (data.status == true) {
                    Originalinfo.text($('#bodyUpdateReplayComment').find('#editor3').val());
                    // alert(data.message);
                    $('#UpdateReplayCommentModle').modal('hide');
                    MyMassageAlert("موافق", "تم  التعديل بنجاح!", "success", 1000);
                    updateCommentEditor.val('');
                }
                if (data.status == false) {
                    //  alert(data.message);
                }

            }, error: function (data_error, exception) {
                if (exception == "error") {
                    //alert('error');
                }


            }

        });

        return (false);
    });


});

function SP_source() {
    return "{{ surl('/') }}/";
}

$(document).on('click', '.buttonDel', function () {
    var timerInterval = 4;
    Swal.fire({
        title: 'Auto close alert!',
        html:
        'I will close in <strong></strong> seconds.<br/><br/>' +
        '<button id="increase" class="btn btn-warning">' +
        'I need 5 more seconds!' +
        '</button><br/>' +
        '<button id="stop" class="btn btn-danger">' +
        'Please stop the timer!!' +
        '</button><br/>' +
        '<button id="resume" class="btn btn-success" disabled>' +
        'Phew... you can restart now!' +
        '</button><br/>' +
        '<button id="toggle" class="btn btn-primary">' +
        'Toggle' +
        '</button>',
        timer: 10000,
        onBeforeOpen: function () {
            var content = Swal.getContent();
            const $ = content.querySelector.bind(content);

            const stop = $('#stop');
            const resume = $('#resume');
            const toggle = $('#toggle');
            const increase = $('#increase');
            Swal.showLoading();

            function toggleButtons() {
                stop.disabled = !Swal.isTimerRunning();
                resume.disabled = Swal.isTimerRunning();
            }

            stop.addEventListener('click', function () {
                Swal.stopTimer();
                toggleButtons();
            })

            resume.addEventListener('click', function () {


                Swal.resumeTimer();
                toggleButtons();
            })

            toggle.addEventListener('click', function () {
                Swal.toggleTimer()
                toggleButtons()
            })

            increase.addEventListener('click', function () {
                Swal.increaseTimer(5000)
            })

            timerInterval = setInterval(function () {
                    Swal.getContent().querySelector('strong')
                        .textContent = (Swal.getTimerLeft() / 1000)
                        .toFixed(0)
                },
                100
            )
        },
        onClose: function () {
            clearInterval(timerInterval)
        }
    })
});

$(document).on('click', '.buttonDel3', function () {

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false,
    })

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {

            MyMassageAlert(
                'Deleted!',
                'Your file has been deleted.',
                'success', 1000
            )
        } else if (
            // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })

});


$(document).on('click', '#buttonchangePassWord', function () {

    var form = $('#formChangePassword').serialize();
    var url = $('#formChangePassword').attr('action');
    // alert(url);


    $.ajax({
        url: url,//   var url=$('#news').attr('action');
        method: 'POST',
        dataType: 'json',// data type that i want to return
        data: form,// var form=$('#news').serialize();
        type: 'post',           // type of request that will send data
        beforsend: function () {


        }, success: function (data) {
            MyMassageAlert("موافق", "تم تعديل كلمة السر بنجاح!", "success", 1000);


            if (data.status == true) {
                // alert(data.message);
            }
            if (data.status == false) {
                // alert(data.message);
            }

        }, error: function (xhr, status, error) {
            // alert(xhr.responseText);
            // alert('eeeeeeeeee');

        }


    });
    $('#formChangePassword')[0].reset();
    return (false);
});


$(document).on('click', '.UnfollowUserProfile', function () {


    var _this = $("#followingUserProfile");

    var data = 'user1=' + encodeURIComponent($(this).attr('u1id')) + '&user2=' + encodeURIComponent($(this).attr('u2id')) + '&type=' + encodeURIComponent('profile');
    var url =$('#surl').val()+'/UnfollowUser';


    $.ajax({
        url: url,//   var url=$('#news').attr('action');
        method: 'GET',
        dataType: 'json',// data type that i want to return
        data: data,// var form=$('#news').serialize();
        type: 'GET',           // type of request that will send data
        beforsend: function () {

        }, success: function (data) {


            if (data.status == true) {

                var fllowing = _this.prev().prev('span');


                _this.removeClass("UnfollowUserProfile");
                _this.addClass("followingUserProfile");

                _this.text("متابعة");

                fllowing.text(parseInt(fllowing.text()) - 1);

            }
        }, error: function (xhr, status, error) {
            // alert(xhr.responseText);
            // alert('eeeeeeeeee');

        }


    });

    return (false);
});
$(document).on('click', '.followingUserProfile', function () {


    var _this = $("#followingUserProfile");
    var typeFllow = $(this).attr('typeFllow');

    var data = 'user1=' + encodeURIComponent($(this).attr('u1id')) + '&user2=' + encodeURIComponent($(this).attr('u2id')) + '&type=' + encodeURIComponent('profile');
    var url =$('#surl').val()+'/followingUser';
    //data=  data.serialize();


    $.ajax({
        url: url,//   var url=$('#news').attr('action');
        method: 'GET',
        dataType: 'json',// data type that i want to return
        data: data,// var form=$('#news').serialize();
        type: 'GET',           // type of request that will send data
        beforsend: function () {

        }, success: function (data) {


            if (data.status == true) {
                var fllowing = _this.prev().prev('span');

                _this.removeClass("followingUserProfile");
                _this.addClass("UnfollowUserProfile");

                _this.text("الغاء المتابعة ");

                fllowing.text(parseInt(fllowing.text()) + 1);

            }
        }, error: function (xhr, status, error) {
            // alert(xhr.responseText);
            // alert('eeeeeeeeee');

        }

    });

    return (false);
});


$(document).on('click', '.checkLike', function () {


    var this_parent_parent = $(this).parent().parent();
    var this_parent = $(this).parent();

    if (this_parent.hasClass('like')) {


        //  var this_dislike=this_parent.next().children('span:first').children('a:first').children('i:first') ;
        var this_dislike = this_parent_parent.next().next().find('span > a > i:first');
        var this_like = $(this).children('i:first');

    }
    else {

        var this_parent_parent = $(this).parent().parent();
        //  var this_dislike=this_parent.next().children('span:first').children('a:first').children('i:first') ;
        var this_like = this_parent_parent.prev().prev().find('span > a > i:first');
        var this_dislike = $(this).children('i:first');

    }
    var countlike = parseInt(this_like.parent().next('ins').text());
    var countdislike = parseInt(this_dislike.parent().next('ins').text());


    // noLike // no npdislike =0
//like= 1
    //dislike= 2
    var checked = 0;
    var type = 'no';

    if (this_parent.hasClass('like')) {
        //   alert(' like');
        checked = 1;
        if (this_like.hasClass('activeLike')) {
            // alert('was like');
            type = 'no';

            //  alert('well no');
        }

        else if (this_dislike.hasClass('activeLike')) {
            //  alert('was dislike');
            type = 'like';


            //alert('well like');
        }

        else {
            // alert('was no');
            type = 'like';
            //   alert('well like');
        }


    }

    else if (this_parent.hasClass('dislike')) {

        // alert(' dis like');

        checked = 1;
        if (this_like.hasClass('activeLike')) {
            //  alert('was like');
            type = 'dislike';

            //   alert('well dislike');
        }

        else if (this_dislike.hasClass('activeLike')) {
            //  alert('was dislike');
            type = 'no';
            //  alert('well no');
        }

        else {
            //  alert('was no');
            type = 'dislike';
            // alert('well dislike');
        }
    }


// alert($(this).attr('likeType'));


    var data = 'type=' + encodeURIComponent(type) + '&likeType=' + encodeURIComponent($(this).attr('likeType')) + '&user_id=' + encodeURIComponent($(this).attr('uid')) + '&post_id=' + encodeURIComponent($(this).attr('post-id'));

    var table = $(this).attr('table_name');
    //likePostProfile
    var url =$('#surl').val()+'/' + table;
    //data=  data.serialize();

    $.ajax({
        url: url,//   var url=$('#news').attr('action');
        method: 'GET',
        dataType: 'json',// data type that i want to return
        data: data,// var form=$('#news').serialize();
        type: 'GET',           // type of request that will send data
        beforsend: function () {

            // $('.alert_error h1').empty();
            // $('.alert_error ul').empty();

        }, success: function (data) {
// alert(data.status)

            if (data.status == true) {
                if (data.type == "like") {
                    this_like.addClass('activeLike');

                    this_like.parent().next('ins').text(countlike + 1);


                    if (this_dislike.hasClass('activeLike')) {
                        this_dislike.removeClass('activeLike');
                        this_dislike.parent().next('ins').text(countdislike - 1);
                    }


                }

                else if (data.type == "dislike") {

                    this_dislike.addClass('activeLike');
                    this_dislike.parent().next('ins').text(countdislike + 1);

                    if (this_like.hasClass('activeLike')) {
                        this_like.parent().next('ins').text(countlike - 1);
                        this_like.removeClass('activeLike');
                    }


                }
            }
            else {
                if (this_dislike.hasClass('activeLike')) {
                    this_dislike.parent().next('ins').text(countdislike - 1);


                    this_dislike.removeClass('activeLike');
                }

                if (this_like.hasClass('activeLike')) {

                    this_like.parent().next('ins').text(countlike - 1);
                    this_like.removeClass('activeLike');
                }


            }
        }, error: function (xhr, status, error) {
            console.log(xhr.responseText);
            // alert(xhr.responseText);
        }

    });

    return (false);
});


$(document).on('click', '.buttonDeleteBook', function () {

        var id = $(this).attr('book-id');
        var type = $(this).attr('booktype');
        var message = $(this).attr('deleteMessage');
        var this_div = $(this).parent().parent();


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

                var data = 'id=' + encodeURIComponent(id) + '&type=' + encodeURIComponent(type);
                var url =$('#surl').val()+'/delete/' + type + '/' + id;


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

                            MyMassageAlert("موافق", "تم  الحذف بنجاح!", "success", 1000);
                            // messageDoneDelete();

                        }
                    }, error: function (data_error, exception) {
                        if (exception == "error") {
                            MyMassageAlert("موافق", "لم يتم  الحذف !", "error", 1000);

                        }


                    }

                });

                return (false);
            }
            else {

                MyMassageAlert("الغاء", "تم  التراجع عن الحذف بنجاح!", "error", 1000);

            }
        })

    }
);


$(document).on('click', '.buttonDeleteReplyComment', function () {

    var id = $(this).attr('replay-id');
    var url = $(this).attr('url');
    var type = $(this).attr('type');
    var message = $(this).attr('message');
    var this_div = $(this).parent().parent().parent().parent();


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

            var data = 'id=' + encodeURIComponent(id) + '&type=' + encodeURIComponent(type);
            //       var url='deletePost/'+type+'/'+id;

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
                        MyMassageAlert('Done', "تم الحذف بنجاح ", 'success', 1000);
                    }
                }, error: function (data_error, exception) {
                    if (exception == "error") {
                        // Swal.fire("موافق", "لم يتم  الحذف !", "error");


                    }


                }

            });

            return (false);
        }
        else {

            MyMassageAlert('Done', "لم يتم  الحذف ", 'error', 1000);

        }
    })

});

function MyMassageAlert(title, text, type, timer) {
    Swal.fire({
        title: title,
        text: text,
        timer: timer,
        type: type
    });
}


$(document).on('click', '.buttonDeleteConversation', function () {

    var url = $(this).attr('url');
    var message = $(this).attr('message');
    var user_id = $(this).attr('user-id');

    // var this_div= $(this).parent().parent().parent().parent();
    //


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

            var data = 'user_id=' + encodeURIComponent(user_id);
            //       var url='deletePost/'+type+'/'+id;

            $.ajax({
                url: url,//   var url=$('#news').attr('action');
                method: 'GET',
                dataType: 'json',// data type that i want to return
                data: data,// var form=$('#news').serialize();
                type: 'GET',           // type of request that will send data
                beforsend: function () {

                }, success: function (data) {


                    if (data.status == true) {
                        //  this_div.remove();


                        MyMassageAlert("موافق", "تم  الحذف بنجاح!", "success", 1000);

                    }
                }, error: function (data_error, exception) {
                    if (exception == "error") {
                        MyMassageAlert("موافق", "لم يتم  الحذف !", "error", 1000);

                    }


                }

            });

            return (false);
        }
        else {

            MyMassageAlert("الغاء", "تم  التراجع عن الحذف بنجاح!", "error", 1000);

        }
    })

});


$(document).on('click', '.buttonDeletePost', function () {

    var id = $(this).attr('post-id');
    var url = $(this).attr('url');
    var type = $(this).attr('type');
    var message = $(this).attr('message');
    var this_div = $(this).parent().parent().parent().parent().parent().parent();

    // alert(url);

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

            var data = 'id=' + encodeURIComponent(id) + '&type=' + encodeURIComponent(type);
            var url =$('#surl').val()+'/deletePost/' + id;


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


                        MyMassageAlert("موافق", "تم  الحذف بنجاح!", "success", 1000);

                    }
                }, error: function (xhr, status, error) {
                    // alert(xhr.responseText);
                    // alert('eeeeeeeeee');

                }


            });

            return (false);
        }
        else {

            MyMassageAlert("الغاء", "تم  التراجع عن الحذف بنجاح!", "error", 1000);

        }
    })

});


//Image upload trigger on create post    // Change cover button click event
$(document).on('click', '#imageUploadUpdatePost', function (e) {
    e.preventDefault();
    $('.post-images-upload').trigger('click');
    validFiles = []; // making array empty

});


//Image upload trigger on create post    // Change cover button click event
$(document).on('click', '#imageUpload', function (e) {
    e.preventDefault();
    $('.new_post-images').trigger('click');
    validFiles = []; // making array empty

});

// Image upload on create post on timeline
$(document).on('change', '.new_post-images', function (e) {
    e.preventDefault();
    var files = !!this.files ? this.files : [];

    $('.post-images-selected').find('span').text(files.length);
    $('.post-images-selected').show('slow');
    if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

    var countFiles = $(this)[0].files.length;
    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#new-post-image-holder");
    image_holder.empty();
    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof(FileReader) != "undefined") {
            validFiles = [];
            //loop for each file selected for uploaded.
            $.each(files, function (key, val) {
                validFiles.push(files[key]);

                var reader = new FileReader();
                reader.onload = function (e) {
                    var file = e.target;
                    ''
                    $("<span class=\"pip\">" +
                        // " <input type=\"file\"  name=\"newFiles[]\" value=\"" +  e.target.result  + "\"> "+

                        "<img class=\"thumb-image\"  src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<a data-id=" + (key) + " class='remove-thumb'><i class='fa fa-times'></i></a>" +
                        "</span>").appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL(files[key]);
            });
        } else {
            // alert("This browser does not support FileReader.");
        }
    } else {
        // alert("Pls select only images");
    }
});

// Removing selected image here
$('body').on('click', '.remove-thumb', function (e) {
    e.preventDefault()
    var count = 0;
    var files_this = $('#new-post-image-holder');
    var files = !!files_this.files ? files_this.files : [];
    var key = $(this).data('id');
    validFiles[key] = null;

    $(this).parent(".pip").remove();

    $.each(validFiles, function (key, val) {
        if (val != null) {
            count++;

        }

    });

    $('.post-images-selected').find('span').text(count);
});


// Image upload on create post on timeline
$(document).on('change', '.post-images-upload', function (e) {
    e.preventDefault();
    var files = !!this.files ? this.files : [];

    $('.post-images-selected').find('span').text(files.length);
    $('.post-images-selected').show('slow');
    if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support


    var countFiles = $(this)[0].files.length;
    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#post-image-holder");
    image_holder.empty();
    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof(FileReader) != "undefined") {
            validFiles = [];
            //loop for each file selected for uploaded.
            $.each(files, function (key, val) {

                validFiles.push(files[key]);
                var reader = new FileReader();
                reader.onload = function (e) {
                    var file = e.target;
                    ''
                    $("<span class=\"pip\">" +
                        // " <input type=\"file\"  name=\"newFiles[]\" value=\"" +  e.target.result  + "\"> "+

                        "<img class=\"thumb-image\"  src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<a data-id=" + (key) + " class='remove-thumb'><i class='fa fa-times'></i></a>" +
                        "</span>").appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL(files[key]);
            });
        } else {
            // alert("This browser does not support FileReader.");
        }
    } else {
        // alert("Pls select only images");
    }
});

// Removing selected image here
$('body').on('click', '.remove-thumb', function (e) {


    e.preventDefault()
    var count = 0;
    var files_this = $('#post_images_upload');
    var files = !!files_this.files ? files_this.files : [];

    var key = $(this).attr('data-id');
    validFiles[key] = null;

    $(this).parent(".pip").remove();

    $.each(validFiles, function (key, val) {
        if (val != null) {
            count++;


        }

    });

    $('.post-images-selected').find('span').text(count);
});

function readURL(input, imageId) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(imageId).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$('#NewPostForm').submit(function (event) {
    event.preventDefault();

    var url = $(this).attr('action');
    var post_images_upload_modified = []
    // alert(url);

    var form = $(this)[0];
    var formData = new FormData(form);

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            var count = 0;
            // alert(oldFiles);

            for (var i = 0; i < validFiles.length; i++) {
                // if(val != null)
                {

// alert(validFiles[count]);
                    if (validFiles[count] != null)
                        post_images_upload_modified.push(validFiles[count]);
                    // formData.append('post_images_upload_modified[]', val);
                    count++;
                }

            }

            // for(var i=0; i<=validFiles.length; i++){
            //     if(validFiles[i] != null)
            //     {
            //
            //         var file = new File([validFiles[i]], validFiles[i].name  ,{type: validFiles[i].type});
            //         formData.append('post_images_upload_modified[]',  file) ;
            //     }
            // }


            // for(var i=0; i<=validFiles.length; i++){
            //
            //
            //     if(validFiles[i] != null)
            //     {
            //         var file = new File([validFiles[i]], validFiles[i].name  ,{type: validFiles[i].type});
            //
            //
            //       formData.append('post_images_upload_modified[]', file);
            //        // alert('del     '+i);
            //
            //
            //      //   form_data.append('file', img.files[0]);
            //
            //
            //     }
            // }

            validFiles = []; // making array empty
            // alert(formData[newPostButtons_image_id]);
            //  formData.append('post_images_upload_modified', post_images_upload_modified);
            // formData.delete('file[]');

            //  alert('deleted');
        },
        success: function (result) {

            $('#editor1').val('');
            $('#newPost_group_id').val('');
            $('#post_images').val('');
            $('#new-post-image-holder').children().remove();

            $('#loadMorePosts').prepend(result.newpost);

        },
        error: function (xhr, status, error) {
            // alert(xhr.responseText);
            // alert('eeeeeeeeee');

        }

    });

});


function readURL(input, img) {
    var image_holder = $("#post-image-holder");
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var file = e.target;

            ''
            $("<span class=\"pip\">" +
                // " <input type=\"file\"  name=\"newFiles[]\" value=\"" +  e.target.result  + "\"> "+

                "<img class=\"thumb-image\"  src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<a class='remove-commentImage'><i class='fa fa-times'></i></a>" +
                "</span>").appendTo(img);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(document).on('change', '#replyCommentImage', function () {

    var image = $(this).parent().parent().parent('.attachments').next().next('.new-comment-image-holder');
    image.children('.pip').remove();

    //NewCommentImage=this;
    readURL(this, image);


});


$(document).on('change', '#messageFile', function () {

    var image = $(this).parent().parent().parent('.attachments').next().next('.new-comment-image-holder');
    image.children('.pip').remove();

    //NewCommentImage=this;
    readURL(this, image);


});


// Removing selected image here
$('body').on('click', '.remove-commentImage', function (e) {
    e.preventDefault();
    var image = $(this).parent().parent('.new-comment-image-holder').prev().prev('.attachments').children().children().children('#replyCommentImage');
    image.val('');
    $(this).parent(".pip").remove();

});


function pp(_this) {

    window.location.href = _this;
}

/***************************************/
/*
Here is what I ended up doing and it worked great.

First I moved the file input outside of the form so that it is not submitted:

<input name="imagefile[]" type="file" id="takePictureField" accept="image/*" onchange="uploadPhotos(\'#{imageUploadUrl}\')" />
<form id="uploadImageForm" enctype="multipart/form-data">
    <input id="name" value="#{name}" />
    ... a few more inputs ...
</form>
Then I changed the uploadPhotos function to handle only the resizing:

*/

//Then I changed the uploadPhotos function to handle only the resizing:

window.uploadPhotos = function (url) {
    // Read in file
    var file = event.target.files[0];

    // Ensure it's an image
    if (file.type.match(/image.*/)) {
        console.log('An image has been loaded');

        // Load the image
        var reader = new FileReader();
        reader.onload = function (readerEvent) {
            var image = new Image();
            image.onload = function (imageEvent) {

                // Resize the image
                var canvas = document.createElement('canvas'),
                    max_size = 544,// TODO : pull max size from a site config
                    width = image.width,
                    height = image.height;
                if (width > height) {
                    if (width > max_size) {
                        height *= max_size / width;
                        width = max_size;
                    }
                } else {
                    if (height > max_size) {
                        width *= max_size / height;
                        height = max_size;
                    }
                }
                canvas.width = width;
                canvas.height = height;
                canvas.getContext('2d').drawImage(image, 0, 0, width, height);
                var dataUrl = canvas.toDataURL('image/jpeg');
                var resizedImage = dataURLToBlob(dataUrl);
                $.event.trigger({
                    type: "imageResized",
                    blob: resizedImage,
                    url: dataUrl
                });
            }
            image.src = readerEvent.target.result;
        }
        reader.readAsDataURL(file);
    }
};


//As you can see I'm using canvas.toDataURL('image/jpeg'); to change the resized image
// into a dataUrl adn then I call the function dataURLToBlob(dataUrl);
// to turn the dataUrl into a blob that I can then append to the form.
// When the blob is created, I trigger a custom event
// . Here is the function to create the blob:

/* Utility function to convert a canvas to a BLOB */
//
// var dataURLToBlob = function(dataURL) {
//     var BASE64_MARKER = ';base64,';
//     if (dataURL.indexOf(BASE64_MARKER) == -1) {
//         var parts = dataURL.split(',');
//         var contentType = parts[0].split(':')[1];
//         var raw = parts[1];
//
//         return new Blob([raw], {type: contentType});
//     }
//
//     var parts = dataURL.split(BASE64_MARKER);
//     var contentType = parts[0].split(':')[1];
//     var raw = window.atob(parts[1]);
//     var rawLength = raw.length;
//
//     var uInt8Array = new Uint8Array(rawLength);
//
//     for (var i = 0; i < rawLength; ++i) {
//         uInt8Array[i] = raw.charCodeAt(i);
//     }
//
//     return new Blob([uInt8Array], {type: contentType});
// }
//
//
//
//
// /* End Utility function to convert a canvas to a BLOB      */
// //Finally, here is my event handler that takes the blob from the
// // custom event, appends the form and then submits it.
//
// /* Handle image resized events */
// $(document).on("imageResized", function (event) {
//     alert("xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");
//     var data = new FormData($("form[id*='uploadImageForm']")[0]);
//     if (event.blob && event.url) {
//         data.append('image_data', event.blob);
//
//
//         $.ajax({
//             url: event.url,
//             data: data,
//             cache: false,
//             contentType: false,
//             processData: false,
//             type: 'POST',
//             success: function(data){
//                 //handle errors...
//             }
//         });
//     }
// });


$(document).on('click', '.nav_setting', function (event) {

    // event.preventDefault();
    // event.stopPropagation();
    // $(this).attr('disabled',true);
    // $(this).attr('disabled',true);
    // $(this).next('.showMessageInfo').slideToggle("slow");
    // alert($(this).attr('checked'));
    var checked = 1;

    if ($(this).prop('checked') == true)

        checked = 1;
    else
        checked = 0;

    // alert(checked);

    var type = $(this).attr('set_type');
    var nav = $(this).attr('nav');


    var data = 'checked=' + encodeURIComponent(checked) + '&type=' + encodeURIComponent(type);
    var url =$('#surl').val()+'/setting/privacy';
    $.ajax({
        url: url,//   var url=$('#news').attr('action');
        method: 'GET',
        dataType: 'json',// data type that i want to return
        data: data,// var form=$('#news').serialize();
        type: 'GET',           // type of request that will send data
        success: function (data) {

            if (data.status == true) {
                //
                // alert(checked);
                if (checked == 0)
                    $("." + type + '3').prop('checked', false);
                // $("#"+type+nav).prop('checked',false);
                else
                // $("#"+type+nav).prop('checked',true);
                    $(".maatwebsite/excel" + type + '3').prop('checked', true);


            }
        },
        error: function (xhr, status, error) {
            // alert(xhr.responseText);
            // alert('eeeeeeeeee');

        }


    });

    return (false);
});


/////////////////////////////////////*/

//////////

function compress(e) {
    const width = 500;
    const height = 300;
    const fileName = e.target.files[0].name;
    const reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = event => {
        const img = new Image();
        img.src = event.target.result;
        img.onload = () => {
            const elem = document.createElement('canvas');
            elem.width = width;
            elem.height = height;
            const ctx = elem.getContext('2d');
            // img.width and img.height will contain the original dimensions
            ctx.drawImage(img, 0, 0, width, height);
            ctx.canvas.toBlob((blob) => {
                const file = new File([blob], fileName, {
                    type: 'image/jpeg',
                    lastModified: Date.now()
                });
            }, 'image/jpeg', 1);
        },
            reader.onerror = error => console.log(error);
    };
}

////////////

