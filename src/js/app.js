let POST_GLOBAL_INDEX = 0;
let POST_GLOBAL_SIZE = 0;
let POST_GLOBAL_PROFILE = $("main").siblings("#profile").attr("id") == "profile";
let POST_GLOBAL_USER = "";

$(document).ready(() => {
    $.get("../src/php/getLoggedUserID.php", data => {
        POST_GLOBAL_USER = JSON.parse(data).id;
        loadPosts(POST_GLOBAL_INDEX, POST_GLOBAL_PROFILE)
    })
});

if($('#open-chat')){
    function getMessages(){
        $.get("../src/php/chat.php", function(response){
            $('#chat-content').html(response)
        })
    }
    setInterval(getMessages, 10000)
    $('#open-chat').click(function(){
        getMessages()
    })
    $('#send-message').click(function()
        {$.get("../src/php/getLoggedUserID.php", data => {
            const user = JSON.parse(data);
            $.ajax({
                url:"../src/php/chat.php",
                method:"POST",
                data:{
                    text:$('#new-message').val(),
                    emitter:user.username
                },
                success:function(response){
                    $('#chat-content').html(response)
                    $('#new-message').val('')
                }
            })
        })
    })
}

if (document.getElementById("profile")) {
    //-----------------------------------Modal to add a post----------------------------------//
    const closeModals = document.getElementById("close-modals");
    const modalPost = document.getElementById("modal-post");
    const newPost = document.getElementById("new-post");

    //---------------------------------Home redirect button in header----------------------------//

    $('#home-redirect').click(function(){
        location.href = "../general_wall/"
    })

    $(modalPost).css({
        display: "none",
        position: "absolute",
        top: newPost.offsetTop + "px",
        left: "50vw",
        transform: "translateY(-50%) translateX(-50%)",
        zIndex: "2",
    });
    $("#modal-post-box").css("background-color", "whitesmoke");
    $(newPost).click(function () {
        $(closeModals).toggle();
        $(modalPost).toggle();
        $(modalPost).animate({
            opacity: 1,
            top: newPost.offsetTop + "px",
        }, {
            duration: 500,
            easing: "linear",
        });
    });
    $(closeModals).click(function () {
        $(closeModals).toggle();
        $(modalPost).animate({
            opacity: 0,
            top: "0%",
        }, {
            duration: 500,
            easing: "linear",
            complete: function () {
                $(this).toggle();
            },
        });
    });

    $.get("../src/php/getLoggedUserID.php", data => {
        const user = JSON.parse(data);
        $("#profile").prepend(`
            <div class="d-flex justify-content-center py-4">
                <div id="profile-photo" class="rounded-circle screen-third" style="background-image: url('${user.picturePath}')"></div>
            </div>
            <div class="d-flex justify-content-center py-4">
                <h1 id="profile-name">${user.username}</h1>
            </div>
            <div class="d-flex justify-content-center">
                <p id="profile-description">${user.description}</p>
            </div>
        `)
    })
}else if(document.getElementById('general-wall')){
    $('#profile-redirect').attr("href","../personal-wall/profile.php")
    
    //---------------------------------Home redirect buttons in header----------------------------//

    $('#home-redirect').click(function(){
        location.href = "index.php"
    })

    $('#update-redirect').attr("href","../personal-wall/configuration.php")  
}else{
    
    //---------------------------------Home redirect button in header----------------------------//

    $('#home-redirect').click(function(){
        location.href = "../general_wall/"
    })

    //---------------------Change data profile photo by gallery image click----------------------//

    $('#gallery').children().click(function(){
        const profilePhoto = document.getElementById('profile-photo')
        profilePhoto.style.backgroundImage = event.currentTarget.style.backgroundImage
        profilePhoto.dataset.id = event.currentTarget.dataset.id
        document.getElementById('portrait-id').value = profilePhoto.dataset.id
    })
}

if($('#formUpdateUser')){
    $('#formUpdateUser').children('div').children('div').children('button').click(function(){
        const parent = event.currentTarget.parentElement
        const child = $(parent).children('input')
        if(child.prop("disabled")){
            $('#formUpdateUser').children('div').children('div').children('input').prop("disabled","true")
            $('#formUpdateUser').children('div').children('div').children('button').html('<i class="fas fa-pen"></i>&nbsp;Edit')
            .removeClass('text-warning')
            event.currentTarget.classList.add('text-warning')
            event.currentTarget.innerHTML = '<i class="fas fa-window-close"></i>&nbsp;Cancel'
            child.prop("disabled",false)  
        }else{
            event.currentTarget.innerHTML = '<i class="fas fa-pen"></i>&nbsp;Edit'
            event.currentTarget.classList.remove('text-warning')
            child.prop("disabled",true)
        }
        child.toggleClass("text-muted")  
        child.focus()
    })
}

//----------------------------Print posts in profile--------------------------------------//

function printPost(data) {}

//----------------------------Get data by filter-----------------------------------------//

function getData(filters, url, callback) {
    $.ajax({
        url: url,
        method: "POST",
        data: filters,
        success: function (response) {
            callback(response);
        },
    });
}

//-----------------------------Modal to update user data----------------------------------//

$("#formUpdateUser").submit(function (e) {
    e.preventDefault();
    $(this).find('input').prop("disabled",false)
    data = $(this).serialize();
    console.log(data)
    $.ajax({
        method: "POST",
        url: "control-data/update-validation.php",
        data: data,
        success: function (data) {console.log(data)},
    });
    
    $(this).children('div').children('div').children('input').prop("disabled",true)
});

//----------------------------- General wall ----------------------------------//

// Load posts
function loadPosts(index = 0, profile = false) {
    POST_GLOBAL_INDEX += 10;

    $.post("../general_wall/getPosts.php", {
        index: index,
        profile: profile
    }, (data) => {
        const posts = JSON.parse(data);

        if(posts.length == 0) { 
            POST_GLOBAL_INDEX = 0;
            $("#more-posts-btn").hide();
            return;
        }

        if (index < 10) {
            $(".post-container").remove();
            POST_GLOBAL_SIZE = posts[0].id;
            if(POST_GLOBAL_SIZE <= POST_GLOBAL_INDEX) $("#more-posts-btn").hide();
        }

        if(profile){
            if(posts[posts.length-1].last) {
                POST_GLOBAL_INDEX = 0;
                $("#more-posts-btn").hide();
            }
        }

        for (const post of posts) {
            let newStyle = "";
            if(post.userID == POST_GLOBAL_USER) newStyle = "bg-light border-primary";

            $(".post-wrapper").append(`
            <div class="post-container border rounded p-3 mb-3 shadow ${newStyle}" data-postID="${post.id}">
               <div class="w-100 text-center">
                <img src="${post.postImage}" alt=""
                    class="img-fluid border w-100">
               </div>
                <div class="post-content-container p-3 mt-3 border rounded">
                    <div class="row mx-auto">
                        <div class="float-left p-0 mr-3">
                            <div class="img-cont rounded-circle border border-light" style="background-image: url('${post.userImage}')"></div>
                        </div>
                        <div class="my-auto text-left">
                            <p class="m-0 font-weight-bold text-capitalize name-box">
                                ${post.userName}
                            </p>
                            <p class="m-0">
                                <small>${post.dateFormated}</small>
                            </p>
                        </div>
                    </div>
                    <div class="row mx-auto mt-3">
                        <p class="m-0 text-justify">
                            ${post.content}
                        </p>
                    </div>
                </div>
                <div class="row mt-2 px-3 justify-content-end">
                    <div class="num-likes mx-1">
                        <p class="m-0 d-inline">${post.likes}</p>
                        <i class="${post.isLike ? "fas" : "far"} fa-heart icon-like ${post.isLike}" data-postID="${post.id}"></i>
                        <!-- <i class="fas fa-heart"></i> -->
                    </div>
                    <div class="num-comments mx-1">
                        <p class="m-0 d-inline">${post.comments}</p>
                        <i class="far fa-comment-alt" data-postID="${post.id}"></i>
                        <!-- <i class="fas fa-comment-alt"></i> -->
                    </div>
                </div>
            </div>
            `);
        }
    });

    /**/
}

//Load more posts button
$("#more-posts-btn").click(e => {
    loadPosts(POST_GLOBAL_INDEX, POST_GLOBAL_PROFILE);
    if (POST_GLOBAL_INDEX > POST_GLOBAL_SIZE) $("#more-posts-btn").hide()
})

// Toggle GIF modal
$("#gif-button").on("click", function () {
    const cont = $(".gif-img-cont");
    cont.toggleClass("d-none");
    $("#gif-input").val("");

    if (!cont.hasClass("d-none")) loadGifs();
});

//Search gif
let gifReqTimeout;
$("#gif-input").on("input", (e) => {
    clearTimeout(gifReqTimeout);
    gifReqTimeout = setTimeout(
        () => loadGifs($(e.target).val().replace(/\s/g, "+")),
        400
    );
});

//Function to load gifs
function loadGifs(search = "") {
    const box = $(".gif-box");
    $(".gif-element").remove();

    box.append(
        `<img class="gif-element" src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fstatic.onemansblog.com%2Fwp-content%2Fuploads%2F2016%2F05%2FSpinner-Loading.gif&f=1&nofb=1" alt="Loading..." Width="170px" style="border:none">`
    );
    $.post(
        "../general_wall/getGifs.php", {
            search: search,
        },
        (data) => {
            const gifs = JSON.parse(data).data;
            $(".gif-element").remove();
            console.log(gifs);
            for (const gif of gifs)
                box.append(`<img class="gif-element" src="${gif.images.preview_gif.url}" data-src="${gif.images.downsized.url}" alt="${gif.title}" Width="170px">`);

            $(".gif-element").click((e) => {
                $("#img-new-post").attr("src", "");
                $("#img-new-post").attr("src", e.target.dataset.src);
                $("#img-new-post").removeClass("d-none");
                $(".gif-img-cont").toggleClass("d-none");
            });
        }
    );
}


// Create new post
$("#post").click((e) => {
    const text = $("#modal-post-box").find("textarea").val();
    const multimedia = $("#img-new-post").attr("src");

    if (text.length == 0 && multimedia.length == 0) return;

    $.post("../general_wall/newPost.php", {
        text: text,
        image: multimedia
    }, data => {
        POST_GLOBAL_INDEX = 0;
        $("#more-posts-btn").show();
        loadPosts(POST_GLOBAL_INDEX, POST_GLOBAL_PROFILE);

        $("#modal-post-box").find("textarea").val("");
        $("#img-new-post").attr("src", "");
    })
})

// Preview loaded image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#img-new-post").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#post-image").change(function () {
    readURL(this);

    if ($("#img-new-post").hasClass("d-none")) {
        $("#img-new-post").removeClass("d-none");
    } else {
        $("#img-new-post").addClass("d-none");
    }
});

/* ------ LIKE AND COMMENT ICONS ------ */

$(".post-wrapper").on("click", ".icon-like", function () {
    $(this).toggleClass("active far fas");
    clickLike($(this));
});

function clickLike(heart) {
    let count = parseInt($(heart).prev().text());
    let data;

    if (!$(heart).hasClass("active")) {
        $(heart)
            .prev()
            .text(--count);
        data = {
            "post-id": $(heart).attr("data-postid"),
            "like": "remove",
        };
    } else {
        $(heart)
            .prev()
            .text(++count);
        data = {
            "post-id": $(heart).attr("data-postid"),
            "like": "add",
        };
    }

    $.ajax({
        url: "../general_wall/actions/click-like.php",
        method: "POST",
        data: data
    });
}

// Event listener to show/hide comments
$(".post-wrapper").on("click", ".fa-comment-alt", function (e) {
    if ($(this).hasClass('open')) {
        $(this).removeClass('open');
        $(this).parent().parent().removeClass('border-bottom');
        $(this).parent().parent().siblings().each(function () {
            if ($(this).hasClass('input-comment') || $(this).hasClass('comment')) {
                $(this).remove();
            }
        });
    } else {
        $(this).addClass('open');
        let inputComment = createInputComment();
        inputComment.insertAfter($(this).parent().parent());
        $(this).parent().parent().addClass('border-bottom');

        // Request object with required info using ajax
        const postId = $(this).parent().parent().parent().data('postid');
        const origin = "posts";
        $.post(
            "../general_wall/getComments.php", {
                postId: postId,
                origin: origin,
            },
            (data) => {
                // console.log(data);
                let myComments = JSON.parse(data);
                // console.log(myComments);
                for (let i = 0; i < myComments.length; i++) {
                    let myComment = createComment(myComments[i]);
                    myComment.insertAfter($(e.target).parent().parent().next());
                }
            }
        );
    }
});

// Event listeners to toggle comment icon
$(".post-wrapper").on("mouseenter", ".fa-comment-alt", function () {
    $(this).removeClass("far");
    $(this).addClass("fas");
});
$(".post-wrapper").on("mouseleave", ".fa-comment-alt", function () {
    $(this).removeClass("fas");
    $(this).addClass("far");
});

// Event listener to add new comment
$(".post-wrapper").on("click", ".btn-new-comment", function (e) {
    e.preventDefault();
    let textAreaVal = $(e.target).parent().parent().prev().children().eq(0).val();
    if (textAreaVal != "") {
        let postId = $(e.target).parent().parent().parent().parent().data('postid');
        let postContent = textAreaVal;
        $.post(
            "../general_wall/newComment.php", {
                postId: postId,
                postContent: postContent,
                origin: "posts"
            },
            (data) => {
                // console.log(data);
                let newComment = JSON.parse(data);
                // console.log(newComment);
                let commentBox = createComment(newComment);
                commentBox.insertAfter($(e.target).parent().parent().parent());
                let numComments = parseInt($(e.target).parent().parent().parent().prev().children().eq(1).children().eq(0).text());
                $(e.target).parent().parent().parent().prev().children().eq(1).children().eq(0).text(numComments + 1);
            }
        );
        // Clear text area at the end of the process
        $(e.target).parent().parent().prev().children().eq(0).val('');
    }
})

// Helper functions

function createComment(commentObj) {
    let wrapper = $("<div>");
    wrapper.addClass("border mt-2 p-3 comment");
    let innerCont = $("<div>");
    innerCont.addClass("comment-content-container p-3 border");
    innerCont.appendTo(wrapper);
    let profileDiv = $("<div>");
    profileDiv.addClass("row mx-auto");
    profileDiv.appendTo(innerCont);
    let picContDiv = $("<div>");
    picContDiv.addClass("float-left p-0 mr-3");
    picContDiv.appendTo(profileDiv);
    let picDiv = $("<div>");
    let picPath = commentObj.authorPictureUrl;
    picDiv.addClass("img-cont rounded-circle border border-light");
    picDiv.css({
        "background-image": "url(" + picPath + ")",
        "background-repeat": "no-repeat",
        "background-size": "cover",
        "background-position": "center",
    });
    picDiv.appendTo(picContDiv);
    let nameContDiv = $("<div>");
    nameContDiv.addClass("my-auto text-left");
    nameContDiv.appendTo(profileDiv);
    let name = $("<p>");
    name.addClass("m-0 font-weight-bold text-capitalize name-box");
    name.text(commentObj.authorName);
    name.appendTo(nameContDiv);
    let creation = $("<p>");
    // creation.addClass("m-0");
    let small = $('<small>');
    small.text(commentObj.creationDate);
    small.appendTo(creation);
    // creation.text(commentObj.creationDate);
    creation.appendTo(nameContDiv);
    let commentDiv = $("<div>");
    commentDiv.addClass("row mx-auto mt-3");
    commentDiv.appendTo(innerCont);
    let commentContent = $("<div>");
    commentContent.addClass("m-0 text-justify");
    commentContent.text(commentObj.content);
    commentContent.appendTo(commentDiv);
    return wrapper;
}

function createInputComment() {
    let wrapper = $('<div>');
    wrapper.addClass('border mt-3 p-3 input-comment bg-light');

    let textCont = $('<div>');
    textCont.addClass('row mx-0');
    textCont.appendTo(wrapper);
    let textArea = $('<textarea>');
    textArea.addClass('border p-2 rounded');
    textArea.attr('cols', '100');
    textArea.attr('rows', '2');
    textArea.attr('placeholder', 'Write a comment...');
    textArea.appendTo(textCont);

    let buttonCont = $('<div>');
    buttonCont.addClass('row mx-0 mt-2 d-flex justify-content-end align-items-start');
    buttonCont.appendTo(wrapper);
    let buttonWrapper = $('<div>');
    buttonWrapper.addClass('buttons-block-2');
    buttonWrapper.appendTo(buttonCont);
    let button = $('<button>');
    button.addClass('btn btn-primary btn-new-comment');
    button.attr('type', 'submit');
    button.text('Reply');
    button.appendTo(buttonWrapper);
    return wrapper;
}