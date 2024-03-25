<?php

for($cnt = 0; $cnt < count($data_query); $cnt++) {
    $rating = "SELECT rating FROM rating WHERE ID = ? AND type = ?";
    $stmt = $conn->prepare($rating);
    $stmt->bind_param('is', $ID, $data_query[$cnt]);
    $stmt->execute();
    $stmt->bind_result($rating);
    $stmt->fetch();
    $stmt->close();

    $quality[$data_query[$cnt]] = ($rating * $service)/($price * $time);
}


?>