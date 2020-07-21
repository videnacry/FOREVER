<?php

if(strlen($_POST["search"]) > 0) $data = file_get_contents("https://api.giphy.com/v1/gifs/search?api_key=crJwFyPQyxe9S83nOv7GhAxG1PIvAkxL&q=".$_POST["search"]."&limit=25");
else $data = file_get_contents("https://api.giphy.com/v1/gifs/trending?api_key=crJwFyPQyxe9S83nOv7GhAxG1PIvAkxL&limit=25");

echo $data;