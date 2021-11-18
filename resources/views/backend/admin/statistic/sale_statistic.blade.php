@extends('backend.master')
@section('title','Thống Kê Doanh Thu')
@section('content')
<div class="row">
	<div class="col-sm-8">
		<div id="container" style="min-width: 310px;height: 400px;margin: 0 auto;"></div>
	</div>
</div>
	
@endsection
@section('js')
<script src="{{ asset('/public/admin/js/highcharts.js') }}"></script>
<script src="{{ asset('/public/admin/js/data.js') }}"></script>
<script src="{{ asset('/public/admin/js/drilldown.js') }}"></script>
<script type="text/javascript">
	// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Biểu Đồ doanh thu theo Ngày/Tháng/Năm '
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Mức độ tăng trưởng'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f} VNĐ'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} VNĐ</b> of total<br/>'
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: [
                {
                    name: "Doanh Thu Ngày",
                    y: {{ (int)$totalDay }},
                    drilldown: "Doanh Thu Ngày"
                },
                {
                    name: "Doanh Thu Tháng",
                    y: {{ (int)$totalMonth }},
                    drilldown: "Doanh Thu Tháng"
                },
                {
                    name: "Doanh Thu Năm",
                    y: {{ (int)$totalYear }},
                    drilldown: "Doanh Thu Năm"
                },
            ]
        }
    ]
});
</script>
@endsection
