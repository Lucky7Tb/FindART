<?php 

require __DIR__ . '/../../config/app.php';
require __DIR__ . '/../../helpers/helpers.php';
require __DIR__ . '/../../helpers/query.php';

$jobId = $_GET['id'];

$query = "
        SELECT `job_vacancy`.`id`, `job_vacancy`.`photo_id`, `job_vacancy`.`job_description`, `job_vacancy`.`job_payment`, `art_finder`.`full_name` AS `finder`, `photos`.`photo_url` AS thumbnail, `users`.`address` AS `address`
        FROM `job_vacancy` 
        JOIN `art_finder` ON `art_finder`.`id` = `job_vacancy`.`art_finder_id` 
        JOIN `photos` ON `photos`.`id` = `job_vacancy`.`photo_id` 
        JOIN `users` ON `users`.`id` = `art_finder`.`user_id` WHERE `job_vacancy`.`id` = $jobId";

$data = select($query);

if (empty($data)) {
    response(404, null, "Data tidak ditemukan");
}
response(200, $data, 'Berhasil memuat detail lowongan');

?>