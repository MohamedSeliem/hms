var map, infoWindow;
$(document).ready(function(){
  initMap();
      function initMap() {
        var lafLatLng=new google.maps.LatLng(30.211573, -92.031394);
        map = new google.maps.Map(document.getElementById('map'), {
          center: lafLatLng,
          zoom: 12
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
            var marker=new google.maps.Marker({
                position:pos,
                map: map,
                title: "My location"
             });
            nearbySearch(pos,"hospital");
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
      //create Marker
         function createMarker(latlng,icn,name){
         var marker=new google.maps.Marker({
            position:latlng,
            map: map,
            icon: icn,
            title: name
         });
        }

        //nearby search
        function nearbySearch(lafLatLng,type){
          var request={
          location: lafLatLng,
          radius:'15000',
          types:[type]
           };
           service= new google.maps.places.PlacesService(map);
           service.nearbySearch(request,callback);

          function callback(results, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                  for (var i = 0; i < results.length; i++) {
                    var place = results[i];
                  console.log(place);
                  name=place.name;
                  latlng=place.geometry.location;
                  icn='https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                    createMarker(latlng,icn,name);
                  }
                }
              }
        }
 });