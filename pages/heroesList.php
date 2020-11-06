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
};

?>

<?php
//list items of all the heroes in the database
$list_of_heroes = "SELECT DISTINCT id, name, image_url FROM heroes";
$result = $conn->query($list_of_heroes);
$list_output = "<ul>";
if ($result->num_rows > 0) {
    // list_output data of each row, GET PHP applied to links
    while ($row = $result->fetch_assoc()) {
        $list_output .= "<li>" . '<a href="/pages/heroProfile.php?id=' . $row["id"] . '">' . $row["name"] . "</a>" . "</li>";
    }
} else {
    echo "list 0 results";
}
$list_output .= "</ul>";

?>