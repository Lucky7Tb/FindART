<?php

require __DIR__ . '/../../helpers/helpers.php';
require __DIR__ . '/../../helpers/query.php';

$districtId = $_GET['district_id'];

$dataSubDistricts = select("SELECT * FROM sub_districts WHERE district_id = '$districtId'");

response(200, $dataSubDistricts, 'Berhasil mengambil data kelurahan');
