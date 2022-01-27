<?php
session_start();
include('conn.php');
$data;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $query = $conn->query("DELETE  FROM users WHERE id=$id");
    $_SESSION['err'] = "User delete";
    echo "<script>
        window.history.back();
    </script>";
} else {
    $_SESSION['err'] = "Please select user for delete";
    header("location : index.php");
}

?>