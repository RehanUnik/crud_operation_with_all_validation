<?php
$eerr = $email = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $_POST["email"])) {
        $eerr = "Enter Valid Email";
    } else {
        $email = $_POST["email"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Demo</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        Email: <input type="text" name="email"> <span><?php echo $eerr; ?></span><br> <br>
        <input type="submit" value="submit">
    </form>
</body>

</html>