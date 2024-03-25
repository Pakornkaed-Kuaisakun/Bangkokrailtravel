<?php
$time_station = "SELECT * FROM time_station WHERE start = ?";
$stmt = $conn->prepare($time_station);
$stmt->bind_param('s', $station);
$stmt->execute();
$result_time = $stmt->get_result();

$time = $result_time->fetch_array();
$time = $time[$end];
$stmt->close();
?>