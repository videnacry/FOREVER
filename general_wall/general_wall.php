<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Develop Your Project with PHP</title>
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
    <div id="modal-post" class="container my-3">
      <div class="row mx-auto my-3">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 border border-secondary p-3 shadow-lg">
          <div class="row mx-0">
            <textarea name="" id="text" cols="100" rows="3" class="border border-secondary p-3 rounded" placeholder="What are your thoughts?"></textarea>
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
    </div>
  </main>
  <!-- Own JS file -->
  <script src="../src/js/app.js"></script>
</body>
</html>