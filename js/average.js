$(function () {
    var chart = Highcharts.chart('graph-average', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: null
            },

        },
        tooltip: {
            crosshairs: true,
            shared: true,
            /*formatter: function() {
               return 'Extra data: <b>'+ this.point.myData +'</b>';
     				}*/
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Voto',
            data: [
                 { y : 28, myData : 'secondPoint' },
                 { y : 27, myData : 'secondPoint' },
                 { y : 28, myData : 'secondPoint' },
                 { y : 26, myData : 'secondPoint' },
                 { y : 25, myData : 'secondPoint' },
                 { y : 22, myData : 'secondPoint' }, ]
        }, {
            name: 'Media',
            data: [28,27.5,27.6,27.3,26.4,24.5]
          }]
    });

    $('#collapse-votes-graph').on('shown.bs.collapse', function () {
      chart.reflow();
    });
});
