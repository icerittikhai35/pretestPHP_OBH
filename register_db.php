<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
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

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO member (username, email, tel, fname, lname, address, ref_code, ref_remark,  password) VALUES ('$username', '$email','$tel','$fname','$lname','$address','$ref_code','$ref_remark', '$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: login.php');
            
        } else {
            header("location: register.php");
        }
    }
