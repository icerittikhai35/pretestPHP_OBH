<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }
//ถ้า count จำนวนของ Error เท่ากับ0 ให้ทำเงื่อนไขนี้
    if (count($errors) == 0) {
        //สร้างตัวแปร Password มาเก็บ $password โดยการถอดรหัส MD5 
        $password = md5($password);
        //สร้างตัวแปร $query มาเก็บ คำสั่ง SQL ที่แสดงrow ที่ username กับ password ตรงกับที่ login เข้ามา
        $query = "SELECT * FROM member WHERE username = '$username' AND password = '$password' ";
        //สร้างตัวแปร $result มาเก็บค่าคือนำข้อมูลไปยังฐานข้อมูล และตารางในฐานข้อมูล ($con,$sql)
        $result = mysqli_query($conn, $query);
        //เรียกแถวผลลัพธ์เป็นอาร์เรย์ที่เชื่อมโยงอาร์เรย์ result เก็บไว้ใน $data
        $data = mysqli_fetch_array($result);


        //ถ้า result มีค่าเป็น 1 หรือ True ให้สร้าง$_SESSION เก็บข้อมูล ใน $dataแต่ละตัวเช่น id,username,password,fname เป็นต้น
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $username;
            $_SESSION['fname'] = $data['fname'];
            $_SESSION['lname'] = $data['lname'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['tel'] = $data['tel'];
            $_SESSION['address'] = $data['address'];
            $_SESSION['ref_remark'] = $data['ref_remark'];
            $_SESSION['last_update'] = $data['last_update'];
            $_SESSION['user_level'] = $data['user_level'];
            $_SESSION['success'] = "Your are now logged in";
            //ถ้า $data['user_level'] ==0 ให้ค่า $login_flag = '1' และไปหน้า  index.php
            if ($data['user_level'] == 0) {
                $login_flag = '1';
                header("location: index.php");
            } else if ($data['user_level'] == 1) {
                $login_flag = '1';
                header("location: index_staff.php");
            } else if ($data['user_level'] == 2) {
                $login_flag = '1';
                header("location: index_user.php");
            }
            function get_client_ip() {
                $ipaddress = '';
                if (getenv('HTTP_CLIENT_IP'))
                    $ipaddress = getenv('HTTP_CLIENT_IP');
                else if(getenv('HTTP_X_FORWARDED_FOR'))
                    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                else if(getenv('HTTP_X_FORWARDED'))
                    $ipaddress = getenv('HTTP_X_FORWARDED');
                else if(getenv('HTTP_FORWARDED_FOR'))
                    $ipaddress = getenv('HTTP_FORWARDED_FOR');
                else if(getenv('HTTP_FORWARDED'))
                   $ipaddress = getenv('HTTP_FORWARDED');
                else if(getenv('REMOTE_ADDR'))
                    $ipaddress = getenv('REMOTE_ADDR');
                else
                    $ipaddress = 'UNKNOWN';
                return $ipaddress;
            }
                $ipaddress = get_client_ip();
 
        }
        //ถ้าไม่ใช่ให้ $login_flag มีค่า = '0'
         else {
            $login_flag = '0';
            //เพิ่มค่าเข้าไปในอาร์เรย์ (ตัวแปรอาร์เรยที่ต้องการเพิ่มค่าเข้าไป , ค่าที่จะเพิ่มเข้าไปในอาร์เรย์)
            array_push($errors, "Wrong Username or Password");
            //สร้าง  $_SESSION 'error' และให้ไปหน้า login.php
            $_SESSION['error'] = "Wrong Username or Password!";
            header("location: login.php");
        }

        //
        $sql = "INSERT INTO login_log (username,login_flag,ip_address) VALUES ('".$username."','".$login_flag."','".$ipaddress."')";
        $result = mysqli_query($conn, $sql); 


    } else {
        array_push($errors, "Username & Password is required");
        $_SESSION['error'] = "Username & Password is required";
        header("location: login.php");
    }
}
?>