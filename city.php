<?php
$cerr = $city = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!preg_match('/^[A-Za-z]+$/', $_POST["city"])) {
        $cerr = "Entery is Invalid";
    } else {
        $city = $_POST["city"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        City: <input type="text" name="city"> <span><?php echo $cerr; ?></span><br> <br>
        <input type="submit" value="submit">
    </form>
</body>

</html>