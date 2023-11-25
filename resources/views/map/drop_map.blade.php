<div id="drop_map" style="height: 400px;"></div>
<!-- drop map -->
<script>
    const drop_config = {
        maxZoom: 19, 
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    };

    var drop_map = L.map('drop_map').setView([51.505, -0.09], 13);

    const drop_tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', drop_config).addTo(drop_map);

    drop_map.locate({setView: true, watch: true, maxZoom: 17});

    var drop_userMarker;
    var drop_userCircle;

    function drop_onLocationFound(e) {
        var drop_radius = e.accuracy;
        
        // If the marker and circle exist, update their positions and radii
        if (drop_userMarker) {
            // drop_userMarker.setLatLng(e.latlng);
            drop_userMarker.bindPopup("You are within " + drop_radius + " meters from this point").openPopup();
        } else {
            // If they don't exist, create new ones
            // drop_userMarker = L.marker(e.latlng).addTo(drop_map);
        }

        if (drop_userCircle) {
            drop_userCircle.setLatLng(e.latlng);
            drop_userCircle.setRadius(drop_radius);
        } else {
            drop_userCircle = L.circle(e.latlng, drop_radius).addTo(drop_map).bindPopup("You are within " + drop_radius + " meters from this point").openPopup();
        }
    }

    drop_map.on('locationfound', drop_onLocationFound);

        function onLocationError(e) {
        alert(e.message);
    }

    drop_map.on('locationerror', onLocationError);

    var drop_click_marker;
    drop_map.on('click', function(e) {
        var drop_lat = e.latlng.lat;
        var drop_lng = e.latlng.lng;

        $("#drop_lat").val(drop_lat);
        $("#drop_lng").val(drop_lng);
        
        if(drop_click_marker){
            drop_click_marker.setLatLng(e.latlng);
        }
        else{
            drop_click_marker = L.marker(e.latlng).addTo(drop_map);
        }
    });
</script>