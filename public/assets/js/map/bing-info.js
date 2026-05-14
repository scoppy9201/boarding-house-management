function loadMapScenario() {
    var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
        center: new Microsoft.Maps.Location(21.028511, 105.854444),
        zoom: 13
    });
    var pushpins = Microsoft.Maps.TestDataGenerator.getPushpins(4, map.getBounds(),
        {
            icon: 'https://www.bingmapsportal.com/Content/images/poi_custom.png'
        }
    );

    var infobox = new Microsoft.Maps.Infobox(pushpins[0].getLocation(), { visible: false, autoAlignment: true });
    markersData = [
        {
            name: 'Sea Breezes',
            location_latitude: 21.028511,
            location_longitude: 105.854444,
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
    ];
    infobox.setMap(map);
    for (var i = 0; i < pushpins.length; i++) {

        //Store some metadata with the pushpin
        var pushpin = [];
        var htmldata = "";
        if (markersData[i]) {
            htmldata = '<div class="infoBox">' +
                '<div class="marker-detail">' +
                '<img src="' + markersData[i].map_image_url + '" alt="Image"/>' +
                '<div class="label label-shadow">' + markersData[i].label + '</div>' +
                '<div class="detail-part">' +
                '<h6>' + markersData[i].name_point + '</h6>' +
                '<ul>' +
                '<li>Bed : ' + markersData[i].bed + '</li>' +
                '<li>Baths :' + markersData[i].bath + '</li>' +
                '<li>Sq Ft :' + markersData[i].sqft + '</li>' +
                '</ul>'
                +
                '<span>' + markersData[i].price + '</span>' +
                '<a href="' + markersData[i].url_point + '">Details</a>' +
                '</div>' +
                '</div>' +
                '</div>';
            var loc = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(markersData[i].location_latitude, markersData[i].location_longitude));
            pushpin = loc;
            pushpin.metadata = {
                title: "",
                description: htmldata
            };
            pushpins[i] = loc;
            Microsoft.Maps.Events.addHandler(pushpin, 'click', function (args) {
                infobox.setOptions({
                    location: args.target.getLocation(),
                    title: args.target.metadata.title,
                    description: args.target.metadata.description,
                    visible: true
                });
            });
        }
    }
    map.entities.push(pushpins);

}
