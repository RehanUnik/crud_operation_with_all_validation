<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "mydb2";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CREATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    if (empty($username) || empty($email) || empty($age)) {
        echo "All fields are required.";
    } else {
        $sql = "INSERT INTO user (username, email, age) VALUES ('$username', '$email', '$age')";
        if ($conn->query($sql) === TRUE) {
            echo "Record created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// READ
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["read"])) {
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " | Username: " . $row["username"] . " | Email: " . $row["email"] . " | Age: " . $row["age"] . "<br>";
        }
    } else {
        echo "No records found.";
    }
}

// UPDATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $newUsername = $_POST["new_username"];
    $newEmail = $_POST["new_email"];
    $newAge = $_POST["new_age"];

    if (empty($newUsername) || empty($newEmail) || empty($newAge)) {
        echo "All fields are required.";
    } else {
        $sql = "UPDATE user SET username='$newUsername', email='$newEmail', age='$newAge' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

// DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM user WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD Demo - All Fields Required</title>
</head>

<body>
    <!-- Create Form -->
    <h2>Create User</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="number" name="age" placeholder="Age" required>
        <button type="submit" name="create">Create</button>
    </form>

    <!-- Read Button -->
    <h2>Read Users</h2>
    <a href="?read=true">Read Users</a>

    <!-- Update Form -->
    <h2>Update User</h2>
    <form method="POST">
        <input type="number" name="id" placeholder="ID" required>
        <input type="text" name="new_username" placeholder="New Username" required>
        <input type="email" name="new_email" placeholder="New Email" required>
        <input type="number" name="new_age" placeholder="New Age" required>
        <button type="submit" name="update">Update</button>
    </form>

    <!-- Delete Form -->
    <h2>Delete User</h2>
    <form method="POST">
        <input type="number" name="id" placeholder="ID" required>
        <button type="submit" name="delete">Delete</button>
    </form>
</body>

</html>