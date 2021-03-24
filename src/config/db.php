<?php

function connection()
{
	$DB_NAME = 'find_art';
	$DB_USERNAME = 'root';
	$DB_PASSWORD = '';
	$DB_PORT = 3306;
	$DB_HOST = '127.0.0.1';
	
	return mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT);
}