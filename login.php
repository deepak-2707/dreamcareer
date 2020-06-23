<?php

session_start();
if (isset($_SESSION['uid'])) {
    header('location:admin/admindash.php');
}
?>

<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
    <title>Admin Login</title>
</head>

<body>
    <h1 style="text-align: center;">Admin Login</h1>

    <form action="" method="post">

        <table  align="center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required="required"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required="required"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;"><input type="submit" name="login" value="Log In" required="required"></td>
            </tr>
        </table>

    </form>

</body>

</html>

<?php

include('connection.php');

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
    $run = mysqli_query($conn, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
?>

        <script>
            alert('Username or password not correct!!')
        </script>

<?php
    } else {

        $data = mysqli_fetch_assoc($run);

        $id = $data['id'];

        session_start();

        $_SESSION['uid'] = $id;

        header('location:admin/admindash.php');
    }
}
?>