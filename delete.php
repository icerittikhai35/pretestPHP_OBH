<?php 
include "server.php"; 
//เช็ค $GET['id'] มีค่าถูกส่งมาไหมถ้ามีให้ทำงาน
if (isset($_GET['id'])) {
    //สร้างตัวแปร $id ไว้เก็บค่า$GET ['id']ที่ส่งมา
    $id = $_GET['id'];
    //คำสั่ง sql ลบ id ที่ตัวแปร $id
    $sql = "DELETE FROM `member` WHERE `id`='$id'";
    //เชื่อมต่อ ฐานข้อมูลและทำการส่งคำสั่ง sql ไป
     $result = mysqli_query($conn,$sql);
     //ถ้า $result ทำงานได้ หรือเท่ากับ True ให้ทำงาน
     if ($result == TRUE) {
        echo "Record deleted successfully.";
        header("location: index.php");

    }else{
    
        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>