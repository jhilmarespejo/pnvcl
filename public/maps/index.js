
$( document ).ready(function() {
     var map = L.map('map').setView([-17.786286, -63.183746], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiamhpbG1hcmVzcGVqbyIsImEiOiJja3FoZmNsZGEwOW41MzBucWtyaHhqYTl4In0.l01-lBzlhdTmS3XGFXIp7A'
    }).addTo(map);

var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
    //     .setContent("You clicked the map at " + e.latlng.toString())
    //     .openOn(map);
        //console.log(markers)
        L.marker([parseFloat(e.latlng.lat), parseFloat(e.latlng.lng)], {draggable: true}).addTo(map);

}
//map.on('click', onMapClick);

//map.attributionControl.setPrefix(false);

  var marker =  L.marker([-17.786286, -63.183746], {draggable: 'true'}).addTo(map);

  marker.on('dragend', function(e) {
    var position = marker.getLatLng();
    console.log(position);
    $('#latlng').val(position['lat']+','+position['lng']);

  });


});


