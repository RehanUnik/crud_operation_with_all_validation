<?php
$serr = $salary = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!preg_match('/^\d+(\.\d{1,2})?$/', $_POST["salary"])) {
        $serr = "Enter valid values for salary!";
    } else {
        $salary = $_POST["salary"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Demo</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        Salary: <input type="text" name="salary"> <span><?php echo $serr; ?></span> <br> <br>
        <input type="submit" value="submit">
    </form>
</body>

</html>