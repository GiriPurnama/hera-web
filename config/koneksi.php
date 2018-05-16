<?php
	// Connecting to database as mysqli_connect("hostname", "username", "password", "database name");
	// $con = new mysqli("localhost", "root", "", "dbrecruitment");
	// $con = mysqli_connect("localhost", "root", "", "dbrecruitment");

	$server   = "localhost";
	$username = "root";
	$password = "";
	$database = "dbheraweb";

	// koneksi database
	$db = mysqli_connect($server, $username, $password, $database);

	// cek koneksi
	if (!$db) {
	    die('Koneksi Database Gagal : ' . mysqli_connect_error());
	}

?>