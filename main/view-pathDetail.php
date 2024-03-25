<?php
session_start();
include("../connection/conn.php");
include("dist/function/checkLogin.php");
checkLogin();
$web_head = "Map";

$key = $_SESSION['key'];
$order_place = $_SESSION['order-place'];

$count = count($order_place);

if($_GET['p'] == 0) {
    $stmt = $conn->prepare("SELECT lat, lng FROM place WHERE uniqueID = ?");
    $stmt->bind_param('s', $key[0]);
    $stmt->execute();
    $result_origin = $stmt->get_result();
    $row_origin = $result_origin->fetch_array();
    $stmt->close();
    $stmt = $conn->prepare("SELECT lat, lng FROM place WHERE uniqueID = ?");
    $stmt->bind_param('s', $key[1]);
    $stmt->execute();
    $result_destination = $stmt->get_result();
    $row_destination = $result_destination->fetch_array();
    $stmt->close();

    $_SESSION['lat-origin'] = $row_origin[0];
    $_SESSION['lng-origin'] = $row_origin[1];

    $_SESSION['lat-destination'] = $row_destination[0];
    $_SESSION['lng-destination'] = $row_destination[1];
}


?>
<!DOCTYPE html>
<html>
<?php include("dist/_partials/head.php"); ?>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbP-bfZgaX3dAjlkiUe1AtQkNg9b58poo&libraries=places"></script>
<style>
    #map {
        height: 500px;
        width: 100%;
    }

    .adp-agencies {
        display: none;
    }
</style>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark sticky-top p-0 flex-md-nowrap justify-content-between">
        <div class="container-fluid px-0">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Back</a>
                </li>
            </ul>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a href="signout.php" class="nav-link px-3">Sign out</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div id="map" class="mt-2"></div>
                <div class="row">
                    <div class="col-4">
                        <?php if (isset($_GET['p']) && $_GET['p'] > 0) { ?>
                            <form action="dist/function/map.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="origin" value="<?php echo $_GET['p'] - 1; ?>">
                                <input type="hidden" name="destination" value="<?php echo $_GET['p']; ?>">
                                <button type="submit" name="prev-map" class="btn btn-success">Prev</button>
                            </form>
                        <?php } ?>
                    </div>
                    <div class="col-4">
                        <div class="row" style="padding-top: 20px;">
                            <div class="d-flex">
                                <p id="in_kilo" class="px-1"></p>
                                <p id="duration_text" class="px-1"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <?php if (isset($_GET['p']) && $_GET['p'] < $count-1) { ?>
                            <form action="dist/function/map.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="origin" value="<?php echo $_GET['p'] + 1; ?>">
                                <input type="hidden" name="destination" value="<?php echo $_GET['p'] + 2; ?>">
                                <button type="submit" name="next-map" class="btn btn-success">Next</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div id="panel"></div>
            </div>
        </div>

    </div>


    <script>
        var origin, destination;
        function initMap() {
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: { lat: 13.7442, lng: 100.4608 }
            });
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('panel'));

            origin = { lat: <?php echo $_SESSION['lat-origin']; ?>, lng: <?php echo $_SESSION['lng-origin']; ?> };
            destination = { lat: <?php echo $_SESSION['lat-destination']; ?>, lng: <?php echo $_SESSION['lng-destination']; ?> };

            calculateAndDisplayRoute(directionsService, directionsDisplay, origin, destination);
            calculateDistance(origin, destination);
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay, origin, destination) {
            directionsService.route({
                origin: origin,
                destination: destination,
                optimizeWaypoints: true,
                travelMode: 'TRANSIT', // Set transit mode
            }, function (response, status) {
                if (status === 'OK') {
                    directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }

        function calculateDistance(origin, destination) {

            var DistanceMatrixService = new google.maps.DistanceMatrixService();
            DistanceMatrixService.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.TRANSIT,
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, save_results);
        }

        function save_results(response, status) {

            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Sorry , not available to use this travel mode between " + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    var distance_in_kilo = distance.value / 1000; // the kilo meter
                    var duration_text = duration.text;
                    appendResults(distance_in_kilo, duration_text);
                }
            }
        }

        function appendResults(distance_in_kilo, duration_text) {
            $("#result").removeClass("hide");
            $('#in_kilo').html("Distance: <span class='fw-bold'>" + distance_in_kilo.toFixed(2) + "</span> KM ");
            $('#duration_text').html(" Duration: <span class='fw-bold'>" + duration_text + "</span>");
        }

        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
</body>

</html>