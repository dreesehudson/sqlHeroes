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
    <h2 class="display-5">Add A New Hero</h2>

    <form action='add_hero.php' method='post'>
        <div class="form-group">
            <input class='form-control' id='exampleFormControlInput1' placeholder='Name'>
        </div>
        <!-- populate from abilities table -->
        <label for="exampleFormControlSelect1">Abilities</label>
        <!-- loop to dynamically produce checkboxes -->
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">1</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">2</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
            <label class="form-check-label" for="inlineCheckbox3">3</label>
        </div>
        <!-- loop to dynamically produce options -->
        <!-- populated from heroes names -->
        <div class="form-group">
            <label for="exampleFormControlSelect2">Allies</label>
            <select multiple class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <!-- loop to dynamically produce options -->
        <!-- populated from heroes names -->
        <div class="form-group">
            <label for="exampleFormControlSelect1">Arch Enemy</label>
            <select class="form-control" id="exampleFormControlSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">About Me</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Motto" rows="1"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Biography
            </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Upload Profile Photo</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <input type="submit" class="btn btn-primary">
    </form>