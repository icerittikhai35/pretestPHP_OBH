<?php 
    session_start();
    include('server.php');
    
    $errors = array();
 
    //เช็คถ้ามีการส่งข้อมูล reg_user จากform มาให้ทำงาน
    if (isset($_POST['reg_user'])) {
        // สร้างตัวแปร $username ฟังก์ชั่น mysql_real_escape_string() เป็นฟังก์ชั่นสำหรับการเปลี่ยนอักขระพิเศษที่ส่งเข้ามาให้กลายเป็น string (เชื่อมต่อฐานข้อมูล $con,รับค่าจาก $POST มาเก็บไว้ในตัวแปร)
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $ref_code = mysqli_real_escape_string($conn, $_POST['ref_code']);
        $ref_remark = mysqli_real_escape_string($conn, $_POST['ref_remark']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($tel)) {
            array_push($errors, "Tel is required");
            $_SESSION['error'] = "Tel is required";
        }
        if (empty($fname)) {
            array_push($errors, "First Name is required");
            $_SESSION['error'] = "First Name is required";
        }
        if (empty($lname)) {
            array_push($errors, "Last Name is required");
            $_SESSION['error'] = "Last Name is required";
        }
        if (empty($address)) {
            array_push($errors, "Address is required");
            $_SESSION['error'] = "Address is required";
        }
        if (empty($ref_code)) {
            array_push($errors, "ref_code is required");
            $_SESSION['error'] = "ref_code is required";
        }
        if (empty($ref_remark)) {
            array_push($errors, "ref_remark is required");
            $_SESSION['error'] = "ref_remark is required";
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }

        $user_check_query = "SELECT * FROM member WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);


        //เช็คถ้า $result เป็น Ture แล้วให้ทำ
        if ($result) { // if user exists
            //เช็ค username ถ้ากรอกสมัครมาซ้ำกับข้อมูลเดิมที่มีใน ฐานข้อมูลให้ มีError และส่งErrorไปแสดง
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
                $_SESSION['error'] = "Username already exists";
            }
            //เช็ค email ถ้ากรอกสมัครมาซ้ำกับข้อมูลเดิมที่มีใน ฐานข้อมูลให้ มีError และส่งErrorไปแสดง
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
                $_SESSION['error'] = "Email already exists";
            }
        }

        //ถ้า error เท่ากับ 0 หรือไม่มี error แล้วให้ทำ
        if (count($errors) == 0) {
            //สร้างตัวแปร $password มาเข้ารหัส Password เป็น MD5 เพื่อความปลอกภัยของข้อมูล User 
            $password = md5($password_1);
            //สร้างตัวแปร $sql ไว้เก็บคำสั่ง insert ข้อมูลไปยัง sql server 
            $sql = "INSERT INTO member (username, email, tel, fname, lname, address, ref_code, ref_remark,  password) VALUES ('$username', '$email','$tel','$fname','$lname','$address','$ref_code','$ref_remark', '$password ')";
            //นำข้อมูลไปยังฐานข้อมูล และตารางในฐานข้อมูล ($con,$sql)
            mysqli_query($conn, $sql);
            header('location: login.php');
            
        } else {
            header("location: register.php");
        }
    }
