
<?php

//list items of all the heroes in the database
$list_of_heroes = "SELECT id, name FROM heroes";
$result = $conn->query($list_of_heroes);
$list_output = "";
if ($result->num_rows > 0) {
    // list_output data of each row, GET PHP applied to links
    while ($row = $result->fetch_assoc()) {
        $list_output .= "<li>" . "<a href=" . $row['id'] . ">" . $row["name"] . "</a>" . "</li>";
    }
} else {
    echo "list 0 results";
}
mysqli_close($conn);
?>