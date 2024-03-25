<?php
    $place = "SELECT * FROM place WHERE type = ?";
    $stmt = $conn->prepare($place);
    $stmt->bind_param('s', $place_type);
    $stmt->execute();
    $result = $stmt->get_result();

    $j = 0;
    while($row = $result->fetch_array()) {
        
        echo $place_name . " => " . $row['name'] . "<br>";
        $j = $j + 1;
    }
    $stmt->close();
?>