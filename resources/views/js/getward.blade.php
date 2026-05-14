<script>
    console.log('abc');
    var district;
    var district_code = 164
    var datas;
    $.ajax({
        type: "post",
        dataType: "json",
        data: {
            district_code: district_code
        },
        url: `{{ route('get_wards') }}`,
        success: function (data) {

            let ward_list = document.getElementById('ward_list');
            ward_list.innerHTML = ` <a class="dropdown-item" href="javascript:void(0)">Tất cả</a>`
            data.ward_list.forEach(function (item, index) {
                ward_list.innerHTML +=
                    `<a class="dropdown-item" code="${item.code}" href="javascript:void(0)">${item.name}</a>`;
            })
            $(".dropdown-menu a").on('click', function () {
                var a = $(this).closest("a");
                var getSampling = a.text();
                $(this).closest(".dropdown-menu").prev('.dropdown-toggle').find('span').text(
                    getSampling);
                $(this).closest(".dropdown-menu").find('input').val(getSampling);
            });
            $("#ward_list a").on('click', function () {
                var a = $(this).closest("a");
                var getSampling = a.attr('code');
                $('#wards_input').val(getSampling);
                getSampling = a.text();
                $(this).closest(".dropdown-menu").prev('.dropdown-toggle').find('span')
                    .text(getSampling);
            });
        }
    })
    $("#districts").find(".district").click(function (item) {
        district = $(this).html();
        district_code = $(this).attr("code");
        $.ajax({
            type: "post",
            dataType: "json",
            data: {
                district_code: district_code
            },
            url: `{{ route('get_wards') }}`,
            success: function (data) {
                let ward_list = document.getElementById('ward_list');
                ward_list.innerHTML =
                    ` <a class="dropdown-item" href="javascript:void(0)">Tất cả</a>`
                data.ward_list.forEach(function (item, index) {
                    ward_list.innerHTML +=
                        `<a class="dropdown-item" code="${item.code}" href="javascript:void(0)">${item.name}</a>`;
                })
                $(".dropdown-menu a").on('click', function () {
                    var a = $(this).closest("a");
                    var getSampling = a.attr('code');
                    $('#district_input').val(getSampling);
                    getSampling = a.text();
                    $(this).closest(".dropdown-menu").prev('.dropdown-toggle').find('span')
                        .text(getSampling);
                    $(this).closest(".dropdown-menu").find('input').val(getSampling);
                });
                $("#ward_list a").on('click', function () {
                    var a = $(this).closest("a");
                    var getSampling = a.attr('code');
                    $('#wards_input').val(getSampling);
                    getSampling = a.text();
                    $(this).closest(".dropdown-menu").prev('.dropdown-toggle').find('span')
                        .text(getSampling);
                });
            }
        })
    })
    $("#category_list a").on('click', function () {
        var a = $(this).closest("a");
        var getSampling = a.attr('code');
        $('#category_input').val(getSampling);
        $(this).closest(".dropdown-menu").prev('.dropdown-toggle').find('span')
            .text(getSampling);
    });

</script>