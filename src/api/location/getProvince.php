<?php

require __DIR__ . '/../../helpers/helpers.php';
require __DIR__ . '/../../helpers/query.php';

$dataProvince = select("SELECT * FROM provinces");

response(200, $dataProvince, 'Berhasil mengambil data provinsi');