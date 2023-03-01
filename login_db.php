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
 
        } else {
            $login_flag = '0';
            array_push($errors, "Wrong Username or Password");
            $_SESSION['error'] = "Wrong Username or Password!";
            header("location: login.php");
        }


        $sql = "INSERT INTO login_log (username,login_flag,ip_address) VALUES ('".$username."','".$login_flag."','".$ipaddress."')";
         $result = mysqli_query($conn, $sql);


    } else {
        array_push($errors, "Username & Password is required");
        $_SESSION['error'] = "Username & Password is required";
        header("location: login.php");
    }
}
