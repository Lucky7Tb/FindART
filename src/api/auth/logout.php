<?php 

require __DIR__.'/../../config/app.php';

session_destroy();

response(200, null, "Berhasil logout");