<?php

require("../../helpers/helpers.php");
require("../../helpers/upload_img.php");

$data = imageUpload("photo_profile");

var_dump($data);
die;