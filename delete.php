<?php 

include "server.php"; 

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM `member` WHERE `id`='$id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header("location: index.php");

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>