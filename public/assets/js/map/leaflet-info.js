
var map = L.map('mapleaf').setView([25.204500, 55.347245], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


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
            title: 'first',
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
            title: 'second',
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
            title: 'third',
            url_point: 'single-property-8.html'
        },
        {
            name: 'Home in Merrick Way',
            location_latitude: 25.229721,
            location_longitude: 55.328229,
            map_image_url: '../assets/images/feature/9.jpg',
            name_point: 'Home in Merrick Way',
            price: '$1200',
            label: 'for rent',
            bed: '5',
            bath: '3',
            sqft: '6000',
            title: 'four',
            url_point: 'single-property-8.html'
        }
    ]
};

for (var key in markersData)
    markersData[key].forEach(function (item) {
        L.marker([item.location_latitude, item.location_longitude], { title: item.title }).addTo(map)
            .bindPopup(
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


        $('.property-grid .property-box').mouseenter(function () {
            var className = $(this).attr('data-class');
            $(".leaflet-marker-pane img[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).addClass('add-filter');
                }
            });
        });

        $('.property-grid .property-box').mouseleave(function () {
            var className = $(this).attr('data-class');
            $(".leaflet-marker-pane img[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).removeClass('add-filter');
                }
            });
        });


        // map modal
        $('.sidebar-hotels .hotel-box').mouseenter(function () {
            var className = $(this).attr('data-class');
            $(".leaflet-marker-pane img[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).addClass('add-filter');
                }
            });
        });

        $('.sidebar-hotels .hotel-box').mouseleave(function () {
            var className = $(this).attr('data-class');
            $(".leaflet-marker-pane img[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).removeClass('add-filter');
                }
            });
        });

        // listing hotel
        $('.list-view .list-box').mouseenter(function () {
            var className = $(this).attr('data-class');
            $(".leaflet-marker-pane img[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).addClass('add-filter');
                }
            });
        });

        $('.list-view .list-box').mouseleave(function () {
            var className = $(this).attr('data-class');
            $(".leaflet-marker-pane img[title|=" + className + "]").each(function (index) {
                var marker_title = $(this).attr('title');
                if (marker_title === className) {
                    $(this).removeClass('add-filter');
                }
            });
        });


    });



