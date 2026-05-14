
function addMarkerToGroup(group, coordinate, html) {
    var marker = new H.map.Marker(coordinate, { icon: icon });
    // add custom data to the marker
    marker.setData(html);
    group.addObject(marker);
}


var yourMarker = '../assets/images/marker-icon2.png';
var icon = new H.map.Icon(yourMarker);


var markersData = {
    'House': [
        {
            name: 'Sea Breezes',
            location_latitude: 25.206426,
            location_longitude: 55.346465,
            map_image_url: '../assets/images/property/15.jpg',
            name_point: 'Sea Breezes',
            price: '$1200',
            label: 'for sale',
            bed: '4',
            bath: '4',
            sqft: '5000',
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
            url_point: 'single-property-8.html'
        },
        {
            name: 'Home in Merrick Way',
            location_latitude: 25.229721,
            location_longitude: 55.338229,
            map_image_url: '../assets/images/feature/9.jpg',
            name_point: 'Home in Merrick Way',
            price: '$1200',
            label: 'for rent',
            bed: '5',
            bath: '3',
            sqft: '6000',
            url_point: 'single-property-8.html'
        }
    ]
};


function addInfoBubble(map) {
    var group = new H.map.Group();
    map.addObject(group);
    group.addEventListener('tap', function (evt) {
        var bubble = new H.ui.InfoBubble(evt.target.getGeometry(), {
            content: evt.target.getData()
        });
        // show info bubble
        ui.addBubble(bubble);
    }, false);

    window.addEventListener('resize', () => map.getViewPort().resize());

    for (var key in markersData)
        markersData[key].forEach(function (item) {
            addMarkerToGroup(group, { lat: item.location_latitude, lng: item.location_longitude },
                '<div class="infoBox">' +
                '<div class="marker-detail">' +
                '<img src="' + item.map_image_url + '" alt="Image"/>' +
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
                '</div>' +
                '</div>');
        })


}




var platform = new H.service.Platform({
    'apikey': 'ElOm77yzgasZvSGlnpiqwE-D5sbtTwgMYzSFiBV-6pc'
});
var defaultLayers = platform.createDefaultLayers();

var map = new H.Map(document.getElementById('map'),
    defaultLayers.vector.normal.map, {
    center: { lat: 25.206426, lng: 105.854444 },
    zoom: 14,
    pixelRatio: window.devicePixelRatio || 1
});




var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

var ui = H.ui.UI.createDefault(map, defaultLayers);

addInfoBubble(map);
























