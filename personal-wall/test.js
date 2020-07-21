

$("#formUpdateUser").submit(function(e){
   e.preventDefault()
   data = $(this).serialize();
   console.log(data);
   $.ajax({
      method: "POST",
      url: "update-validation.php",
      data: data,
      success: function(data){
         console.log(data);
      }
   })
})