<?php

    include("conn.php");

	$id = $_REQUEST['id'];
    $delete = $conn->query("DELETE FROM addpin WHERE id = '$id'");

    header("location:available-card.php");

?>