



    // Map 1
    function initMap() {
        var uluru = {lat: 34.0958938, lng: -118.3266425}; // CHANGE COORDINATES HERE // // CHANGE COORDINATES HERE //     
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru,
            scrollwheel: false,
            draggable: true
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
        var infowindow = new google.maps.InfoWindow({
            content:"We Are Here"
        });
        infowindow.open(map,marker);
    }


