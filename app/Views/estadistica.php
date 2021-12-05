<div id="container" style="height: 100%; margin-left: 10%; margin-top: 5%"></div>

<script>
    var dom = document.getElementById("container");
    var myChart = echarts.init(dom);
    var app = {};

    var option;

    option = {
        title: {
            text: 'Estadística de documentos',
            subtext: '',
            left: 'center'
        },
        tooltip: {
            trigger: 'item'
        },
        legend: {
            orient: 'vertical',
            left: 'left'
        },
        series: [{
            name: '',
            type: 'pie',
            radius: '70%',
            data: [{
                    value: 0,
                    name: ''
                },
                {
                    value: <?= $totalAtendidos ?>,
                    name: 'Atendidos',
                },
                {
                    value: <?= $totalAsignados ?>,
                    name: 'Asignados'
                },
                {
                    value: <?= $totalPendientes ?>,
                    name: 'Pendienets'
                },
                {
                    value: 0,
                    name: ''
                }
            ],
            emphasis: {
                itemStyle: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }]
    };



    if (option && typeof option === 'object') {
        myChart.setOption(option);
    }
</script>