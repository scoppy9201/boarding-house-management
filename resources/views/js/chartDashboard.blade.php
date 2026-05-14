<script>
    
    // sale chart
var options = {
    series: [
        {
            data: [
                @foreach ( $numberRoomInWeek as  $item)
                    {{ $item['value'] }},
                @endforeach
            ],
        },
    ],
    chart: {
        height: 350,
        type: "bar",
        toolbar: {
            show: false,
        },
        events: {
            click: function (chart, w, e) {},
        },
    },
    colors: ["#f34451"],
    plotOptions: {
        bar: {
            columnWidth: "40%",
            distributed: true,
            startingShape: "rounded",
            endingShape: "rounded",
        },
    },
    dataLabels: {
        enabled: false,
    },
    legend: {
        show: false,
    },
    xaxis: {
        categories: [
            @foreach ( $numberRoomInWeek as  $item)
                    "{{ $item['thu'] }}",
                @endforeach
        ],
        labels: {
            style: {
                fontSize: "12px",
                fontFamily: "Roboto, sans-serif",
            },
        },
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
    },
    responsive: [
        {
            breakpoint: 576,
            options: {
                chart: {
                    height: 200,
                },
            },
        },
    ],
};

var chart = new ApexCharts(document.querySelector("#sale-chart"), options);
chart.render();
</script>