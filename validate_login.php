<?php
session_start();
include "db_conn.php";

echo $_POST['username'] . $_POST['password'];

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=Username is required.");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required.");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                header("Location: modules/dashboard/");
                exit();
            }
            else{
                header("Location: index.php?error=Incorrect username or password.");
            exit();
            }
        } else {
            header("Location: index.php?error=Incorrect username or password.");
            exit();
        }
    }
}