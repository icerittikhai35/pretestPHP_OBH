<?php 
    session_start();

    if($_SESSION['user_level'] != 2){

        header('location: login.php');

    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user_level']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <?php echo 'ระดับผู้ใช้ ='. $_SESSION['user_level'];?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="homeheader">
        <h2>Home Page Level 1</h2>
    </div>

    <div class="homecontent">
        <!--  notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
    
        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <h2>Username <strong><?php echo $_SESSION['username']; ?></strong></h2>
            <h2>Name <strong><?php echo $_SESSION['fname']; ?></strong></h2>
            <h2>Last Name <strong><?php echo $_SESSION['lname']; ?></strong></h2>
            <h2>Email <strong><?php echo $_SESSION['email']; ?></strong></h2>
            <h2>Tel <strong><?php echo $_SESSION['tel']; ?></strong></h2>
            <h2>Address <strong><?php echo $_SESSION['address']; ?></strong></h2>
            <h2>Ref remark <strong><?php echo $_SESSION['ref_remark']; ?></strong></h2>
            <h2>Last Update <strong><?php echo $_SESSION['last_update']; ?></strong></h2>
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
    </div>

</body>
</html>