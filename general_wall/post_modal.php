<!-- General wall -->
<div id="modal-post" class="container my-3">
  <div class="row mx-auto">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 p-0">
      <!-- Input for new post -->
      <div id="modal-post-box" class="border border-secondary p-3 shadow mb-3">
        <img src="https://cdn.pixabay.com/photo/2015/10/21/16/36/architecture-999945_1280.jpg" alt=""
          class="img-fluid border border-secondary mb-3 d-none" id="img-new-post">
        <div class="row mx-0">
          <!-- <div contenteditable="true" data-placeholder="What are your thoughts?" class="border border-secondary p-3 rounded w-100 text-secondary" id="post-box">
                </div> -->
          <textarea name="" id="" cols="100" rows="3" class="border border-secondary p-3 rounded"
            placeholder="What are your thoughts?"></textarea>
        </div>
        <div class="row mx-0 mt-2 d-flex justify-content-between align-items-start">
          <div class="buttons-block-1 w-50 d-flex">
            <!-- <button type="button" class="btn btn-sm btn-outline-primary mr-1">
                    <i class="far fa-image"></i>
                  </button> -->
            <div class="custom-file w-25" id="img-btn-cont">
              <input type="file" class="custom-file-input outline-primary" id="post-image" name="post-image"
                accept="image/png, image/jpeg">
              <label class="custom-file-label btn mr-1 mb-0 border border-primary" for="post-image"
                id="post-image-label">
                <i class="far fa-image text-primary"></i>
              </label>
            </div>
            <div class="gif-cont">
              <button type="button" class="btn btn-outline-primary" id="gif-button">
                GIF
              </button>
              <div class="gif-img-cont d-none">
                <input type="text" name="" id="gif-input">
                <div class="gif-box">
                  <!--
                        <img src="https://images.pexels.com/photos/3632705/pexels-photo-3632705.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" width="90px" height="">
                        <img src="https://images.pexels.com/photos/3632705/pexels-photo-3632705.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" width="90px" height="">
                        <img src="https://images.pexels.com/photos/3632705/pexels-photo-3632705.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" width="90px" height="">
                        <img src="https://images.pexels.com/photos/3632705/pexels-photo-3632705.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" width="90px" height="">
                        <img src="https://images.pexels.com/photos/3632705/pexels-photo-3632705.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" width="90px" height="">
                        <img src="https://images.pexels.com/photos/3632705/pexels-photo-3632705.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" width="90px" height="">
                        <img src="https://images.pexels.com/photos/3632705/pexels-photo-3632705.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" width="90px" height="">
                        <img src="https://images.pexels.com/photos/3632705/pexels-photo-3632705.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" width="90px" height="">
                      -->
                </div>
              </div>
            </div>
          </div>
          <div class="buttons-block-2">
            <button type="submit" class="btn btn-primary" id="post">Post</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>