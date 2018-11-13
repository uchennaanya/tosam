<?php

    include("conn.php");

	$id = $_REQUEST['id'];
    $delete = $conn->query("DELETE FROM ugctable WHERE id = '$id'");

    header("location:manage-users.php");

?>