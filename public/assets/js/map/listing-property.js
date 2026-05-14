(function (A) {
    if (!Array.prototype.forEach)
        A.forEach = A.forEach || function (action, that) {
            for (var i = 0, l = this.length; i < l; i++)
                if (i in this)
                    action.call(that, this[i], i, this);
        };

})(Array.prototype);

var
    mapObject,
    markers = [],
    markersData = {
        'House': [
            {
                name: 'Sea Breezes',
                location_latitude: 25.186426,
                location_longitude: 55.346465,
                map_image_url: '../assets/images/property/15.jpg',
                name_point: 'Sea Breezes',
                price: '$1200',
                label: 'for sale',
                bed: '4',
                bath: '4',
                sqft: '5000',
                data_title: 'first',
                url_point: 'single-property-8.html'
            },
            {
                name: 'Orchard House',
                location_latitude: 21.028511,
                location_longitude: 105.854444,
                map_image_url: '../assets/images/6.jpg',
                name_point: 'Orchard House',
                price: '$1200',
                label: 'for rent',
                bed: '8',
                bath: '6',
                sqft: '5800',
                data_title: 'second',
                url_point: 'single-property-8.html'
            },
            {
                name: 'Neverland',
                location_latitude: 25.209843,
                location_longitude: 55.293616,
                map_image_url: '../assets/images/property/14.jpg',
                name_point: 'Neverland',
                price: '$1200',
                label: 'for sale',
                bed: '4',
                bath: '4',
                sqft: '5000',
                data_title: 'third',
                url_point: 'single-property-8.html'
            },
            {
                name: 'Home in Merrick Way',
                location_latitude: 25.269995,
                location_longitude: 55.368800,
                map_image_url: '../assets/images/feature/9.jpg',
                name_point: 'Home in Merrick Way',
                price: '$1200',
                label: 'for rent',
                bed: '5',
                bath: '3',
                sqft: '6000',
                data_title: 'four',
                url_point: 'single-property-8.html'
            }
        ]
    };

var mapOptions = {
    zoom: 13,
    center: new google.maps.LatLng(25.229721, 55.338229),
    mapTypeId: google.maps.MapTypeId.ROADMAP,

    mapTypeControl: false,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        position: google.maps.ControlPosition.LEFT_CENTER
    },
    panControl: false,
    panControlOptions: {
        position: google.maps.ControlPosition.TOP_RIGHT
    },
    zoomControl: true,
    zoomControlOptions: {
        style: google.maps.ZoomControlStyle.LARGE,
        position: google.maps.ControlPosition.RIGHT_BOTTOM
    },
    scrollwheel: false,
    scaleControl: false,
    scaleControlOptions: {
        position: google.maps.ControlPosition.LEFT_CENTER
    },
    streetViewControl: true,
    streetViewControlOptions: {
        position: google.maps.ControlPosition.RIGHT_BOTTOM
    },
    styles: [
        {
            "featureType": "administrative.country",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative.province",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative.locality",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative.neighborhood",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "landscape.man_made",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "landscape.natural.landcover",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "landscape.natural.terrain",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.attraction",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.business",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.government",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.medical",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.place_of_worship",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.school",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.sports_complex",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.highway.controlled_access",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "transit.station.airport",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "transit.station.bus",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "transit.station.rail",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        }
    ]
};
var
    marker;
mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
for (var key in markersData)
    markersData[key].forEach(function (item) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
            map: mapObject,
            icon: '../assets/images/marker-icon.png',
            title: item.data_title
        });

        if ('undefined' === typeof markers[key])
            markers[key] = [];
        markers[key].push(marker);
        google.maps.event.addListener(marker, 'click', (function () {
            closeInfoBox();
            getInfoBox(item).open(mapObject, this);
            mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
        }));

        $('.property-grid .property-box').mouseenter(function () {
            var className = $(this).attr('data-class');
            $(".gm-style div[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).children().addClass('add-animation');
                }
            });
        });

        $('.property-grid .property-box').mouseleave(function () {
            var className = $(this).attr('data-class');
            $(".gm-style div[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).children().removeClass('add-animation');
                }
            });
        });


        // map modal
        $('.sidebar-hotels .hotel-box').mouseenter(function () {
            var className = $(this).attr('data-class');
            $(".gm-style div[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).children().addClass('add-animation');
                }
            });
        });

        $('.sidebar-hotels .hotel-box').mouseleave(function () {
            var className = $(this).attr('data-class');
            $(".gm-style div[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).children().removeClass('add-animation');
                }
            });
        });

        // listing hotels
        $('.list-view .list-box').mouseenter(function () {
            var className = $(this).attr('data-class');
            $(".gm-style div[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).children().addClass('add-animation');
                }
            });
        });

        $('.list-view .list-box').mouseleave(function () {
            var className = $(this).attr('data-class');
            $(".gm-style div[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).children().removeClass('add-animation');
                }
            });
        });

    });




function hideAllMarkers() {
    for (var key in markers)
        markers[key].forEach(function (marker) {
            marker.setMap(null);
        });
};

function toggleMarkers(category) {
    hideAllMarkers();
    closeInfoBox();

    if ('undefined' === typeof markers[category])
        return false;
    markers[category].forEach(function (marker) {
        marker.setMap(mapObject);
        marker.setAnimation(google.maps.Animation.DROP);

    });
};

function closeInfoBox() {
    $('div.infoBox').remove();
};

function getInfoBox(item) {
    return new InfoBox({
        content:
            '<div class="marker-detail">' +
            '<img src="' + item.map_image_url + '" class="property-image" alt="Image"/>' +
            '<div class="label label-shadow">' + item.label + '</div>' +
            '<div class="detail-part">' +
            '<h6>' + item.name_point + '</h6>' +
            '<ul>' +
            '<li>Bed : ' + item.bed + '</li>' +
            '<li>Baths :' + item.bath + '</li>' +
            '<li>Sq Ft :' + item.sqft + '</li>' +
            '</ul>'
            +
            '<span>' + item.price + '</span>' +
            '<a href="' + item.url_point + '">Details</a>' +
            '</div>' +
            '</div>',
        disableAutoPan: false,
        maxWidth: 0,
        pixelOffset: new google.maps.Size(10, 125),
        closeBoxMargin: '0 -20px 0',
        closeBoxURL: "../assets/images/cancel.png",
        isHidden: false,
        alignBottom: true,
        pane: 'floatPane',
        enableEventPropagation: true
    });
};

function onHtmlClick(location_type, key) {
    google.maps.event.trigger(markers[location_type][key], "click");
}
setTimeout(function () {
    $(".gm-style img").each(function () {
        if (this.src.indexOf("marker-icon.png") !== -1) {
            $(this).addClass("d-none");
        }
    });
}, 10000);