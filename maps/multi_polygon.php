<?php
include('convexHull.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Polygon</title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <style>
    #map {
        height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    </style>
</head>
<body>
    <?php
    $triangleCoords1 = array(
        array("0" => 40.5943, "1" => -83.0128, 'name' => 'n'),
        array("0" => 40.4476, "1" => -83.0767, 'name' => 'n'),
        array("0" => 40.5113, "1" => -82.6063, 'name' => 'n'),
        array("0" => 40.3655, "1" => -83.0441, 'name' => 'n')
    );

    function invenDescSort($item1, $item2)
    {
        if ($item1['name'] == $item2['name']) return 0;
        return ($item1['name'] > $item2['name']) ? 1 : -1;
    }
    usort($triangleCoords1,'invenDescSort');


    $output = new convexHull();
    $result = $output->getConvexHull($triangleCoords1);
    ?>
    <div id="map"></div>

    <script>
    function initMap() {
        var beaches = [
            ["a", 40.4476, -83.0767],
            ["b", 40.3655, -83.0441],
            ["d", 40.5943, -83.0128],
            ["e", 40.5113, -82.6063],
            ["f", 40.448596, -80.049777],
            ["g", 40.427156, -79.989425],
            ["h", 40.436332, -79.961715],
            ["i", 40.466396, -79.935909]
        ];

        var triangleCoords = <?php echo json_encode($result); ?>;
        function SortByName(x, y) {
            return ((x.name == y.name) ? 0 : ((x.name > y.name) ? 1 : -1));
        }
        triangleCoords.sort(SortByName);
        var polygroups = {};
        for (var i = 0; i < triangleCoords.length; i++) {
            var groupName = triangleCoords[i].name;
            if (!polygroups[groupName]) {
                polygroups[groupName] = [];
            }
            polygroups[groupName].push({ lat: triangleCoords[i][0], lng: triangleCoords[i][1]});
        }
        var markers = [];
        var map;
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: {lat: 40.5943, lng: -83.0128},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var marker, i;
        var shape = {
            coords: [1, 1, 1, 20, 18, 20, 18, 1],
            type: 'poly'
        };
        var count = 0;
        $.each(polygroups, function (i, value) {
            var users = {
                0 : {color: '#f45942'},
                1 : {color: '#f4df41'},
                2 : {color: '#58f441'}
            }
            var bermudaTriangle = new google.maps.Polygon({
                paths: value,
                strokeColor: users[count].color,
                strokeOpacity: 0.8,
                strokeWeight: 4,
                fillColor: users[count].color,
                fillOpacity: 0.0
            });
            bermudaTriangle.setMap(map);
            count++;
        });

        for (i = 0; i < beaches.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(beaches[i][1], beaches[i][2]),
                map: map
            });
            markers.push(marker);
        }
    }

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBA6r9FMT7APwfx0OfOKj8IZwq9gkCPN-I&callback=initMap">
    </script>
</body>
</html>
