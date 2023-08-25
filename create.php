<!-- Form Validation -->
<?php
$id9 = $iderr9 = $name9 = $email9 = $password9 = $salary9 = $date9 = $gender9 = $city9 = $country9 =  $image9 = $h9 = $fr9 = "";
$nerr9 = $eerr9 = $perr9 = $serr9 = $derr9 = $gerr9 = $cerr9 = $coerr9 = $herr9 = $ierr9 = "";
$hobbie = array("hobbie1", "hobbie2", "hobbie3");
$jsondata = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"  &&  isset($_POST["create"])) {

    if (!preg_match('/^\d{2}$/', $_POST["id"])) {
        $iderr9 = "Enter valid ID";
    } else {
        $id9 = $_POST["id"];
        echo $id9;
    }

    if (!preg_match('/^[A-Za-z\s\'-]+$/', $_POST["name"])) {
        $nerr9 = "Only alphabets and whitespace are allowed.";
    } else {
        $name9 = $_POST["name"];
    }

    if (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $_POST["email"])) {
        $eerr9 = "Enter Valid Email";
    } else {
        $email9 = $_POST["email"];
    }
    $password9 = $_POST["password"];
    $cpassword9 = $_POST["cpassword"];
    if ($password9 === $cpassword9) {
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*]{8,}$/', $_POST["password"])) {
            $perr9 = "Password must be at least 8 characters long and contain at least one letter, one digit, and special characters.";
        }
    } else {
        $s9 = "confirm password is invalid";
    }
    if (!preg_match('/^\d+(\.\d{1,2})?$/', $_POST["salary"])) {
        $serr9 = "Enter valid values for salary!";
    } else {
        $salary9 = $_POST["salary"];
    }
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST["date"])) {
        $derr9 = "Enter date in Formate Of YYYY-MM-DD";
    } else {
        $date9 = $_POST["date"];
    }
    if (empty($_POST["gender"])) {
        $gerr9 = "Gender Required";
    } else {
        $gender9 = $_POST["gender"];
    }
    if (!preg_match('/^[A-Za-z]+$/', $_POST["city"])) {
        $cerr9 = "Entery is Invalid";
    } else {
        $city9 = $_POST["city"];
    }
    if (!preg_match('/^[A-Za-z]+$/', $_POST["country"])) {
        $coerr9 = "Entery is Invalid";
    } else {
        $country9 = $_POST["country"];
    }
    if (isset($_POST["create"])) {
        if (!empty($_POST["hobbie"])) {
            $g = array();
            foreach ($_POST["hobbie"] as $h) {
                echo $h . "<br>";
                array_push($g, $h);
                $jsondata = json_encode($g);
            }
        } else {
            $herr9 = "Select One Check Box";
        }
    }
    if (empty($jsondata)) {
        $fr9 = "Select Atleast One Check Box";
    }


    if (!preg_match('/\.(jpg|jpeg|png|gif)$/i', $_POST["image"])) {
        $ierr9 = "Upload Valid Image";
    } else {
        $image9 = $_POST["image"];
    }
}
?>

<!-- Inserting Data Into Database -->
<?php

$servername = "localhost";
$username = "root";
$password1 = "";
$db = "mydb2";
$conn = mysqli_connect($servername, $username, $password1, $db);
if (!$conn) {
    die("Failed To Connect: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == "POST"  &&  isset($_POST["create"])) {
    $checkQuery = "SELECT * FROM exp WHERE id = '$id9'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        echo "Duplicate ID. Cannot insert.";
    } else {
        $insertQuery = "INSERT INTO exp VALUES ('$id9','$name9','$email9','$password9','$salary9','$date9','$gender9','$city9','$country9','$jsondata','$image9')";
        if (empty($id9) && empty($name9) && empty($email9) && empty($password9) && empty($salary9) && empty($date9) && empty($gender9) && empty($city9) && empty($country9) && empty($jsondata) && empty($image9)) {
            echo "<br>Inser ALL Data!";
        } elseif (mysqli_query($conn, $insertQuery)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>


<!-- Retriving Data From Database -->
<?php
$servername = "localhost";
$username = "root";
$password1 = "";
$db = "mydb2";
$conn = mysqli_connect($servername, $username, $password1, $db);
if (!$conn) {
    die("Failed To Connect: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == "POST"  &&  isset($_POST["read"])) {
    $sql = "SELECT * FROM exp";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<br>ID:- " . $row["id"];
            echo "<br>Name:-" . $row["fname"];
            echo "<br>Email:-" . $row["email"];
            echo "<br>Password:-" . $row["password22"];
            echo "<br>Salary:-" . $row["salary"];
            echo "<br>Date:-" . $row["date22"];
            echo "<br>Gender:-" . $row["gender"];
            echo "<br>City:-" . $row["city"];
            echo "<br>Country:-" . $row["country"];
            echo "<br>Hobbie:-" . $row["hobbies"];
            echo "<br>Image" . $row["image22"];
            echo "<br>" . "<br>";
        }
    }
}
mysqli_close($conn);
?>

<!-- Updating Result -->
<?php
$id = $iderr = $name = $email = $password = $salary = $date = $gender = $city = $country =  $image = $h = "";
$nerr = $eerr = $perr = $serr = $derr = $gerr = $cerr = $coerr = $herr = $ierr = $fr = "";
$jsondata4 = "";
$hobbie = array("hobbie1", "hobbie2", "hobbie3");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    if (!preg_match('/^\d{2}$/', $_POST["id"])) {
        $iderr = "Enter valid ID";
    } else {
        $id = $_POST["id"];
    }

    if (!preg_match('/^[A-Za-z\s\'-]+$/', $_POST["name"])) {
        $nerr = "Only alphabets and whitespace are allowed.";
    } else {
        $name = $_POST["name"];
    }
    if (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $_POST["email"])) {
        $eerr = "Enter Valid Email";
    } else {
        $email = $_POST["email"];
    }
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    if ($password === $cpassword) {
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*]{8,}$/', $_POST["password"])) {
            $perr = "Password must be at least 8 characters long and contain at least one letter, one digit, and special characters.";
        }
    } else {
        $s = "confirm password is invalid";
    }
    if (!preg_match('/^\d+(\.\d{1,2})?$/', $_POST["salary"])) {
        $serr = "Enter valid values for salary!";
    } else {
        $salary = $_POST["salary"];
    }
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST["date"])) {
        $derr = "Enter date in Formate Of YYYY-MM-DD";
    } else {
        $date = $_POST["date"];
    }
    if (empty($_POST["gender"])) {
        $gerr = "Gender Required";
    } else {
        $gender = $_POST["gender"];
    }
    if (!preg_match('/^[A-Za-z]+$/', $_POST["city"])) {
        $cerr = "Entery is Invalid";
    } else {
        $city = $_POST["city"];
    }
    if (!preg_match('/^[A-Za-z]+$/', $_POST["country"])) {
        $coerr = "Entery is Invalid";
    } else {
        $country = $_POST["country"];
    }
    if (isset($_POST["update"])) {
        if (!empty($_POST["hobbie"])) {
            $gk = array();
            foreach ($_POST["hobbie"] as $hl) {
                echo $hl . "<br>";
                array_push($gk, $hl);
                $jsondata4 = json_encode($gk);
            }
        } else {
            $herr = "Select Atleast One Check Box!";
        }
        if (empty($jsondata)) {
            $fr = "Select Atleast One Check Box!";
        }
    }


    if (!preg_match('/\.(jpg|jpeg|png|gif)$/i', $_POST["image"])) {
        $ierr = "Upload Valid Image";
    } else {
        $image = $_POST["image"];
    }
}
$servername = "localhost";
$username = "root";
$password1 = "";
$db = "mydb2";
$conn = mysqli_connect($servername, $username, $password1, $db);
if (!$conn) {
    die("Failed To Connect: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == "POST"  &&  isset($_POST["update"])) {

    $sql = "UPDATE exp SET id='$id',fname='$name', email='$email', password22='$password', salary='$salary', date22='$date', gender='$gender', city='$city', country='$country', hobbies='$jsondata4', image22='$image' WHERE id='$id'";
    if (empty($id) && empty($name) && empty($email) && empty($password) && empty($salary) && empty($date) && empty($gender) && empty($city) && empty($country) && empty($jsondata4) && empty($image)) {
        echo "<br>Inser ALL Data!";
    } elseif (mysqli_query($conn, $sql)) {
        echo "<br>Record updated successfully.";
    } else {
        echo "<br>Error " . $sql . "------" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

<!-- Delete result from table -->
<?php

$servername = "localhost";
$username = "root";
$password1 = "";
$db = "mydb2";
$conn = mysqli_connect($servername, $username, $password1, $db);
if (!$conn) {
    die("Failed To Connect: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == "POST"  &&  isset($_POST["delete"])) {
    $id3 = $_POST["id"];
    $sql = "DELETE FROM exp WHERE id='$id3'";
    if (mysqli_query($conn, $sql)) {
        echo "<br>Recored Deleted Successfully!";
    } else {
        echo "<br>Error!" . $sql . "--------" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Creating And Reading Form</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Id: <input type="text" name="id">
        <label>Enter 2 Digit ID</label><span><?php echo $iderr9; ?></span>
        <br>
        <br>
        Name: <input type="text" name="name"> <span class="error"><?php echo $nerr9; ?></span>
        <br>
        <br>
        E-mail: <input type="text" name="email"> <span class="error"><?php echo $eerr9; ?> </span>
        <br>
        <br>
        Password: <input type="text" name="password"><span><?php echo $perr9; ?> </span>
        <br>
        <br>
        Confirm Password <input type="text" name="cpassword"> <span><?php echo $perr9; ?></span>
        <br>
        <br>
        Salary: <input type="text" name="salary"><span><?php echo $serr9; ?> </span>
        <br>
        <br>
        Joining Date: <input type="text" name="date">
        <label>Enter Date In Formate Of YYYY-MM-DD</label><span><?php echo $derr9; ?> </span>
        <br>
        <br>
        Gender: <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male <span><?php echo $gerr9; ?></span>
        <br>
        <br>
        City: <input type="text" name="city"><span><?php echo $cerr9; ?> </span>
        <br>
        <br>
        Country: <input type="text" name="country"> <span><?php echo $coerr9; ?></span>
        <br>
        <br>
        hobbies: <input type="checkbox" name="hobbie[]" id="hobbie1" value="Reading" />Reading
        <input type="checkbox" name="hobbie[]" id="hobbie2" value="Travelling" />Travelling
        <input type="checkbox" name="hobbie[]" id="hobbie3" value="Music" />Music <span><?php echo $fr9; ?></span>
        <br>
        <br>
        Image: <input type="file" name="image" id="image"><span><?php echo $ierr9; ?></span>
        <br>
        <br>
        <input type="submit" value="Create" name="create">
        <input type="submit" value="Read" name="read">


    </form>



    <h2>Updating Form</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Id: <input type="text" name="id"><label>Enter 2 Digit ID</label><span><?php echo $iderr; ?></span>
        <br>
        <br>
        Name: <input type="text" name="name"> <span class="error"><?php echo $nerr; ?></span>
        <br>
        <br>
        E-mail: <input type="text" name="email"> <span class="error"><?php echo $eerr; ?> </span>
        <br>
        <br>
        Password: <input type="text" name="password"><span><?php echo $perr; ?> </span>
        <br>
        <br>
        Confirm Password <input type="text" name="cpassword"> <span><?php echo $perr; ?></span>
        <br>
        <br>
        Salary: <input type="text" name="salary"><span><?php echo $serr; ?> </span>
        <br>
        <br>
        Joining Date: <input type="text" name="date"><span><?php echo $derr; ?> </span>
        <br>
        <br>
        Gender: <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male <span><?php echo $gerr; ?></span>
        <br>
        <br>
        City: <input type="text" name="city"><span><?php echo $cerr; ?> </span>
        <br>
        <br>
        Country: <input type="text" name="country"> <span><?php echo $coerr; ?></span>
        <br>
        <br>
        hobbies: <input type="checkbox" name="hobbie[]" id="hobbie1" value="Reading">Reading
        <input type="checkbox" name="hobbie[]" id="hobbie2" value="Travelling">Travelling
        <input type="checkbox" name="hobbie[]" id="hobbie3" value="Music">Music <span><?php echo $fr; ?></span>
        <br>
        <br>
        Image: <input type="file" name="image" id="image"><span><?php echo $ierr; ?></span>
        <br>
        <br>
        <input type="submit" value="Update" name="update">
    </form>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Delete Recored</h2>
        Id: <input type="text" name="id">
        <input type="submit" value="Delete" name="delete">
    </form>
</body>

</html>