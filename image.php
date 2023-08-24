<?php
$ierr = $image = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!preg_match('/\.(jpg|jpeg|png|gif)$/i', $_POST["image"])) {
        $ierr = "Upload Valid Image";
    } else {
        $image = $_POST["image"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        Image: <input type="file" name="image" id="image"><span><?php echo $ierr; ?></span> <br> <br>
        <input type="submit" value="submit">
    </form>
</body>

</html>