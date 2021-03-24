<?php
require("../../config/app.php");

function imageUpload($key)
{
	$config = config();
	$uploadDir = $config["uploadDir"];

	$imageName = $_FILES[$key]["name"];
	$imageType = $_FILES[$key]["type"];
	$imageTmp = $_FILES[$key]["tmp_name"];
	$imageSize = $_FILES[$key]["size"];

	$imageData["fileName"] = $imageName;
	$imageData["success"] = false;
	$imageData["size"] = $imageSize;
	$imageData["type"] = $imageType;

	if (checkImgSize($imageSize) && checkImgType($imageType)) {
		$isUploaded = move_uploaded_file($imageTmp, $uploadDir . $imageName);
		if ($isUploaded) {
			$imageData["fileName"] = $imageName;
			$imageData["success"] = true;
		}
	}

	return $imageData;
}

function checkImgType($imgType)
{
	$imgType = explode("image/", strtolower($imgType))[1];
	$allowedImgType = ["jpg", "jpeg", "png"];
	
	return in_array($imgType, $allowedImgType);
}

function checkImgSize($imgSize)
{
	$maxImgSize = 5 * 1024 * 1024;

	return $imgSize < $maxImgSize;
}