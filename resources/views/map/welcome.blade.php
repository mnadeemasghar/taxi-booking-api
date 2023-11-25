<div id="map" style="height: 400px;"></div>
    <script>
        // Parse the JSON data from PHP
        var data = JSON.parse('{!! json_encode($data) !!}');

        // Create an array of LatLng objects based on your data
        var coordinates = [];
        for (var i = 0; i < data.length; i++) {
            coordinates.push([parseFloat(data[i]['pick_lat']), parseFloat(data[i]['pick_lng'])]);
            coordinates.push([parseFloat(data[i]['drop_lat']), parseFloat(data[i]['drop_lng'])]);
        }

        // Create a LatLngBounds object based on the coordinates
        var bounds = L.latLngBounds(coordinates);

        // Set the map view to fit the bounds
        const map = L.map('map').fitBounds(bounds);

        // Optionally, you can add padding to ensure some space around the bounds
        var paddingOptions = {
            paddingTopLeft: [50, 50],
            paddingBottomRight: [50, 50]
        };

        map.fitBounds(bounds, paddingOptions);

        const config = {
            maxZoom: 19, 
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        };

        // var map = L.map('map').setView([51.505, -0.09], 13);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', config).addTo(map);

        map.locate({setView: true, watch: true, maxZoom: 17});

        var userMarker;
        var userCircle;

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

        map.on('locationfound', onLocationFound);

        function onLocationError(e) {
            alert(e.message);
        }

        map.on('locationerror', onLocationError);

        var click_marker;
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            $("#lat_input").val(lat);
            $("#lng_input").val(lng);
            
            if(click_marker){
                click_marker.setLatLng(e.latlng);
            }
            else{
                click_marker = L.marker(e.latlng).addTo(map);
            }

            click_marker.bindPopup("<button form='search' class='btn btn-link'>Search</button>").openPopup();
        });

        for(i = 0; i < data.length; i++){
            if (data[i]['type'] == 'offer') {
                iconUrl = 'icons/offer.png';
            } else if (data[i]['type'] == 'required') {
                iconUrl = 'icons/req.png';
            }

            var customIcon = L.icon({
                iconUrl: iconUrl,
                iconSize: [16, 16], // Set the size of the icon
                iconAnchor: [16, 16], // Set the anchor point of the icon
                popupAnchor: [0, -16] // Set the popup anchor
            });

            var popupContent = "Price: " + data[i]['price'] + "<button class='btn btn-danger' form='delete_form_" + data[i]['id'] + "'>Delete</button>";

            marker = L.marker([data[i]['pick_lat'], data[i]['pick_lng']], { icon: customIcon }).addTo(map).bindPopup(popupContent);
            marker = L.marker([data[i]['drop_lat'], data[i]['drop_lng']], { icon: customIcon }).addTo(map).bindPopup(popupContent);

        }
    </script>