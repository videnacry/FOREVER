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