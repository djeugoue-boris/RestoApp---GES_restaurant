
<section>
	<div class="row">
    	<div class="col-md-offset-1 col-md-10 col-md-offset-1">
    		<div class="page-header">
    			<h1 class="text-info">
    				Bienvenue sur Resto App
    				<small><i>Vous satisfaire est notre priorité<i/></small>
    			</h1>
    		</div>

    		<div id="chart_dashboard"></div>   

        </div>
    </div>
</section>


<script type="text/javascript">
	Highcharts.chart('chart_dashboard', {
	    chart: {
	        type: 'bar'
	    },
	    title: {
	        text: 'Statistiques sur les commandes'
	    },
	    subtitle: {
	        text: ''
	    },
	    xAxis: {
	        categories: [
	        	'ELVIRA', 'NORA', 'TAMO', 'ESTHER', 'TINTIN'
	        ],
	        title: {
	            text: null
	        }
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Nombre de user',
	            align: 'high'
	        },
	        labels: {
	            overflow: 'justify'
	        }
	    },
	    tooltip: {
	        valueSuffix: ' user'
	    },
	    plotOptions: {
	        bar: {
	            dataLabels: {
	                enabled: true
	            }
	        }
	    },
	    legend: {
	        layout: 'vertical',
	        align: 'right',
	        verticalAlign: 'top',
	        x: -40,
	        y: 80,
	        floating: true,
	        borderWidth: 1,
	        backgroundColor:
	            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
	        shadow: true
	    },
	    credits: {
	        enabled: false
	    },
	    series: [{
	        name: 'nb user',
	        data: [12, 31, 35, 53, 6]
	    }]
	});

</script>








