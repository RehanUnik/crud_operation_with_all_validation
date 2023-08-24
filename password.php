<?php
$perr = $password = $cpassword = $s = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    if ($password === $cpassword) {
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*]{8,}$/', $_POST["password"])) {
            $perr = "Password must be at least 8 characters long and contain at least one letter, one digit, and special characters.";
        }
    } else {
        $s = "confirm password is invalid";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password </title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        Password: <input type="text" name="password"> <br> <br>
        Confirm Password: <input type="text" name="cpassword"> <span><?php echo $perr; ?><?php echo $s; ?></span><br> <br>
        <input type="submit" value="submit">

    </form>
</body>

</html>