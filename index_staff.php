<?php
session_start();

if ($_SESSION['user_level'] != 1) {

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
    <?php echo 'ระดับผู้ใช้ =' . $_SESSION['user_level']; ?>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="homeheader">
        <h2>Home Page Level Staff</h2>
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
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
    </div>

    <?php
  
    include('server.php');
    $sql = "SELECT * FROM member WHERE user_level >= 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo   "Name: " . $row["fname"] . " " . $row["lname"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>

</body>

</html>