<!DOCTYPE html>
<html>
<head>
    <script src="SiteBundle.min.js"></script>
    <title>Distance Matrix service</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <style>
        #right-panel {
            font-family: 'Roboto', 'sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }

        #right-panel select, #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100%;
            width: 67%;
            float:right;
        }
        .tab-content{
            position: absolute;
            top: 0;
            height: 100%;
            width: 32%;
            background: rgba(255,255,255,0.9);
            padding: 20px;
            box-sizing: border-box;
        }
        .form-inline{
            margin: 15px 0 10px;
        }
        .form-inline input{
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        .tab-content .btn{
            background: #4285F4;
            color: #fff;
            border: 0;
            cursor: pointer;
        }
        .tab-pane select{
            padding: 8px;
            border-radius: 0;
            width: 100%;
            margin-top: 8px;
        }
        .btn-direction{
            padding: 8px;
            margin-top:20px;
            box-sizing: border-box;
        }
        .tab-pane table{
            width: 100%;
            border-spacing: 0;
        }
        .table-margin{
            margin-bottom: 10px;
        }
        .adp-directions{
           display:none;
       }
       #directions{
           clear:both;
       }
       
       table#waypointsLocations td:nth-child(2),table#waypointsLocations td:nth-child(3){
          display:none;
      }




  </style>
</head>
<body>

    <div id="map"></div>
    <div class="tab-content">
        <?php echo '<pre>';
        // print_r($delivery_add);
        die;
        ?>
        <div id="locations" role="tabpanel" class="tab-pane active"> Type in an address or click on the map to add a
            <!--location-->
            <div class="form-inline">
                <input type="text" id="location" class="form-control" style="width:100%;" placeholder="Enter a location"
                autocomplete="off">
                <input type="button" onclick="addLocation()" value="Add location" class="btn btn-default"><br>
                <!--            <label>Latitude: <input type="text" id="lat" style="width:100px;" class="form-control"></label>-->
                <!--            <label>Longitude: <input type="text" id="lng" style="width:100px;" class="form-control"></label>-->
                <!--            <input type="button" onclick="addLatLng()" value="Add lat/lng" class="btn btn-default">-->
            </div>
            <table id="waypointsLocations" class="table table-striped">
                <thead>
                    <tr>
                        <th style="text-align:left;">Location</th>
                    <!--<th style="text-align:left;"><span class="glyphicon glyphicon-triangle-top"></span>Latitude</th>
                    <th style="text-align:left;"><span class="glyphicon glyphicon-triangle-right"></span>Longitude</th>-->
                    <th style="text-align:left;"></th>
                    <th style="text-align:left;"></th>
                    <th style="text-align:left;"></th>
                </tr>
            </thead>
            <tbody>
                <!--<tr>
                    <td colspan="6">Added locations will appear here</td>
                </tr>-->
            </tbody>
        </table>
    </div>
    <div id="options" role="tabpanel" class="tab-pane">
        <table>
            <tbody>
                <tr style="display:none">
                    <td><input type="checkbox" id="optimise" checked> <label for="optimise">Optimise route</label></td>
                    <td>If selected, the locations will be re-ordered to produce the shortest journey</td>
                </tr>
                <div class="table-margin"></div>
                <tr style="display:none">
                    <td ><input type="checkbox" id="roundTrip" checked> <label for="roundTrip">Round trip</label></td>
                    <td>If selected, your first location will be used as the end point of the journey</td>
                </tr>

                <tr>
                    <td><label for="routeType">Travelling by</label><select id="routeType" class="form-control">
                        <option selected="">Driving</option>
                        <option>Walking</option>
                        <option>Public transport</option>
                        <option>Cycling</option>
                    </select></td>
                    <td></td>
                </tr>
                
                <tr>
                    <td><label for="directionUnits">Units</label><select id="directionUnits" class="form-control">
                        <option selected="">Kilometres</option>
                        <option>Miles</option>
                    </select></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <input type="button" onclick="getDirections()" value="Get directions" class="btn btn-direction btn-primary">
</div>

<div id="progress"></div>
<span id="distance"></span>
<span id="duration"></span>
<div style="clear:both"></div>
<input type='button' id="_printbtn" value='Print' onclick='printDiv();'>
<div id="print_area">
    <div id="directions" style="direction: ltr;"></div>
</div>
<?php

foreach ($delivery_add as $d) {
    $state = !empty($d['state']) ? $d['state'] : 'NSW';
    $delivery_address[] = "'" . $d['delivery_address'] . ' ' . $d['suburb'] . ' ' . $state . $d['postcode'] . ' AU' . "'";
}
$delivery_address = implode(",", $delivery_address);
//  var_dump($delivery_address);
//die;
?>


<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4nqs1yYbGCT5590PY4YU-in_114lsYoc&libraries=places&callback=initMap">

</script>
<script>
    /// <reference path="../typings/google.maps.d.ts" />
    /// <reference path="site.ts" />
    /// <reference path="PrintMapControl.ts" />
    var Point = (function () {
        function Point() {
        }

        return Point;
    }());
    var locationsAdded = 1;
    var map;
    var points = [];
    var markers = [];
    var directionsDisplay;
    function initMap() {


         // loadGoogleMaps("places", function () {
            // Greenacre latitude and longitude default
            var latlng = new google.maps.LatLng(-33.9069, 151.0573);
            var options = {
                zoom: 10,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                draggableCursor: "crosshair",
                fullscreenControl: true
            };
            map = new google.maps.Map(document.getElementById("map"), options);
        //map.controls[google.maps.ControlPosition.TOP_RIGHT].push(printMapControl(map));
        google.maps.event.addListener(map, "click", function (location) {
            getLocationInfo(location.latLng, "Location " + locationsAdded);
            locationsAdded++;
        });
        var renderOptions = {markerOptions: {visible: false}};
        directionsDisplay = new google.maps.DirectionsRenderer(renderOptions);
        // autocomplete
        var autocomplete = new google.maps.places.Autocomplete(document.getElementById("location"), {
         bounds: null, componentRestrictions: null, types: []
     });
        google.maps.event.addListener(autocomplete, "place_changed", function () {
          var place = autocomplete.getPlace();
          getLocationInfo(place.geometry.location, $("#location").val());
          map.setCenter(place.geometry.location);
          $("#location").val("");
      });
       // });
   };
   function addLatLng() {
    "use strict";
    var latLong = new google.maps.LatLng($("#lat").val(), $("#lng").val());
    getLocationInfo(latLong, "Location " + locationsAdded);
    locationsAdded++;
    map.setCenter(latLong);
    $("#lat").val("");
    $("#lng").val("");
}
function addLocation() {
    "use strict";
    geocodeAddress($("#location").val(), function (latLng) {
        if (latLng != null) {
            getLocationInfo(latLng, $("#location").val());
            map.setCenter(latLng);
            $("#location").val("");
        }
        else {
            alert("Location not found");
        }
    });
}
function getLocationInfo(latlng, locationName) {
    "use strict";
    if (latlng != null) {
        var point = {LatLng: latlng, LocationName: locationName};
        points.push(point);
        buildPoints();
    }
}
function clearMarkers() {
    "use strict";
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    markers = [];
}
function buildPoints() {
    "use strict";
    clearMarkers();
    var html = "";
    for (var i = 0; i < points.length; i++) {
        var marker = new google.maps.Marker({
            position: points[i].LatLng,
                // icon: "https://www.doogal.co.uk/images/red.png",
                title: points[i].LocationName
            });
        markers.push(marker);
        marker.setMap(map);
        html += "<tr><td>" + points[i].LocationName + "</td><td>" + roundNumber(points[i].LatLng.lat(), 6) +
        "</td><td>" + roundNumber(points[i].LatLng.lng(), 6) +
        "</td><td><button class=\"delete btn btn-default\" onclick=\"removeRow(" + i + ");\">Delete</button></td><td>";
        if (i < points.length - 1) {
            html += "<button class=\"moveDown btn btn-default\" onclick=\"moveRowDown(" + i + ");\">Move down</button>";
        }
        html += "</td><td>";
        if (i > 0) {
            html += "<button class=\"moveUp btn btn-default\" onclick=\"moveRowUp(" + i + ");\">Move up</button>";
        }
        html += "</td></tr>";
    }
    $("#waypointsLocations tbody").html(html);
}
function clearPolyLine() {
    "use strict";
    points = [];
    buildPoints();
    clearRouteDetails();
}
function clearRouteDetails() {
    "use strict";
    directionsDisplay.setMap(null);
    directionsDisplay.setPanel(null);
    $("#distance").html("");
    $("#duration").html("");
}
function removeRow(index) {
    "use strict";
    points.splice(index, 1);
    buildPoints();
    clearRouteDetails();
}
function moveRowDown(index) {
    "use strict";
    var item = points[index];
    points.splice(index, 1);
    points.splice(index + 1, 0, item);
    buildPoints();
    clearRouteDetails();
}
function moveRowUp(index) {
    "use strict";
    var item = points[index];
    points.splice(index, 1);
    points.splice(index - 1, 0, item);
    buildPoints();
    clearRouteDetails();
}
function getDirections() {
    "use strict";
    if (points.length < 2) {
        showError("You need to add at least two locations");
        return;
    }
    $("#directions").html("Loading...");
    var directions = new google.maps.DirectionsService();
        // build array of waypoints (excluding start and end)
        var waypts = [];
        var end = points.length - 1;
        var dest = points[end].LatLng;
        if (document.getElementById("roundTrip").checked) {
            end = points.length;
            dest = points[0].LatLng;
        }
        for (var i = 1; i < end; i++) {
            waypts.push({location: points[i].LatLng});
        }
        var routeType = $("#routeType").val();
        var travelMode = google.maps.TravelMode.DRIVING;
        if (routeType === "Walking") {
            travelMode = google.maps.TravelMode.WALKING;
        }
        else if (routeType === "Public transport") {
            travelMode = google.maps.TravelMode.TRANSIT;
        }
        else if (routeType === "Cycling") {
            travelMode = google.maps.TravelMode.BICYCLING;
        }
        var unitsVal = $("#directionUnits").val();
        var directionUnits = google.maps.UnitSystem.METRIC;
        if (unitsVal === "Miles") {
            directionUnits = google.maps.UnitSystem.IMPERIAL;
        }
        var optimiseRoute = document.getElementById("optimise").checked;
        var request = {
            origin: points[0].LatLng,
            destination: dest,
            waypoints: waypts,
            travelMode: travelMode,
            unitSystem: directionUnits,
            optimizeWaypoints: optimiseRoute
        };
        directions.route(request, function (result, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                $("#directions").html("");
                directionsDisplay.setMap(map);
                directionsDisplay.setPanel($("#directions")[0]);
                directionsDisplay.setDirections(result);
                // calculate total distance and duration
                var distance = 0;
                var time = 0;
                var theRoute = result.routes[0];
                // start KML
                var kmlCode = kmlDocumentStart(points[0].LocationName + " to " + points[end].LocationName) +
                kmlStyleThickLine() + "<Placemark>\n" + kmlLineStart();
                for (var i = 0; i < theRoute.legs.length; i++) {
                    var theLeg = theRoute.legs[i];
                    distance += theLeg.distance.value;
                    time += theLeg.duration.value;
                    for (var j = 0; j < theLeg.steps.length; j++) {
                        for (var k = 0; k < theLeg.steps[j].path.length; k++) {
                            var thisPoint = theLeg.steps[j].path[k];
                            kmlCode += roundNumber(thisPoint.lng(), 6) + "," + roundNumber(thisPoint.lat(), 6) + " ";
                        }
                    }
                }
                $("#distance").html("Total distance: " + getDistance(distance) + ", ");
                $("#duration").html("total duration: " + Math.round(time / 60) + " minutes");
                // end KML
                kmlCode += kmlLineEnd() + kmlStyleUrl("thickLine") + "</Placemark>\n" + kmlDocumentEnd();
                $("#kmlData").val(kmlCode);
            }
            else {
                var statusText = getDirectionStatusText(status);
                $("#directions").html("An error occurred - " + statusText);
            }
        });
    }
    function getDistance(distance) {
        "use strict";
        if ($("#directionUnits").val() === "Miles") {
            return Math.round((distance * 0.621371192) / 100) / 10 + " miles";
        }
        else {
            return Math.round(distance / 100) / 10 + " km";
        }
    }
    function saveKml() {
        "use strict";
        $("#progress").html("Uploading...");
        // post data to server
        $.ajax({
            url: "postKml.ashx",
            type: "POST",
            data: {"data": $("#kmlData").val()},
            success: function (data) {
                $("#progress").html("Complete. <a href=\"KmlViewer.php?url=http://www.doogal.co.uk/GeocodedKml/" +
                    data + "\">Save this link to view the route later</a>");
            },
            error: function () {
                $("#progress").html("Failed to upload KML");
            }
        });
    }
    function printDiv() 
    {

      var divToPrint=document.getElementById('print_area');

      var newWin=window.open('','Print-Window');

      newWin.document.open();

      newWin.document.write('<html><style>table.adp-directions{display:none;}</style><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

      newWin.document.close();

      setTimeout(function(){newWin.close();},10);

  }
</script>

</body>
</html>