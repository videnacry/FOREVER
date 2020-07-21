
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
