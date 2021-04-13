<?php 

require __DIR__.'/../../config/app.php';
require __DIR__.'/../../helpers/helpers.php';

session_destroy();

response(200, null, "Berhasil logout");