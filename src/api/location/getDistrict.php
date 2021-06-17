<?php

require __DIR__ . '/../../helpers/helpers.php';
require __DIR__ . '/../../helpers/query.php';

$cityId = $_GET['city_id'];

$dataDistricts = select("SELECT * FROM `districts` WHERE `city_id` = '$cityId'");

response(200, $dataDistricts, 'Berhasil mengambil data kecamatan');
