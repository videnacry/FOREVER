<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Develop Your Project with PHP</title>
  <!-- Own stylesheet -->
  <link href="../src/css/style.css" rel="stylesheet"/>
  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
  <!--NPM Packages -->
  <script src="../node_modules/jquery/dist/jquery.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <link href="../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <!-- Navbar by Beron -->
  </header>
  <main>
    <!-- General wall -->
    <div class="container my-3">
      <!-- Input for new post -->
      <div class="row mx-auto my-3">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 border border-secondary p-3 shadow">
          <div class="row mx-0">
            <textarea name="" id="" cols="100" rows="3" class="border border-secondary p-3 rounded" placeholder="What are your thoughts?"></textarea>
          </div>
          <div class="row mx-0 mt-2 d-flex justify-content-between align-items-start">
            <div class="buttons-block-1">
              <button type="button" class="btn btn-sm btn-outline-primary mr-1">
                <i class="far fa-image"></i>
              </button>
              <button type="button" class="btn btn-sm btn-outline-primary">GIF</button>
            </div>
            <div class="buttons-block-2">
              <button type="submit" class="btn btn-primary">Post</button>
            </div>
          </div>
        </div>
        <div class="col-sm-2"></div>
      </div>
      <!-- Existing posts -->
      <div class="row mx-auto mt-3">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 border border-secondary p-3 shadow">
          <img src="https://cdn.pixabay.com/photo/2014/09/11/18/23/london-441853_1280.jpg" alt="" class="img-fluid border border-secondary">
          <div class="post-content-container p-3 mt-3 border border-secondary">
            <div class="row mx-auto">
              <div class="float-left p-0 mr-3">
                <div class="img-cont rounded-circle border border-light" id="img-1"></div>
              </div>
              <div class="my-auto text-left">
                <p class="m-0 font-weight-bold text-capitalize">
                  anna katarzyna emmerich
                </p>
                <p class="m-0">
                  <small>April 23rd, 2020</small>
                </p>
              </div>
            </div>
            <div class="row mx-auto mt-3">
              <p class="m-0 text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus eius illo expedita vel distinctio. Possimus, officia repellendus totam omnis praesentium eos quae illo reiciendis, sit, recusandae provident voluptas veniam? Numquam.
              </p>
            </div>
          </div>
          <div class="row mt-2 px-3 justify-content-end">
            <div class="likes mx-1">
              25
              <i class="far fa-heart"></i>
              <!-- <i class="fas fa-heart"></i> -->
            </div>
            <div class="comments mx-1">
              4
              <i class="far fa-comment-alt"></i>
              <!-- <i class="fas fa-comment-alt"></i> -->
            </div>
          </div>
        </div>
        <div class="col-sm-2"></div>
      </div>
      <!-- New comment -->
      <!-- Existing comments -->
      <div class="row mx-auto">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 border-left border-right border-bottom border-secondary p-3 shadow">
          <div class="comment-content-container p-3 border border-secondary">
            <div class="row mx-auto">
              <div class="float-left p-0 mr-3">
                <div id="img-2" class="img-cont rounded-circle border border-light"></div>
              </div>
              <div class="my-auto text-left">
                <p class="m-0 font-weight-bold text-capitalize">
                  john stuart mill
                </p>
                <p class="m-0">
                  <small>June 6th, 2020</small>
                </p>
              </div>
            </div>
            <div class="row mx-auto mt-3">
              <p class="m-0 text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus eius illo expedita vel distinctio.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-2"></div>
      </div>
    </div>
  </main>
  <!-- Own JS file -->
  <script src="../src/js/app.js"></script>
</body>
</html>