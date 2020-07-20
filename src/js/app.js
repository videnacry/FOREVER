$('#modal-post').css({
    display:"none",
    position:"fixed",
    top:"50vh",
    left:"50vw",
    transform:"translateY(-50%) translate(-50%)",
    zIndex:"1"
})
$('#update-profile').click(function(){

})
$('#new-post').click(function(){
    $('#close-modals').toggle()
    $('#modal-post').toggle()
})