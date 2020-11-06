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

    <?php
    include './heroesList.php';
    echo $list_output;
    ?>

    <?php

    //current Hero from link clicked
    $hero_sql = "SELECT id, name, about_me, biography, image_url FROM heroes WHERE id=$_GET[id]";
    $hero = $conn->query($hero_sql);

    //current Hero's Allies
    $ally_sql = "SELECT hero2_id FROM relationships WHERE hero1_id=$_GET[id] AND type_id='1'";
    $ally = $conn->query($ally_sql);

    //current Hero's Enemies
    $enemy_sql = "SELECT hero2_id FROM relationships WHERE hero1_id=$_GET[id] AND type_id='2'";
    $enemy = $conn->query($enemy_sql);

    if ($hero->num_rows > 0) {
        while ($hero_row = $hero->fetch_assoc()) { ?>

<div class="jumbotron">
    <img src='<?php echo $hero_row['image_url']; ?>' alt='<?php echo $hero_row['name']; ?>' />
                <h1 class='display-3'><?php echo $hero_row['name']; ?></h1>
                <p><?php echo $hero_row['about_me']; ?></p>
                <hr class='my-2'>
                <p><?php echo $hero_row['biography']; ?></p>
                <hr class='my-2'>
                <div class="row my-2">
                    <div class="col-6">
                        <h5>Allies</h5>
                        <ul>
                            <?php
                            //list items of all the heroes who are allies in the relationship table
                            if ($ally->num_rows > 0) {
                                // list_output data of each row, GET PHP applied to links
                                while ($ally_row = $ally->fetch_assoc()) {
                                    echo $ally_output = '<li><a href="/pages/heroProfile.php?id=' . $ally_row["hero2_id"] . '">' . $ally_row["hero2_id"] . "</a>" . "</li>";
                                }
                            } else {
                                echo "No Allies";
                            }
                            ?>
                        </ul>
                        <!-- display enemies -->
                        <h5>Enemies</h5>
                        <ul>
                            <?php
                            //list items of all the heroes who are allies in the relationship table
                            if ($enemy->num_rows > 0) {
                                // list_output data of each row, GET PHP applied to links
                                while ($enemy_row = $enemy->fetch_assoc()) {
                                    echo $enemy_output = '<li><a href="/pages/heroProfile.php?id=' . $enemy_row["hero2_id"] . '">' . $enemy_row["hero2_id"] . "</a>" . "</li>";
                                }
                            } else {
                                echo "No Enemies";
                            }
                            ?>

                        </ul>

                    </div>


                    <!-- add ally/enemy dropdown -->
                    <div class="col-6">
                        <p>dropdown</p>
                    </div>
                </div>
        <?php }
    } else {
        "no data";
    }
        ?>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>