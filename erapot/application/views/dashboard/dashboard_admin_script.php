<script>
	Highcharts.chart('container', {
		title: {
			text: ''
		},
		xAxis: {
			categories: [
				<?php if (isset($data_tanggal)) : ?>
				<?php if (is_array($data_tanggal)) : ?>
				<?php for($i=0; $i<count($data_tanggal); $i++) : ?>
				`<?= $data_tanggal[$i] ?>`,
				<?php endfor; ?>
				<?php endif; ?>
				<?php endif; ?>
			]
		},
		labels: {
			items: [{
				html: 'Total fruit consumption',
				style: {
					left: '50px',
					top: '18px',
					color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
				}
			}]
		},
		series: [
		{
			type: 'column',
			name: 'Purchasing',
			data: [
				<?php if (isset($sum_beli_day)) : ?>
				<?php if (is_array($sum_beli_day)) : ?>
				<?php for($i=0; $i<count($sum_beli_day); $i++) : ?>
				<?= $sum_beli_day[$i] ?>,
				<?php endfor; ?>
				<?php endif; ?>
				<?php endif; ?>
			]
		}, {
			type: 'column',
			name: 'Sales',
			data: [
				<?php if (isset($sum_jual_day)) : ?>
				<?php if (is_array($sum_jual_day)) : ?>
				<?php for($i=0; $i<count($sum_jual_day); $i++) : ?>
				<?= $sum_jual_day[$i] ?>,
				<?php endfor; ?>
				<?php endif; ?>
				<?php endif; ?>
			]
		}, {
			type: 'spline',
			name: 'Average Purchasing',
			data: [
				<?php if (isset($sum_beli_day)) : ?>
				<?php if (is_array($sum_beli_day)) : ?>
				<?php for($i=0; $i<count($sum_beli_day); $i++) : ?>
				<?= ($jml_beli_day[$i] > 0) ? ($sum_beli_day[$i]/$jml_beli_day[$i]) : 0 ?>,
				<?php endfor; ?>
				<?php endif; ?>
				<?php endif; ?>
			],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[3],
				fillColor: 'white'
			}
		}, {
			type: 'spline',
			name: 'Average Sales',
			data: [
				<?php if (isset($sum_jual_day)) : ?>
				<?php if (is_array($sum_jual_day)) : ?>
				<?php for($i=0; $i<count($sum_jual_day); $i++) : ?>
				<?= ($jml_jual_day[$i] > 0) ? ($sum_jual_day[$i]/$jml_jual_day[$i]) : 0 ?>,
				<?php endfor; ?>
				<?php endif; ?>
				<?php endif; ?>
			],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[3],
				fillColor: 'white'
			}
		}]
	});
</script>