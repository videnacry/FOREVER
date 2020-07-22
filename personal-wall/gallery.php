
       <div class="d-flex flex-wrap height-30 my-4">
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
                     array_push($userImgs,$img->path);
                     if($img->id == $_SESSION['user']['pictureID']){
                        $actualImg = $img->path;
                     }   
                  }
               }else{
                  if($img->origin_id == $userId) {
                     array_push($userImgs,$img->path);
                     if($img->id == $_SESSION['user']['pictureID']){
                        $actualImg = $img->path;
                     }
                  }
               }
            }
            echo '<div class="'.'size-vw-30 portrait'.'" style="'.'background-image:url('."'".$actualImg."'".');'.'"></div>';
            echo '<div class="w-50 m-auto gallery"><div class="d-flex flex-wrap justify-content-center">';
            foreach($userImgs as $img){
               echo '<div class="'.'screen-fifth'.'" style="'.'background-image:url('."'".$img."'".');background-size:cover;
               background-position:center'.'"></div>';
            }
            echo '</div></div>';
         ?>
      </div>