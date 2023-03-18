<?php

include "server.php";


if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $user_level = $_POST['user_level'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $ref_code = $_POST['ref_code'];
    $ref_remark = $_POST['ref_remark'];
    $remark = $_POST['remark'];




    $sql = "UPDATE member SET  fname='" . $fname . "',lname='" . $lname . "',user_level='" . $user_level . "', email='" . $email . "',email='" . $email . "',tel='" . $tel . "',address='" . $address . "',ref_code='" . $ref_code . "',ref_remark='" . $ref_remark . "',remark='" . $remark . "' WHERE id='" . $id . "' ";

    $result = mysqli_query($conn,$sql);

    if ($result == TRUE) {

        echo "Record updated successfully.";
        header("location: index.php");
    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;
        header("location: update.php");
    }
} 

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM `member` WHERE `id`='$id'";

    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $id = $row['id'];

            $first_name = $row['fname'];

            $lname = $row['lname'];

            $email = $row['email'];

            $tel  = $row['tel'];

            $address = $row['address'];

            $ref_code = $row['ref_code'];

            $ref_remark = $row['ref_remark'];

            $remark = $row['remark'];

            $user_level = $row['user_level'];
        }

?>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Bootstrap Table with Add and Delete Row Feature</title>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          

            <title>Home Page</title>
            <!-- <?php echo 'ระดับผู้ใช้ =' . $_SESSION['user_level']; ?> -->

            <link rel="stylesheet" href="style.css">
        </head>

        <body>
           


            <form action="" method="post">
           
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <h2>User Update Form</h2>
                <fieldset>

                    <legend>Personal information:</legend>

                    First name:<br>

                    <input type="text" name="fname" value="<?php echo $first_name; ?>">

                    <br>

                    Last name:<br>

                    <input type="text" name="lname" value="<?php echo $lname; ?>">

                    <br>
                    User Level:<br>

                    <input type="text" name="user_level" value="<?php echo $user_level; ?>">

                    <br>


                    Email:<br>

                    <input type="email" name="email" value="<?php echo $email; ?>">

                    <br>

                    tel:<br>

                    <input type="text" name="tel" value="<?php echo $tel; ?>">

                    <br>

                    Address:<br>

                    <input type="text" name="address" value="<?php echo $address; ?>">

                    <br>

                    Ref Code:<br>

                    <input type="text" name="ref_code" value="<?php echo $ref_code; ?>">

                    <br>

                    Ref Remark:<br>

                    <input type="text" name="ref_remark" value="<?php echo $ref_remark; ?>">

                    <br>

                    Remark:<br>

                    <input type="text" name="remark" value="<?php echo $remark; ?>">

                    <br>


                    <br><br>

                    <input type="submit" value="Update" name="update">

                </fieldset>

            </form>

        </body>

        </html>

<?php

    } else {
    }
}

?>