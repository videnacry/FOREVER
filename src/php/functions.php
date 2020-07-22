<?php

/**
 * Get all data of json file
 * @param {String} $filePath -> path of json file
 * @return {Array}
 */
function getData(string $filePath)
{
   $data = file_get_contents($filePath);
   return json_decode($data, true);
}

/**
 * Find item into json file return index of item or false
 * @param {Array} $fileContent -> content of json file
 * @param {String} $attr -> attribute to look for.
 * @param {String} $value -> match value.
 */
function findItem(array $fileContent, string $attr, string $value)
{
   return array_search($value, array_column($fileContent, $attr));
}

/**
 * Add item into a JSON file
 * @param {String} $filePath -> path of json file
 * @param {Array} $item -> Item to add in json file
 */
function addItemInJson(string $filePath, array $item)
{
   $fileTempPath = str_replace(".json", "-temp.json", $filePath);

   $data = getData($filePath);
   if ($data == NULL) $data = [];
   array_push($data, $item);
   $file = $fileTempPath;
   fopen($file, "w");
   file_put_contents($file, json_encode($data));
   if (!unlink($filePath)) {
      return false;
   } else {
      rename($file, $filePath);
      return true;
   }
}

/**
 * delete item from trash.json
 * @param {String} $filePath -> path of json file
 * @param {*Array} -> $item - item to remove
 */
function removeItemOfJson(string $filePath, array $item)
{
   $fileTempPath = str_replace(".json", "-temp.json", $filePath);

   $dataList = getData($filePath);
   unset($dataList[array_search($item, $dataList)]);
   $file = $fileTempPath;
   fopen($file, "w");
   file_put_contents($file, json_encode($dataList));
   if (!unlink($filePath)) {
      return false;
   } else {
      rename($file, $filePath);
      return true;
   }
}

/**
 * Get an image path with the ID
 * @param {Int} $id -> The ID of the image
 * @return {String}
 */
function getImagePath(int $id) : string
{
   $data = json_decode(file_get_contents("../JSON/images.json"));
   foreach($data as $img) 
      if($img->id == $id) return $img->path;

   return "";
}