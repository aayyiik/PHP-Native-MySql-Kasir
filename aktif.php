<?php

	// Connect to database
	include 'koneksi.php';

	// Check if id is set or not, if true,
	// toggle else simply go back to the page
	if (isset($_GET['id'])){

		// Store the value from get to
		// a local variable "course_id"
		$id=$_GET['id'];

		// SQL query that sets the status to
		// 0 to indicate deactivation.
		$sql="UPDATE pegawai SET
			status_pegawai=1 WHERE id_pegawai='$id'";

		// Execute the query
		mysqli_query($conn,$sql);
	}

	// Go back to course-page.php
	header('location: pegawai.php');
?>
