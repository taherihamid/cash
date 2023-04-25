Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: ''
        },
        labels: {
            formatter: function () {
                return this.value + '';
            }
        }
    },

    tooltip: {
        crosshairs: true,
        shared: true
    },

    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#70CC14',
                lineWidth: 1,
            }
        }
    },

    series: [{
        name: 'بازدید',
        data: [8,9,1,1,1,1,1,1,1,1,9,10]
    }]
});
