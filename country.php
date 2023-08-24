<?php
$cerr = $contry = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!preg_match('/^[A-Za-z]+$/', $_POST["country"])) {
        $cerr = "Entery is Invalid";
    } else {
        $country = $_POST["country"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        Country: <input type="text" name="country"> <span><?php echo $cerr; ?></span><br> <br>
        <input type="submit" value="submit">
    </form>
</body>

</html>