$(document).ready(function(){

	var lafLatLng=new google.maps.LatLng(30.2238889, -92.0197222);

	 var map = new google.maps.Map(document.getElementById('map'), {
          center: lafLatLng,
          zoom: 8
        });
	 function createMarker(latlng){
	 var marker=new google.maps.Marker({
	 		position:latlng,
	 		map: map,
	 		title: 'Lafayette'
	 });
	}
	 var request={
	 	location: lafLatLng,
	 	radius:'1500',
	 	types:['hospital']
	 };
	 service= new google.maps.places.PlacesService(map);
	 service.nearbySearch(request,callback);

function callback(results, status) {
		  if (status == google.maps.places.PlacesServiceStatus.OK) {
		    for (var i = 0; i < results.length; i++) {
		      var place = results[i];
			  latlng=place.geometry.location;
		      createMarker(latlng);
		    }
		  }
		}
});
