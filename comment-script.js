$(document).ready(function () {
    let offset = 0;
    const limit = 20;
    function loadallComments() {
        let vardai_id = $("#vardai_id").val();
        console.log("Loading comments");
        $.ajax({
            url: "../fetch_comments.php",
            type: "GET",

            data: { action: 'allcomment', vardai_id: vardai_id },
            success: function (data) {
                const allcomments = JSON.parse(data);
                $("#totalcommentscount").text(allcomments.total)
            }
        })

    }
    loadallComments();
    function loadComments() {
        let vardai_id = $("#vardai_id").val();
        console.log("Loading comments");
        $.ajax({
            url: "../fetch_comments.php",
            type: "GET",

            data: { offset: offset, limit: limit, vardai_id: vardai_id },
            success: function (data) {
                const comments = JSON.parse(data);

                if (comments.length > 0) {
                    comments.forEach((comment) => {
                        var commentElement = ``;
                        if (comment.type === "positive") {
                            commentElement += `<div class="media comment" data-id="${comment.id}" data-type="${comment.type}" style="    border-left-color: #78e08f !important;
                            border-left-width: 5px !important;
                            border-left: 5px solid;">`
                        } else if (comment.type === "negative") {
                            commentElement += `<div class="media comment" data-id="${comment.id}" data-type="${comment.type}" style="    border-left-color: #ce4844 !important;
                            border-left-width: 5px !important;
                            border-left: 5px solid;">`
                        } else if (comment.type === "neutral") {
                            commentElement += `<div class="media comment" data-id="${comment.id}" data-type="${comment.type}" style="    border-left-color: #747d8c !important;
                            border-left-width: 5px !important;
                            border-left: 5px solid;">`
                        } else if (comment.type === "question") {
                            commentElement += `<div class="media comment" data-id="${comment.id}" data-type="${comment.type}" style="    border-left-color: #f6b93b !important;
                            border-left-width: 5px !important;
                            border-left: 5px solid;">`
                        }
                        commentElement += `<img src="../assets/images/3.png" class="img-fluid rounded-circle comment-author-avatar" alt>
                        <div class="media-body">
                            <div class="media-body-header">
                                <div>
                                    <h6 class="comment-author">${comment.name}</h6>
                                    <p class="comment-date">${comment.date_created}</p>
                                </div>
                        `;
                        if (comment.type === "positive") {
                            commentElement += `<a href="#" class="reply-btn" style="color:#78e08f !important">Positive review</a>`;
                        } else if (comment.type === "negative") {
                            commentElement += `<a href="#" class="reply-btn" style="color:#ce4844 !important">Negative review</a>`;
                        } else if (comment.type === "neutral") {
                            commentElement += `<a href="#" class="reply-btn" style="color:#747d8c !important">Neutral review</a>`;
                        } else if (comment.type === "question") {
                            commentElement += `<a href="#" class="reply-btn" style="color:#f6b93b !important">Question review</a>`;
                        }
                        commentElement += `</div>
                        <p class="comment">${comment.comment}
<hr>
                                    <button class="btn like btn-primary" style="min-width: 6rem;
    padding: 0.3rem 1rem; color: #31a600;
    background: #dfffd9; font-size: 13px; border:0px;"><i class="lar la-thumbs-up"></i> Like (<span class="likes ldcount">${comment.likes}</span>)</button>
    <button class="btn dislike btn-danger" style="min-width: 6rem;
    padding: 0.3rem 1rem; color: #b60000;
    background: #ffd9d9; font-size: 13px; border:0px;"><i class="lar la-thumbs-down"></i> Dislike (<span class="dislikes ldcount">${comment.dislikes}</span>)</button>
                                </p>
                            </div>
                        </div>
`

                        $(".article-comments").append(commentElement);
                    });
                    offset += limit;

                    if (comments.length < limit) {
                        $("#loadMore").hide();
                    } else {
                        $("#loadMore").show();
                    }
                } else {
                    $(".article-comments").append(`<h3 id="nocomment">No comments found</h3>`);
                    $("#loadMore").hide();
                }
            },
        });
    }

    loadComments();

    $("#loadMore").click(function () {
        loadComments();
    });

    $("#submit-comment").on("click", function () {

        $(".errormsg").remove();
        const vardai_id = $("#vardai_id").val();
        const name = $("#name").val();
        const email = $("#email").val();
        const comment = $("#comment-message").val();
        const type = $("input[type='radio'][name='rating']:checked").val();

        var recaptchaResponse = grecaptcha.getResponse();

            if (recaptchaResponse.length === 0) {
                // reCAPTCHA is not solved
                
                $(".g-recaptcha").after('<div class="errormsg text-danger">Please solve the reCAPTCHA.</div>');
                
                
            }else if (name.length < 1) {
            $("#name").after('<div class="errormsg text-danger">Please Enter Name</div>');
            $("#name").focus();
        } else if (email.length < 1) {
            $("#email").after('<div class="errormsg text-danger">Please Enter Email</div>');
            $("#email").focus();
        } else if (!type) {
            $("input[type='radio'][name='rating']").parent().parent().after('<div class="errormsg text-danger">Please Select type</div>');

        } else {




            $.ajax({
                url: "../post-comment.php",
                type: "POST",
                data: {
                    vardai_id: vardai_id,
                    name: name,
                    email: email,
                    comment: comment,
                    type: type,
                    recaptcha:grecaptcha.getResponse()
                },
                success: function (response) {
                    const res = JSON.parse(response);
                    if (res.status === "success") {
                        //   $("#message").html("<p>" + res.message + "</p>");
                        $("#name").val("");
                        $("#email").val("");
                        $("#comment-message").val("");
                        $("input[type='radio'][name='rating']:checked").prop("checked", false);
                          grecaptcha.reset();

                        Swal.fire({
                            title: 'Thank You',
                            text: res.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
            
                        $('#nocomment').remove();
            
                        offset = 0;
                        $("#commentList").empty();
                        loadComments();
                        loadallComments();

                        $('#medical-tab').tab('show');
                    } else {
                        if(res.message.indexOf('reCaptcha')!=0){
                            grecaptcha.reset();
                        }

                        Swal.fire({
                            title: 'Oops!',
                            text: res.message,
                            icon: 'warning',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                },
            });
        }
    });

    $(".article-comments").on("click", ".like, .dislike", function () {
        const commentId = $(this).closest(".comment").data("id");
        const voteType = $(this).hasClass("like") ? "like" : "dislike";

        $.ajax({
            url: "../vote_comment.php",
            type: "POST",
            data: {
                comment_id: commentId,
                vote_type: voteType,
            },
            success: function (response) {
                const res = JSON.parse(response);
                if (res.status === "success") {
                    Swal.fire({
                        title: 'Thank You',
                        text: res.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    const voteCount = $(this).find(".ldcount");
                    voteCount.text(parseInt(voteCount.text()) + 1);
                    $(this).prop("disabled", true);

                } else {
                    Swal.fire({
                        title: 'Sorry!',
                        text: res.message,
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 1500
                    })

                }
            }.bind(this),
        });

    });

});    