<?php

function connection()
{
	$DB_NAME = 'find_art';
	$DB_USERNAME = 'root';
	$DB_PASSWORD = '';
	$DB_HOST = 'localhost';
	
	return mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
}