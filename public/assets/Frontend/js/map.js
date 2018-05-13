function MapRoute(lat, lng) {
    var pointA = new google.maps.LatLng(10.0044274,105.806828),
        pointB = new google.maps.LatLng(lat, lng),
        myOptions = {
            zoom: 7,
            center: pointA
        },
        map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
        // Instantiate a directions service.
        directionsService = new google.maps.DirectionsService,
        directionsDisplay = new google.maps.DirectionsRenderer({
            map: map
        });
    // get route from A to B
    calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
    directionsService.route({
        origin: pointA,
        destination: pointB,
        travelMode: google.maps.TravelMode.DRIVING
    }, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}


function initMap(lat,lng) {
    var origin =  new google.maps.LatLng(lat,lng),
        map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: origin,
            zoom: 16
        });
    markerA = new google.maps.Marker({
        position: origin,
        title: "OBIDO Cần Thơ",
        label: "OBIDO",
        map: map
    });
}