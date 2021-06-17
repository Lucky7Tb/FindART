<?php

require __DIR__ . '/../../helpers/helpers.php';
require __DIR__ . '/../../helpers/query.php';

apiCheckLogin();

$provinceId = $_GET['province_id'];

$dataCities = select("SELECT * FROM `cities` WHERE `province_id` = '$provinceId'");

response(200, $dataCities, 'Berhasil mengambil data kota');
