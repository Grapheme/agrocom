function LoadGmaps() {
  var myLatlng = new google.maps.LatLng(47.2278230,39.7135980);
  var myOptions = {
      zoom: 16,
      center: myLatlng,
      disableDefaultUI: true,
      panControl: false,
      zoomControl: true,
      zoomControlOptions: {
          style: google.maps.ZoomControlStyle.SMALL
      },

      mapTypeControl: true,
      mapTypeControlOptions: {
          style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
      },
      streetViewControl: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
      }
  var map = new google.maps.Map(document.getElementById("MyGmaps"), myOptions);
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title:"344002, г. Ростов-на-Дону, ул. Красноармейская, 170"
  });
  var infowindow = new google.maps.InfoWindow({
      content: "344002, г. Ростов-на-Дону, ул. Красноармейская, 170. <br>Приемная +7 (863) 250-58-14"
      });
      google.maps.event.addListener(marker, "click", function() {
          infowindow.open(map, marker);
      });
}

$(document).ready(function() {
  LoadGmaps();
})