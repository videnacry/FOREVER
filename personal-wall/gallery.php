
       <div class="d-flex flex-nowrap height-30 my-4 bg-light shadow">
         <?php
            $imgJson = json_decode(file_get_contents('../JSON/images.json'));
            $postJson = json_decode(file_get_contents('../JSON/posts.json'));
            $userId = $_SESSION['loggedUserID'];
            $userImgs = [];
            $postsId = [];
            $actualImg;
            foreach($postJson as $post) {
               if($post->author_id == $userId) {
                  array_unshift($postsId,$post->id);
               }
            }
            foreach ($imgJson as $img) {
               if($img->origin == "post"){
                  if(array_search($img->origin_id, $postsId)!=false){
                     array_push($userImgs,$img);
                     if($img->id == $_SESSION['user']['main_picture_id']){
                        $actualImg = $img;
                     }   
                  }
               }else{
                  if($img->origin_id == $userId) {
                     array_push($userImgs,$img);
                     if($img->id == $_SESSION['user']['main_picture_id']){
                        $actualImg = $img;
                     }
                  }
               }
            }
            echo '<div id="profile-photo" class="'.'size-vw-30 portrait'.'" style="'.'background-image:url('."'".$actualImg->path."'".');'.'"></div>';
            echo '<div class="w-50 m-auto gallery"><div id="gallery" class="d-flex flex-wrap justify-content-center">';
            foreach($userImgs as $img){
               echo '<div type="button" class="'.'screen-fifth m-1 rounded'.'" style="'.'background-image:url('."'".$img->path."'".');background-size:cover;
               background-position:center'.'" data-id="'.$img->id.'"></div>';
            }
            echo '</div></div>';
         ?>
      </div>
      <?php
         echo '<input type="hidden" name="portrait-id" id="portrait-id" value="'.$actualImg->id.'" />';
      ?>