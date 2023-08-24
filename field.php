<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "mydb2";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Failed: " . mysqli_connect_error());
}
$name = $email = $password = $salary = $date = $gender = $city = $country = $hobbie = "";
$nerr = $eerr = $perr = $serr = $derr = $gerr = $cerr = $coerr = $herr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nerr = "Name Required";
    } else {
        $name = $_POST["name"];
    }
    if (empty($_POST["email"])) {
        $eerr = "email Required";
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["password"])) {
        $perr = "Password Required";
    } else {
        $password = $_POST["password"];
    }
    if (empty($_POST["salary"])) {
        $serr = "salary Required";
    } else {
        $salary = $_POST["salary"];
    }
    if (empty($_POST["date"])) {
        $derr = "Date Required";
    } else {
        $date = $_POST["date"];
    }
    if (empty($_POST["gender"])) {
        $gerr = "Gender Required";
    } else {
        $gender = $_POST["gender"];
    }
    if (empty($_POST["city"])) {
        $cerr = "City Required";
    } else {
        $city = $_POST["city"];
    }
    if (empty($_POST["country"])) {
        $coerr = "Country Required";
    } else {
        $country = $_POST["country"];
    }
    if (isset($_POST['submit'])) {
        if (!empty($_POST['hobbie'])) {
            foreach ($_POST["hobbie"] as $checked) {
                echo $checked . "<br>";
            }
        } else {
            echo "select checkbox";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIELD REQUIRED DEMO</title>
</head>

<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        Name: <input type="text" name="name"> <span class="error"><?php echo $nerr; ?></span> <br> <br>
        E-mail: <input type="text" name="email"> <span class="error"><?php echo $eerr; ?> </span><br> <br>
        Password: <input type="text" name="password"><span><?php echo $perr; ?> </span><br> <br>
        Confirm Password <input type="text" name="confirm_password"> <span><?php echo $perr; ?></span><br> <br>
        Salary: <input type="text" name="salary"><span><?php echo $serr; ?> </span><br> <br>
        Joining Date: <input type="text" name="date"><span><?php echo $derr; ?> </span><br> <br>
        Gender: <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male <span><?php echo $gerr; ?></span><br> <br>
        City: <input type="text" name="city"><span><?php echo $cerr; ?> </span><br> <br>
        Country: <input type="text" name="country"> <span><?php echo $coerr; ?></span><br> <br>
        hobbies: <input type="checkbox" name="hobbie[]" value="Reading">Reading
        <input type="checkbox" name="hobbie[]" value="Travelling">Travelling
        <input type="checkbox" name="hobbie[]" value="Music">Music <span><?php echo $herr; ?></span><br> <br>
        Image: <input type="image" src="\aaa.jpg" alt="image" height="150" width="150"> <br> <br>
        <input type="submit" value="submit" name="submit">

    </form>

</body>

</html>