var characterStats = function() {

    var option = {
        chart: {
            type: 'pie',
            backgroundColor:'rgba(255, 255, 255, 0.1)'
        },
        title: {
            text: ''
        },
        xAxis: {
                categories: [],
                title: {
                    text: null
                }
            },
        credits: {
            enabled: false
        },
        series: []
    };

    //$('#characterStats').highcharts();

    $.ajax({
        url: root + '/characters/stats',
        dataType: 'json',
        success: function(data)
        {
            option.series[0]                = data.data;
            option.series[0].showInLegend   = true;
            option.xAxis.categories         = data.data.series;
        
            $('#characterStats').highcharts(option);
        }
    })
}


$(function () {
    characterStats();
});
    
