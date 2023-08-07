<?php

$conn = new mysqli('localhost', 'root', 'root', 'clean_design');

$id = $_GET['id']; // get id through query string

$del = "delete from enquiry where enq_id = '$id'"; // delete query
$conn->query($del);
header("location:data.php"); // redirects to all records page
?>