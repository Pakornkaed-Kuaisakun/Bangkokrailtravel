<?php
session_start();
include ("../../../connection/conn.php");

$key = $_SESSION['key'];
$order_place = $_SESSION['order-place'];

if (isset ($_POST['prev-map'])) {
    $page = $_GET['p'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];

    $stmt = $conn->prepare("SELECT lat, lng FROM place WHERE uniqueID = ?");
    $stmt->bind_param('s', $key[$origin]);
    $stmt->execute();
    $result_origin = $stmt->get_result();
    $row_origin = $result_origin->fetch_array();
    $stmt->close();

    $stmt = $conn->prepare("SELECT lat, lng FROM place WHERE uniqueID = ?");
    $stmt->bind_param('s', $key[$destination]);
    $stmt->execute();
    $result_destination = $stmt->get_result();
    $row_destination = $result_destination->fetch_array();
    $stmt->close();

    $_SESSION['lat-origin'] = $row_origin[0];
    $_SESSION['lng-origin'] = $row_origin[1];

    $_SESSION['lat-destination'] = $row_destination[0];
    $_SESSION['lng-destination'] = $row_destination[1];

    header("Location: ../../view-pathDetail.php?p=" . $destination - 1);
}

if (isset ($_POST['next-map'])) {
    $page = $_GET['p'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];

    $stmt = $conn->prepare("SELECT lat, lng FROM place WHERE uniqueID = ?");
    $stmt->bind_param('s', $key[$origin]);
    $stmt->execute();
    $result_origin = $stmt->get_result();
    $row_origin = $result_origin->fetch_array();
    $stmt->close();

    $stmt = $conn->prepare("SELECT lat, lng FROM place WHERE uniqueID = ?");
    $stmt->bind_param('s', $key[$destination]);
    $stmt->execute();
    $result_destination = $stmt->get_result();
    $row_destination = $result_destination->fetch_array();
    $stmt->close();

    $_SESSION['lat-origin'] = $row_origin[0];
    $_SESSION['lng-origin'] = $row_origin[1];

    $_SESSION['lat-destination'] = $row_destination[0];
    $_SESSION['lng-destination'] = $row_destination[1];

    header("Location: ../../view-pathDetail.php?p=" . $origin);
}
?>