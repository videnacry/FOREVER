//-----------------------------------Modal to add a post----------------------------------//
const closeModals = document.getElementById('close-modals')
const modalPost = document.getElementById('modal-post')

$(modalPost).css({
    display:"none",
    position:"fixed",
    top:"0vh",
    left:"50vw",
    transform:"translateY(-50%) translateX(-50%)",
    zIndex:"1"
})
$('#update-profile').click(function(){
    $('#modal-update-user').modal('toggle')
})
$('#new-post').click(function(){
    $(closeModals).toggle()
    $(modalPost).toggle()
    $(modalPost).animate({
        opacity:1,
        top:"50%"
    }, {
        duration: 500,
        easing:"linear",
    })
})
$(closeModals).click(function(){
    $(closeModals).toggle()
    $(modalPost).animate({
        opacity:0,
        top:"0%"
    }, {
        duration: 500,
        easing:"linear",
        complete:function(){
            $(this).toggle()
        }
    })
})

//----------------------------Print posts in profile--------------------------------------//

function printPost(data){
    
}

//----------------------------Get data by filter-----------------------------------------//

function getData(filters,url,callback){
    $.ajax({
        url=url,
        method="POST",
        data=filters,
        success=function(response){
            callback(response)
        }
    })
}

//-----------------------------Modal to update user data----------------------------------//

const { data } = require("jquery")

$("#formUpdateUser").submit(function(e){
   e.preveventDefault()
   data = $(this).serialize();
   $.ajax({
      method: "POST",
      url: "update-user.php",
      data: data,
      success: function(data){
         
      }
   })
})