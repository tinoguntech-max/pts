	
	<script>
		var startDate;
		var endDate;
		var startDate1;
		var endDate1;
		
		function validateForm() {
			$( "#btn-submit" ).prop( "disabled", true );
			$( "#btn-submit" ).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
			var check = true;
			var error = '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>ERROR!</strong><br />';
			// check apakah tanggal sudah terisi
			if ($("#tgl1").val()=='') {
				check = false;
				error += 'Anda harus mengisi tanggal pembuatan laporan<br/>';
			}
			// check selected
			var brands = $('#m_cabang option:selected');
			var selected = [];
			/*if (brands.length == 0) {
				check = false;
				error += 'Anda harus memilih minimal satu cabang<br/>';
			}*/
			if (brands.length > 8) {
				check = false;
				error += 'Anda hanya bisa memilih maksimal 8 barang<br/>';
			}
			error += '</div>';
			if (check == false) {
				$("#error-area").html(error);
				$( "#btn-submit" ).html('Buat Laporan');
				$( "#btn-submit" ).prop( "disabled", false );
			}
			else generate_laporan();
		}
		
		function generate_laporan() {
			var brands = $('#m_cabang option:selected');
			var selected = [];
			if (brands.length <= 8 && brands.length > 0) {
				$(brands).each(function(index, brand){
					selected.push(["--"+$(this).val()+"--"]);
				});
			}
			else {
				selected.push(["0"]);
			}

			var a; var b;
			if ($('#tgl3').val() == '') {
				a = '0';
				b = '0';
			}
			else {
				a = moment(startDate1).format('YYYY-MM-DD');
				b = moment(endDate1).format('YYYY-MM-DD');
			}

			$.get("<?php echo base_url("laporan_beli_infographic"); ?>/laporan_beli_minta_ajax/"+moment(startDate).format('YYYY-MM-DD')+
			"/"+moment(endDate).format('YYYY-MM-DD')+"/"+encodeURIComponent(selected)+"/"+
			"/"+a+"/"+b, function(data) {
				var datas = Object.values(data);
				console.log(datas);
				data1 = datas[0]['records'];
				data2 = datas[0]['goods_type'];
				data3 = datas[0]['goods_qty'];
				dataset = [data1, data2, data3];
				ToggleSeries();
				$( "#btn-submit" ).html('Buat Laporan');
				$( "#btn-submit" ).prop( "disabled", false );
			});
		}

		$(function() {
			/*$("#tgl1").datepicker({
				dateFormat : "yy-mm-dd",
				showButtonPanel : true
			});
			$("#tgl2").datepicker({
				dateFormat : "yy-mm-dd",
				showButtonPanel : true
			});*/
			
			var start = moment().subtract(29, 'days');
			var end = moment();
			var start1 = moment();
			var end1 = moment();

			function cb(start, end)
			 {
				$('#tgl1 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				startDate = start;
				endDate = end;
			}

			function cb1(start, end)
			 {
				$('#tgl3 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				startDate1 = start;
				endDate1 = end;
			}

			$('#tgl1').daterangepicker({
				startDate: start,
				endDate: end,
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				}
			}, cb);
			cb(start, end);

			$('#tgl3').daterangepicker({
				autoUpdateInput: false,
				locale: {
					cancelLabel: 'Clear'
				}
			}, cb1);
			$('#tgl3').on('apply.daterangepicker', function(ev, picker) {
				$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
			});
			$('#tgl3').on('cancel.daterangepicker', function(ev, picker) {
				$(this).val('');
			});
		});
		
		$(document).ready(function() {
			$('#m_cabang').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
			$('#m_ship_subcon').multiselect({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
		});
		
		
			var data1 = <?php if(isset($records)) echo $records; ?>;
			var data2 = <?php if(isset($goods_type)) echo $goods_type; ?>;
			var data3 = <?php if(isset($goods_qty)) echo $goods_qty; ?>;
			
			function GenerateSeries(added) {
				var data = [];
				var start = 100 + added;
				var end = 200 + added;
				for (i = 1; i <= 100; i++) {
					var d = Math.floor(Math.random() * (end - start + 1) + start);
					data.push([i, d]);
					start++;
					end++;
				}
				return data;
			}
			
			var options = {
				series: {
					shadowSize: 0
				},
				xaxis:  {
					tickFormatter: function (val, axis) {
						return (moment.unix(val).format("DD/MM/YYYY"));
					}
				},
				grid: {
					hoverable: true,
					clickable: true,
					tickColor: "#f9f9f9",
					borderWidth: 1,
					borderColor: "#eeeeee"
				},
				colors: ["#4EC9B4", "#975197", "#dcdcdc"],
				tooltip: true,
				tooltipOpts: {
					defaultTheme: false,
					content: function (label, x, y) {
						var tooltip = 'Date: ' + moment.unix(x).format("DD/MM/YYYY") + ', Count: ' + y;
						return tooltip;
					},
				},
				legend: {
					position: 'nw',
					labelBoxBorderColor: "#000000",
					container: $("#bar-chart #legend-placeholder"),
					noColumns: 0
				}
			};
			var plot;
			
			function ToggleSeries() {
				var dataset = [];
				
				$("#toggle-chart input[type='radio']").each(function() {
					if ($(this).is(":checked")) {
						if ($(this).val() == "line") {
							dataset = [data1, data2, data3];
							options.series = {
								stack: true,
								shadowSize: 0,
							}
							options.series.lines = {fill: true};
						} else if ($(this).val() == "bar") {
							dataset = [data1, data2, data3];
							options.series = {
								stack: true,
								shadowSize: 0,
							}
							options.series.bars = {show: true};
						} else {
							dataset = [{
								label: "Transactions",
								data: data1,
								lines: {
									show: true,
									fill: true
								},
								points: {
									show: true
								}
							}, {
								label: "Goods Type",
								data: data2,
								lines: {
									show: true
								},
								points: {
									show: true
								}
							}, {
								label: "Goods Quantity",
								data: data3,
								bars: {
									show: true
								}
							}];
						}
					}
				});
				
				var d = [];
				$("#toggle-chart input[type='checkbox']").each(function() {
					if ($(this).is(":checked")) {
						var seqence = $(this).attr("id").replace("cbdata", "");
						d.push({
							label: "data" + seqence,
							data: dataset[seqence - 1]
						});
					}
				});
				
				$.plot($("#toggle-chart #toggle-chart-container"), d, options);
			}
			$("#toggle-chart input").change(function() {
				ToggleSeries();
			});
			ToggleSeries();
		
	</script>