<?php
$price = "SELECT * FROM price_bts WHERE start = ?";
$stmt = $conn->prepare($price);
$stmt->bind_param('s', $station);
$stmt->execute();
$result_price = $stmt->get_result();

$price = $result_price->fetch_array();
$price = $price[$end];
$stmt->close();
?>