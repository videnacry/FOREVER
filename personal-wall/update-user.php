
   <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-update-user">Update User</button>-->

   <div class="modal fade" id="modal-update-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form name="formUpdateUser" id="formUpdateUser" action="/" method="POST">
                  <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Username:</label>
                     <input type="text" class="form-control" name="username" id="username" value="">
                  </div>
                  <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Email:</label>
                     <input type="text" class="form-control" name="email" id="email" value="">
                  </div>
                  <div class="form-group">
                     <label for="message-text" class="col-form-label">Password:</label>
                     <input class="form-control" name="password" id="password"></input>
                  </div>
                  <div class="form-group">
                     <label for="message-text" class="col-form-label">Confirm Password:</label>
                     <input class="form-control" name="password-confirm" id="password-confirm"></input>
                  </div>
                  <div class="form-group text-right pt-3">
                     <input type="submit" class="btn btn-primary" value="Save">
                     <button type="button" class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Cancer</button>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
            </div>
         </div>
      </div>
   </div>