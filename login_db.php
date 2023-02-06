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

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM member WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_array($result);

            if (mysqli_num_rows($result) == 1) {
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
                if ($data['user_level'] == 0){
                    header("location: index.php");
                }
                else if ($data['user_level'] == 1){
                    header("location: index_staff.php");
                }
                else if ($data['user_level'] == 2){
                    header("location: index_user.php");
                }
               
            } else {
                array_push($errors, "Wrong Username or Password");
                $_SESSION['error'] = "Wrong Username or Password!";
                header("location: login.php");
            }
        } else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Username & Password is required";
            header("location: login.php");
        }
    }
