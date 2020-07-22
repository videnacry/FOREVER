$(document).ready(() => loadPosts());

if (document.getElementById("profile")) {

    //-----------------------------------Modal to add a post----------------------------------//
    const closeModals = document.getElementById('close-modals')
    const modalPost = document.getElementById('modal-post')
    const newPost = document.getElementById('new-post')

    $(modalPost).css({
        display: "none",
        position: "absolute",
        top: newPost.offsetTop + "px",
        left: "50vw",
        transform: "translateY(-50%) translateX(-50%)",
        zIndex: "2"
    })
    $("#modal-post-box").css("background-color","whitesmoke")
    $(newPost).click(function () {
        $(closeModals).toggle()
        $(modalPost).toggle()
        $(modalPost).animate({
            opacity: 1,
            top: newPost.offsetTop + "px"
        }, {
            duration: 500,
            easing: "linear",
        })
    })
    $(closeModals).click(function () {
        $(closeModals).toggle()
        $(modalPost).animate({
            opacity: 0,
            top: "0%"
        }, {
            duration: 500,
            easing: "linear",
            complete: function () {
                $(this).toggle()
            }
        })
    })

}

//----------------------------Print posts in profile--------------------------------------//

function printPost(data) {

}

//----------------------------Get data by filter-----------------------------------------//

function getData(filters, url, callback) {
    $.ajax({
        url: url,
        method: "POST",
        data: filters,
        success: function (response) {
            callback(response)
        }
    })
}

//-----------------------------Modal to update user data----------------------------------//

$("#formUpdateUser").submit(function (e) {
    e.preventDefault()
    data = $(this).serialize();
    $.ajax({
        method: "POST",
        url: "control-data/update-validation.php",
        data: data,
        success: function (data) {
        }
    })
})
// Get input boxes
// const ele1 = document.getElementById('post-box');
// const ele2 = document.getElementById('comment-box');

// Get the placeholder attributes
// const placeholder1 = ele1.getAttribute('data-placeholder');
// const placeholder2 = ele2.getAttribute('data-placeholder');

// Set the placeholder as initial content if it's empty
// ele1.innerHTML = placeholder1;
// ele2.innerHTML = placeholder2;

// Add event listeners
// Focus
// ele1.addEventListener('focus', function (e) {
//   const value = e.target.innerHTML;
//   value === placeholder1 && (e.target.innerHTML = '');
// });
// ele2.addEventListener('focus', function (e) {
//   const value = e.target.innerHTML;
//   value === placeholder2 && (e.target.innerHTML = '');
// });
// Blur
// ele1.addEventListener('blur', function (e) {
//   const value = e.target.innerHTML;
//   value === '' && (e.target.innerHTML = placeholder1);
// });
// ele2.addEventListener('blur', function (e) {
//   const value = e.target.innerHTML;
//   value === '' && (e.target.innerHTML = placeholder2);
// });

// Replace inserted "div" in content-editable with "p"
// document.execCommand('defaultParagraphSeparator', false, 'p');

// Test
// $('#post').on('click', function (e) {
//   e.preventDefault();
//   console.log($('#post-box').html());
//   $('#post-box').text($('#post-box').data('placeholder'));
// $('#test').html(($(this).parent().parent().prev().children().eq(0).html()));
// })


//----------------------------- General wall ----------------------------------//

// Load posts
function loadPosts(index=0) {
    if(index < 10) $(".post-container").remove();

    $.post("../general_wall/getPosts.php", { index: index }, data => {
        const posts = JSON.parse(data);

        for(const post of posts) {
            $(".post-wrapper").append(`
            <div class="post-container border rounded p-3 mb-3 shadow" data-postID="${post.id}">
               <div class="w-100 text-center">
                <img src="${post.postImage}" alt=""
                    class="img-fluid border ">
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
                        <i class="far fa-heart icon-like" data-postID="${post.id}"></i>
                        <!-- <i class="fas fa-heart"></i> -->
                    </div>
                    <div class="num-comments mx-1">
                        <p class="m-0 d-inline">${post.comments}</p>
                        <i class="far fa-comment-alt"></i>
                        <!-- <i class="fas fa-comment-alt"></i> -->
                    </div>
                </div>
            </div>
            `)
        }
    })

/**/
}

// Toggle GIF modal
$('#gif-button').on('click', function () {
    const cont = $('.gif-img-cont');
    cont.toggleClass("d-none");
    $("#gif-input").val("");

    if (!cont.hasClass("d-none")) loadGifs();
})

//Search gif
let gifReqTimeout;
$("#gif-input").on("input", e => {
    clearTimeout(gifReqTimeout);
    gifReqTimeout = setTimeout(() => loadGifs($(e.target).val().replace(/\s/g, "+")), 400)
});

//Function to load gifs
function loadGifs(search = "") {
    const box = $('.gif-box');
    $(".gif-element").remove();
    
    box.append(`<img class="gif-element" src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fstatic.onemansblog.com%2Fwp-content%2Fuploads%2F2016%2F05%2FSpinner-Loading.gif&f=1&nofb=1" alt="Loading..." Width="170px" style="border:none">`);
    $.post("../general_wall/getGifs.php", { search: search }, data => {
        const gifs = JSON.parse(data).data;
        $(".gif-element").remove();
        console.log(gifs)
        for(const gif of gifs) 
            box.append(`<img class="gif-element" src="${gif.images.preview_gif.url}" data-src="${gif.images.downsized.url}" alt="${gif.title}" Width="170px">`);
    
        $(".gif-element").click(e => { 
            $('#img-new-post').attr('src', "")
            $('#img-new-post').attr('src', e.target.dataset.src)
            $('#img-new-post').removeClass("d-none");
            $('.gif-img-cont').toggleClass("d-none");
        })
    })
}

// Create new post
$("#post").click(e => {
    const text = $("#modal-post-box").find("textarea").val();
    const multimedia = $("#img-new-post").attr("src");

    $.post("../general_wall/newPost.php", {
        text: text,
        image: multimedia
    }, data => {
        loadPosts();
        $("#modal-post-box").find("textarea").val("");
        $("#img-new-post").attr("src", "");
    })
})

// Preview loaded image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img-new-post').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#post-image").change(function () {
    readURL(this);

    if ($('#img-new-post').hasClass('d-none')) {
        $('#img-new-post').removeClass('d-none');
    } else {
        $('#img-new-post').addClass('d-none');
    }
});


/* ------ LIKE AND COMMENT ICONS ------ */

$(".post-wrapper").on("click", ".icon-like", function(){
   $(this).toggleClass("active far fas")
   clickLike($(this))
})

function clickLike(heart){
   let count = parseInt($(heart).prev().text())
   let data

   if($(heart).hasClass("active")){
      $(heart).prev().text(++count)
      data = {
         "post-id" : $(heart).attr("data-postid"),
         "like" : "add"
      }
   }else{
      $(heart).prev().text(--count)
      data = {
         "post-id" : $(heart).attr("data-postid"),
         "like" : "remove"
      }
   }

   $.ajax({
      url: "../general_wall/actions/click-like.php",
      method: "POST",
      data: data,
      success: function (response) {
          console.log(response);
      }
  })
}