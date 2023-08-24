<?php
$nerr = $name = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!preg_match('/^[A-Za-z\s\'-]+$/', $_POST["name"])) {
        $nerr = "Only alphabets and whitespace are allowed.";
    } else {
        $name = $_POST["name"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name Field Validation</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        Name: <input type="text" name="name"> <span><?php echo $nerr; ?></span><br> <br>
        <input type="submit" value="submit">
    </form>
</body>

</html>