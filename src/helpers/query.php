<?php
require __DIR__. '/../config/db.php';

function select($query)
{
	$connection = connection();

	$result = mysqli_query($connection, $query);
	$data = [];
	
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}

	return $data;
}

function save($query)
{
	$connection = connection();

	$insertedId = -1;

	$result = mysqli_query($connection, $query);

	if($result){
		$insertedId = mysqli_insert_id($connection);
	}

	return $insertedId;	
}

function delete($query)
{
	$connection = connection();

	$result = mysqli_query($connection, $query);

	return $result;
}