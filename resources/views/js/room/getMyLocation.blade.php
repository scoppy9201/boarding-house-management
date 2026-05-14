{{-- Lấy vị trí hiện tại --}}
<script>
    $('#btnMMyLocation').on('click', function() {
        if (navigator.geolocation) {
console.log(navigator.geolocation);
            navigator.geolocation.getCurrentPosition(function(e) {
               

                console.log(e);
                var location = {
                    latitude: e.coords.latitude,
                    longitude: e.coords.longitude
                };
                map.setView({
                            center: location
                        });
                $('#lat').val(location.latitude);
                $('#long').val(location.longitude);
                // Thêm biểu tượng vào bản đồ
                icon.setLocation(location);
                map.entities.push(icon);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    data: {
                        name: name
                    },
                    url: `https://dev.virtualearth.net/REST/v1/Locations/${location.latitude}, ${location.longitude}?key=AhJkSEdXLFcChv2vJNdVpNKbyRg4D9gIJSfhqiO-Zfpn4zTm5Ei9k6h4QoryaLln`,
                    success: function(data) {
                        vitri = data;
                        console.log(vitri.resourceSets[0].resources[0].address);
                        $('#diaChi').val(vitri.resourceSets[0].resources[0].address
                            .formattedAddress);
                    }
                });
            });
        } else {
            x.innerHTML = "Geolocation không được hỗ trợ bởi trình duyệt này.";
        }
    })
</script>
