function onLocationFound(e) {
    var radius = e.accuracy;
    
    // If the marker and circle exist, update their positions and radii
    if (userMarker) {
        // userMarker.setLatLng(e.latlng);
        userMarker.bindPopup("You are within " + radius + " meters from this point").openPopup();
    } else {
        // If they don't exist, create new ones
        // userMarker = L.marker(e.latlng).addTo(map);
    }

    if (userCircle) {
        userCircle.setLatLng(e.latlng);
        userCircle.setRadius(radius);
    } else {
        userCircle = L.circle(e.latlng, radius).addTo(map).bindPopup("You are within " + radius + " meters from this point").openPopup();
    }
}

function onLocationError(e) {
    alert(e.message);
}