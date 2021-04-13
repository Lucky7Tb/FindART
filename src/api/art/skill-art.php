<?php

require __DIR__ . '/../../config/app.php';
require __DIR__ . '/../../helpers/helpers.php';
require __DIR__ . '/../../helpers/query.php';
$app = config();

$artId = $_GET['id'];

$query = "
	SELECT art_skill.skill AS art_skill FROM art_skill WHERE art_skill.art_id = '$artId'
";

$data = select($query);

response(200, $data, 'Berhasil mengambil detail skill ART');