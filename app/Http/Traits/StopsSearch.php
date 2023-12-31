<?php
namespace App\Http\Traits;

trait StopsSearch{
    public function findStops($pickLat, $pickLng, $dropLat, $dropLng, $stops, $threshold) {
        $result = [];
    
        foreach ($stops as $stop) {
            $stopLat = $stop->lat;
            $stopLng = $stop->lng;
    
            // Calculate the distance between the pick and drop points and the current stop
            $distanceToPick = $this->calculateDistance($pickLat, $pickLng, $stopLat, $stopLng);
            $distanceToDrop = $this->calculateDistance($dropLat, $dropLng, $stopLat, $stopLng);
    
            // If the stop is within the threshold for both pick and drop points, consider it
            if ($distanceToPick <= $threshold && $distanceToDrop <= $threshold) {
                $result[] = $stop;
            }
            // $result[] = $stop;
        }

        $routes = $this->sort_data($result);
        foreach($routes as $key => $route){
            $data[$key]['map'] = $this->generateGoogleMapsDirectionsURL($pickLat, $pickLng, $dropLat, $dropLng,$route);
            $data[$key]['stops_count'] = sizeof($route);
            // $data[$key]['stops'] = $route;
        }

        return $data;
    }
    
    // Function to calculate the distance between two points using Haversine formula
    public function calculateDistance($lat1, $lng1, $lat2, $lng2) {
        $earthRadius = 6371; // Earth's radius in kilometers
    
        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);
    
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLng / 2) * sin($dLng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
        $distance = $earthRadius * $c;
    
        return $distance;
    }

    function generateGoogleMapsDirectionsURL($startLat, $startLng, $endLat, $endLng, $selectedStops) {
        $baseUrl = "https://www.google.com/maps/dir/?api=1";
        
        $start = $startLat . "," . $startLng;
        $end = $endLat . "," . $endLng;
    
        $waypoints = "";
        foreach ($selectedStops as $stop) {
            $waypoints .= "|" . $stop["lat"] . "," . $stop["lng"];
        }
    
        $walkingMode = "walking";
        $drivingMode = "driving";
    
        // Set the first segment from start to the first stop as walking
        $url = $baseUrl . "&origin=" . $start . "&destination=" . $selectedStops[0]["lat"] . "," . $selectedStops[0]["lng"] . "&mode=" . $walkingMode;
    
        // Add intermediate stops with driving mode
        $url .= "&waypoints=" . $waypoints . "&mode=" . $drivingMode;
    
        // Add the last segment from the last stop to the end as walking
        $url .= "&destination=" . $end . "&mode=" . $walkingMode;
    
        return $url;
    }

    
    // Function to compare entries based on stop_number
    function compareStops($a, $b) {
        return $a['stop_number'] - $b['stop_number'];
    }

    public function sort_data($data){
        $groupedData = [];
        $result = [];

        foreach($data as $entry){
            $result[$entry->user_id][] = $entry;
        }

        return $result;
    }

    function getWalkingDirectionsUrl($origin, $destination) {
        $apiEndpoint = 'https://www.google.com/maps/dir/';
    
        $params = [
            'api'         => '1',
            'origin'      => urlencode($origin),
            'destination' => urlencode($destination),
            'travelmode'  => 'walking',
        ];
    
        $url = $apiEndpoint . '?' . http_build_query($params);
    
        return $url;
    }

}