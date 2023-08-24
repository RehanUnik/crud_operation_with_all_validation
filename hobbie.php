<?php
$herr = $herr = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['checkArr'])) {
            foreach ($_POST['checkArr'] as $checked) {
                echo $checked . '<br>';
            }
        } else {
            echo '<div class="error">Checkbox is not selected!</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hobbies Validation</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        <label>
            Apple
            <input type="checkbox" name="checkArr[]" value="Apple">
        </label>
        <label>
            Banana
            <input type="checkbox" name="checkArr[]" value="Banana">
        </label>
        <label>
            Coconut
            <input type="checkbox" name="checkArr[]" value="Coconut">
        </label>
        <label>
            Blueberry
            <input type="checkbox" name="checkArr[]" value="Blueberry">
        </label>
        <input type="submit" name="submit" value="Choose options" />

    </form>

</body>

</html>