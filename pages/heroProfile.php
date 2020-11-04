
<?php

//current Hero
$current_hero = "SELECT id, name, about_me, biography FROM heroes WHERE hero_id=1";
$powers = "SELECT ability_id FROM heroes WHERE hero_id=1";
$result = $conn->query($current_hero);
$profile_output = "";
if ($result->num_rows > 0) {
    // list_output data of each row
    while ($row = $result->fetch_assoc()) {
        $profile_output .=
        //hero name
            "<h1 class='display-3'>" . $row['name'] . "</h1>" . 
        //hero powers
            "<ul>
                <li>" . $powers . "</li>
            </ul>" . 
        //hero about_me
            "<p>" . $row['about_me'] . "</p>" . 
            "<hr class='my-2'>" . 
        //biography
            "<p>" . $row['biography'] . "</p>";

    }
} else {
    echo "profile 0 results";
}
mysqli_close($conn);
?>