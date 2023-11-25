<div id="pick_map" style="height: 400px;"></div>
<!-- pick map -->
<script>
        const pick_config = {
            maxZoom: 19, 
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        };

        var pick_map = L.map('pick_map').setView([51.505, -0.09], 13);

        const pick_tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', pick_config).addTo(pick_map);

        pick_map.locate({setView: true, watch: true, maxZoom: 17});

        var pick_userMarker;
        var drop_userCircle;

        function pick_onLocationFound(e) {
            var radius = e.accuracy;
            
            // If the marker and circle exist, update their positions and radii
            if (pick_userMarker) {
                // pick_userMarker.setLatLng(e.latlng);
                pick_userMarker.bindPopup("You are within " + radius + " meters from this point").openPopup();
            } else {
                // If they don't exist, create new ones
                // pick_userMarker = L.marker(e.latlng).addTo(pick_map);
            }

            if (drop_userCircle) {
                drop_userCircle.setLatLng(e.latlng);
                drop_userCircle.setRadius(radius);
            } else {
                drop_userCircle = L.circle(e.latlng, radius).addTo(pick_map).bindPopup("You are within " + radius + " meters from this point").openPopup();
            }
        }

        pick_map.on('locationfound', pick_onLocationFound);

            function onLocationError(e) {
            alert(e.message);
        }

        pick_map.on('locationerror', onLocationError);

        var pick_click_marker;
        pick_map.on('click', function(e) {
            var pick_lat = e.latlng.lat;
            var pick_lng = e.latlng.lng;

            $("#pick_lat").val(pick_lat);
            $("#pick_lng").val(pick_lng);
            
            if(pick_click_marker){
                pick_click_marker.setLatLng(e.latlng);
            }
            else{
                pick_click_marker = L.marker(e.latlng).addTo(pick_map);
            }
        });
    </script>