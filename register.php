<?php 
    session_start();
    include('server.php'); 
    include('errors.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="header">
        <h2>Register</h2>
    </div>
 
    <form action="register_db.php" method="post">
      
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <label for="fname">Name</label>
            <input type="fname" name="fname">
        </div>
        <div class="input-group">
            <label for="lname">Last Name</label>
            <input type="lname" name="lname">
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label for="tel">Tel</label>
            <input type="tel" name="tel">
        </div>
        <div class="input-group">
            <label for="address">Address</label>
            <input type="address" name="address">
        </div>
        <div class="input-group">
            <label for="ref_code">Id friend invite</label>
            <input type="ref_code" name="ref_code">
        </div>
        <div class="input-group">
            <label for="ref_remark">Remark</label>
            <input type="ref_remark" name="ref_remark">
        </div>
       
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>

</body>
</html>