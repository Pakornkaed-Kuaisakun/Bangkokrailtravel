function setupMap() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;

    return directionsService, directionsDisplay;
}

function initMap(mapID, origin, destination) {

    directionsDisplay.setMap(mapID);

    calculateAndDisplayRoute(directionsService, directionsDisplay, origin, destination);
}


function initMap() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: { lat: 13.7442, lng: 100.4608 }
    });
    directionsDisplay.setMap(map);

    var waypoints = [
        { location: 'Paragon, Bangkok, Thailand', stopover: true },
        { location: 'Terminal 21, Bangkok, Thailand', stopover: true }
    ];

    calculateAndDisplayRoute(directionsService, directionsDisplay, waypoints);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay, origin, destination) {
    directionsService.route({
        origin: origin,
        destination: destination,
        optimizeWaypoints: true,
        travelMode: 'TRANSIT',
    }, function (response, status) {
        if (status === 'OK') {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}

google.maps.event.addDomListener(window, 'load', initMap);