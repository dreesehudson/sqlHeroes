<?php
$server_name = "localhost";
$username = "root";
$password = "root";
$database = "sqlHeroes";

// Create connection
$conn = new mysqli($server_name, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>City of Heroes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="container-fluid">
    <!-- Header -->
    <h1 class="display-3"><a href="../index.php">City of Heroes</a></h1>
    <h2 class="display-5 mt-3">Add A New Hero</h2>

    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
        <div class="form-group">
            <input class='form-control' name='name' placeholder='Name'>
        </div>
        <!-- populate from abilities table -->
        <h5 class="display-5 mt-3" for="exampleFormControlSelect1">Abilities</h5>
        <!-- loop to dynamically produce checkboxes -->
        <?php
        //list items of all the heroes in the database
        $list_of_abilities = "SELECT * FROM abilities";
        $return = $conn->query($list_of_abilities);
        if ($return->num_rows > 0) {
            // list_output data of each row, GET PHP applied to links
            while ($row = $return->fetch_assoc()) {
                echo "<div><div class='form-check form-check-inline'> 
                <input class='form-check-input' name=" . $row['id'] . " type='checkbox' id='inlineCheckbox1' value=" . $row['id'] . ">
                <label class='form-check-label' for='inlineCheckbox" . $row['id'] . "'>" . $row['ability'] . "</label>
                </div></div>";
            }
        }
        ?>

        <div class="form-group">
            <h5 class="display-5 pt-3" for="exampleFormControlSelect2">Allies: Can Choose Multiple</h5>
            <select multiple class="form-control" id="exampleFormControlSelect1">
                <?php
                //list items of all the heroes in the database
                $list_of_names = "SELECT name FROM heroes";
                $feedback = $conn->query($list_of_names);
                if ($feedback->num_rows > 0) {
                    // list_output data of each row, GET PHP applied to links
                    while ($row = $feedback->fetch_assoc()) {
                        echo $names_output = "<option>" . $row['name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <h5 class="display-5 mt-3" for="exampleFormControlSelect1">Arch Enemy</h5>
            <select class="form-control" id="exampleFormControlSelect2">
                <?php
                //list items of all the heroes in the database
                $list_of_names = "SELECT name FROM heroes";
                $feedback = $conn->query($list_of_names);
                if ($feedback->num_rows > 0) {
                    // list_output data of each row, GET PHP applied to links
                    while ($row = $feedback->fetch_assoc()) {
                        echo $names_output = "<option>" . $row['name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <h5 class="display-5 mt-3" for="exampleFormControlTextarea1">About Me</h5>
            <textarea class="form-control" name="about" placeholder="Motto" rows="1"></textarea>
        </div>
        <div class="form-group">
            <h5 class="display-5 mt-3" for="exampleFormControlTextarea1">Biography
            </h5>
            <textarea class="form-control" placeholder="How did you become a superhero?" name="bio" rows="3"></textarea>
        </div>
        <input type="submit" class="btn btn-primary">
    </form>

    <?php
    $server_name = "localhost";
    $username = "root";
    $password = "root";
    $database = "sqlHeroes";

    // Create connection
    $conn = new mysqli($server_name, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $about = $_POST['about'];
        $bio = $_POST['bio'];
        if (empty($name)) {
            echo 'name is empty';
        } else {
            echo $name . "<br>" . $about . "<br>" . $bio;
        }
    }
    $sql = "INSERT INTO heroes (name, about_me, biography)
        VALUES('$name', '$about', '$bio')";
    if ($conn->query($sql) === TRUE) {
        echo 'New Record created successfully';
    }


    ?>

    <h2 class="display-5 mt-5">Remove A User</h2>
    <form>
        <div class="form-group">
            <select class="form-control" id="exampleFormControlSelect2">
                <?php
                //list items of all the heroes in the database
                $list_of_names = "SELECT name FROM heroes";
                $feedback = $conn->query($list_of_names);
                if ($feedback->num_rows > 0) {
                    // list_output data of each row, GET PHP applied to links
                    while ($row = $feedback->fetch_assoc()) {
                        echo $names_output = "<option>" . $row['name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <input type="submit" class="btn btn-danger">
    </form>
 
</body>