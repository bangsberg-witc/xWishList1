<?php
session_start();
$imageID = FILTER_INPUT(INPUT_GET, "id");

if ($imageID == 1 || $imageID < 1 || $imageID > 5) {
    $imageID = 1;
}

$imageName = 'image' . $imageID . '.jpg';

include("photo_view.php");
?>