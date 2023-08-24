<?php
$derr = $date = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!preg_match('/^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-\d{4}$/', $_POST["date"])) {
        $derr = "Enter date in Formate Of DD-MM-YYYY";
    } else {
        $date = $_POST["date"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date demo</title>
</head>
<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
    Date: <input type="text" name="date"> <span><?php echo $derr; ?></span><br> <br>
    <input type="submit" value="submit">
</form>

<body>

</body>

</html>