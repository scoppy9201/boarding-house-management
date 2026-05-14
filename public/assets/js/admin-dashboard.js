// sale chart
var options = {
    series: [
        {
            data: [5, 12, 15, 18, 16, 20, 16, 13, 10, 6],
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
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "July",
            "Aug",
            "Sep",
            "Oct",
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

// timeline
var options2 = {
    series: [
        {
            data: [
                {
                    x: "Mon",
                    y: [0, 10],
                },
                {
                    x: "Tue",
                    y: [18, 10],
                },
                {
                    x: "Wed",
                    y: [20, 15],
                },
                {
                    x: "Thu",
                    y: [20, 30],
                },
            ],
        },
        {
            data: [
                {
                    x: "Mon",
                    y: [12, 20],
                },
                {
                    x: "Tue",
                    y: [25, 20],
                },
                {
                    x: "Wed",
                    y: [10, 14],
                },
                {
                    x: "Thu",
                    y: [5, 10],
                },
            ],
        },
    ],
    chart: {
        height: 365,
        type: "rangeBar",
        toolbar: {
            show: false,
        },
    },
    plotOptions: {
        bar: {
            horizontal: true,
            barHeight: "40%",
            rangeBarGroupRows: true,
        },
    },
    colors: ["#f34451", "#89c826"],
    xaxis: {
        type: "data",
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
    },
};

var chart1 = new ApexCharts(
    document.querySelector("#timeline-chart"),
    options2
);
chart1.render();

// top agents
var options3 = {
    series: [76, 67, 90],
    chart: {
        height: 420,
        offsetY: 0,
        sparkline: {
            enabled: true,
        },
        type: "radialBar",
    },
    plotOptions: {
        radialBar: {
            startAngle: -100,
            endAngle: 100,
            hollow: {
                margin: 5,
                size: "60%",
                background: "transparent",
                image: undefined,
            },
            dataLabels: {
                name: {
                    show: false,
                },
                value: {
                    fontSize: "30px",
                    show: false,
                },
                total: {
                    show: true,
                    label: "Total",
                    formatter: function (w) {
                        return 75;
                    },
                },
            },
        },
    },
    grid: {
        padding: {
            top: -10,
            bottom: 20,
        },
    },
    colors: ["#f34451", "#89c826", "#ffcc33"],
    labels: ["Vimeo", "Messenger", "LinkedIn"],
    responsive: [
        {
            breakpoint: 400,
            options: {
                chart: {
                    height: 360,
                },
            },
        },
        {
            breakpoint: 340,
            options: {
                chart: {
                    height: 320,
                },
            },
        },
    ],
};

var chart2 = new ApexCharts(document.querySelector("#Radial-chart"), options3);
chart2.render();
