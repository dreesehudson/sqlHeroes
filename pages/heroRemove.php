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
    <h2 class="display-5 mt-5">Remove A Hero</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post' class="mb-3">
        <div class="form-group">
            <select name='name' class="form-control" id="exampleFormControlSelect2">
                <option>Choose one...</option>
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
        <button type="submit" class="btn btn-danger">Remove</button>
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
        $name = $conn->real_escape_string($_POST['name']);        
        $remove = "DELETE FROM heroes
        WHERE name = '$name'";
        if ($conn->query($remove) === TRUE) {
            echo 'Hero Removed';
        } else {
            echo 'Error: Hero Lives On';
        }
    }
    ?>