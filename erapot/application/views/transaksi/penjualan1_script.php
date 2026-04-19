<script>
		var torochan = <?php if(isset($aftereffect)) echo $aftereffect; else echo '0'; ?>;
		if (torochan > 0) window.open("<?php echo base_url("penjualan"); ?>/print_faktur/"+torochan);
		function validateForm() {
			var check = true;
			var error = '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>ERROR!</strong><br />';
			// check apakah tanggal sudah terisi
			if ($("#tanggal").val()=='') {
				check = false;
				error += 'Anda harus mengisi tanggal pembelian<br/>';
			}
			// check apakah customer terisi
			if ($("#customer").val()=='') {
				check = false;
				error += 'Anda harus mengisi customer yang melakukan pemesanan<br/>';
			}
			// check apakah customer motor terisi
			if ($("#customer-motor").val()=='') {
				check = false;
				error += 'Anda harus mengisi sepeda motor yang dimiliki customer<br/>';
			}
			// check apakah mekanik terisi
			if ($("#mekanik").val()=='') {
				check = false;
				error += 'Anda harus mengisi mekanik yang bertanggung jawab atas customer<br/>';
			}
			// check input spare part
			var rowCount = $('#toro tr').length;
			if (rowCount < 2) {
				check = false;
				error += 'Anda harus mengisi spare part apa saja yang dibeli, minimal 1 buah';
			}
			error += '</div>';
			if (check == false) $("#error-area").html(error);
			return check;
		}
		
		function motor_selected() {
			if ($('#customer-motor').val() == '') $('#motor-area').html('');
			else {
				$.get("<?php echo base_url("penjualan"); ?>/auto_motor_selected?q="+$('#customer-motor').val(), function(data) {
					$("#motor-area").html(data);
				});
			}
		}
		
		function hotline_selected() {
				$.get("<?php echo base_url("penjualan"); ?>/auto_hotline_selected?q="+$('#hotline').val(), function(data) {
					$("#hotline-area").html(data);
				}).success(function() {hitung();});
		}
		
		function kpb_selected() {
			if ($('#kpb').val() >= 1 && $('#kpb').val() <= 4) {
				var rowCount = $('#toroserv tr').length;
				var i = 1;
				for (var i=2;i<=rowCount;i++) {
					$('input[name="harga1['+(i-2)+']"]').val(0);
					$('input[name="diskon1['+(i-2)+']"]').val(0);
				}
				hitung();
			}
		}
		
		function deleted(id) {
			var rowCount = $('#toro tr').length;
			$('#t-'+id).remove();
			var i = id;
			for (i=id+1;i<rowCount;i++) {
				$('#t-'+i).attr("id","t-"+(i-1));
				$('#t0-'+i).html(i-1);
				$('#t0-'+i).attr("id","t0-"+(i-1));
				$('#t1-'+i).attr("id","t1-"+(i-1));
				$('#t2-'+i).attr("id","t2-"+(i-1));
				$('#t3-'+i).attr("id","t3-"+(i-1));
				$('#t4-'+i).attr("id","t4-"+(i-1));
				$('#t5-'+i).attr("id","t5-"+(i-1));
				$('#t6-'+i).html('<a class="btn btn-small" href="#" onclick="deleted('+(i-1)+');">Remove</a>');
				$('#t6-'+i).attr("id","t6-"+(i-1));
				$('input[name="ids['+(i-1)+']"]').attr("name","ids["+(i-2)+"]");
				$('input[name="banyak['+(i-1)+']"]').attr("name","banyak["+(i-2)+"]");
				$('input[name="harga['+(i-1)+']"]').attr("name","harga["+(i-2)+"]");
				$('input[name="diskon['+(i-1)+']"]').attr("name","diskon["+(i-2)+"]");
			}
			hitung();
		}
		function deletedserv(id) {
			var rowCount = $('#toroserv tr').length;
			$('#u-'+id).remove();
			var i = id;
			for (i=id+1;i<rowCount;i++) {
				$('#u-'+i).attr("id","u-"+(i-1));
				$('#u0-'+i).html(i-1);
				$('#u0-'+i).attr("id","u0-"+(i-1));
				$('#u1-'+i).attr("id","u1-"+(i-1));
				$('#u2-'+i).attr("id","u2-"+(i-1));
				$('#u3-'+i).attr("id","u3-"+(i-1));
				$('#u4-'+i).attr("id","u4-"+(i-1));
				$('#u5-'+i).html('<a class="btn btn-small" href="#" onclick="deletedserv('+(i-1)+');">Remove</a>');
				$('#u5-'+i).attr("id","u5-"+(i-1));
				$('input[name="ids1['+(i-1)+']"]').attr("name","ids1["+(i-2)+"]");
				$('input[name="harga1['+(i-1)+']"]').attr("name","harga1["+(i-2)+"]");
				$('input[name="diskon1['+(i-1)+']"]').attr("name","diskon1["+(i-2)+"]");
			}
			hitung();
		}
		
		function hitung() {
			var rowCount = $('#toro tr').length;
			var rowCount1 = $('#toroserv tr').length;
			var toro = 0; var toro1 = 0;
			var sub = 0; var sub1 = 0;
			var diskon = 0; var diskon1 = 0;
			var total = 0; var total1 = 0;
			for (var i=2;i<=rowCount;i++) {
				toro = parseInt($('input[name="banyak['+(i-2)+']"]').val())*parseInt($('input[name="harga['+(i-2)+']"]').val())-parseInt($('input[name="diskon['+(i-2)+']"]').val());
				sub = parseInt(sub) + parseInt($('input[name="banyak['+(i-2)+']"]').val())*parseInt($('input[name="harga['+(i-2)+']"]').val());
				diskon = parseInt(diskon) + parseInt($('input[name="diskon['+(i-2)+']"]').val());
				total = parseInt(total) + toro;
				$('#t5-'+(i-1)).html(toro);
			}
			for (i=2;i<=rowCount1;i++) {
				toro1 = parseInt($('input[name="harga1['+(i-2)+']"]').val())-parseInt($('input[name="diskon1['+(i-2)+']"]').val());
				sub1 = parseInt(sub1) + parseInt($('input[name="harga1['+(i-2)+']"]').val());
				diskon1 = parseInt(diskon1) + parseInt($('input[name="diskon1['+(i-2)+']"]').val());
				total1 = parseInt(total1) + toro1;
				$('#u4-'+(i-1)).html(toro1);
			}
			$('#total-spare').html(sub);
			$('#diskon-spare').html(diskon);
			$('#total-service').html(sub1);
			$('#diskon-service').html(diskon1);
			$('#total-hotline').html($('#toro-hotlines').val());
			$('#dp-hotline').html($('#toro-hotline-bayar').val());
			$('#total').html(total+total1+parseInt($('#toro-hotlines').val())-parseInt($('#toro-hotline-bayar').val()));
		}
		$(function() {
			function log(id,label,harga) {
				var rowCount = $('#toro tr').length;
				//check apakah sudah ada atau belum
				var temu = 0;
				for (var i = 2; i <= rowCount; i++) {
					var j = $('input[name="ids['+(i-2)+']"]').val();
					var k = parseInt($('input[name="banyak['+(i-2)+']"]').val());
					if (j == id) {
						$('input[name="banyak['+(i-2)+']"]').val(k+1);
						temu = 1;
					}
				}
				if (temu == 0) {
					$('#toro-body').append('<tr id="t-'+rowCount+'"><td id="t0-'+rowCount+'">'+rowCount+
						'</td><td id="t1-'+rowCount+'">'+label+'<input type="hidden" name="ids['+(rowCount-1)+']" value="'+id+
						'"></td><td id="t2-'+rowCount+'"><input class="input-mini" type="number" name="banyak['+(rowCount-1)+
						']" value="1" onblur="hitung()"></td><td id="t3-'+rowCount+
						'"><input class="input-small" type="number" name="harga['+(rowCount-1)+']" value="'+harga+
						'" onblur="hitung()"></td><td id="t4-'+rowCount+'"><input class="input-small" type="number" name="diskon['+(rowCount-1)+
						']" value="0" onblur="hitung()"></td><td id="t5-'+rowCount+'">0</td><td id="t6-'+rowCount+
						'"><a class="btn btn-small" href="#" onclick="deleted('+rowCount+');">Remove</a></td></tr>');
				}
				hitung();	
			}
			
			function logserv(id,label,harga) {
				var rowCount = $('#toroserv tr').length;
				//check apakah sudah ada atau belum
				var temu = 0;
				for (var i = 2; i <= rowCount; i++) {
					var j = $('input[name="ids1['+(i-2)+']"]').val();
					if (j == id) {
						temu = 1;
					}
				}
				if (temu == 0) {
					$('#toroserv-body').append('<tr id="u-'+rowCount+'"><td id="u0-'+rowCount+'">'+rowCount+
						'</td><td id="u1-'+rowCount+'">'+label+'<input type="hidden" name="ids1['+(rowCount-1)+']" value="'+id+
						'"></td><td id="u2-'+rowCount+
						'"><input class="input-small" type="number" name="harga1['+(rowCount-1)+']" value="'+harga+
						'" onblur="hitung()"></td><td id="u3-'+rowCount+'"><input class="input-small" type="number" name="diskon1['+(rowCount-1)+
						']" value="0" onblur="hitung()"></td><td id="u4-'+rowCount+'">0</td><td id="u5-'+rowCount+
						'"><a class="btn btn-small" href="#" onclick="deletedserv('+rowCount+');">Remove</a></td></tr>');
				}
				hitung();	
			}
 
			$("#city").autocomplete({
				source: function( request, response ) {
					$.ajax({
						url: "<?php echo base_url("penjualan"); ?>/auto_barang",
						dataType: "json",
						data: {
							q: request.term
						},
						success: function( data ) {
							response( data );
						}
					});
				},
				minLength: 1,
				select: function( event, ui ) {
					log(ui.item.value, ui.item.label, ui.item.harga);
					$("#city").val( '' );
					return false;
				},
				focus: function( event, ui ) {
					$("#city").val( ui.item.label );
					return false;
				},
				open: function() {
					$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
				},
				close: function() {
					$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
				}
			});
			
			$("#service").autocomplete({
				source: function( request, response ) {
					$.ajax({
						url: "<?php echo base_url("penjualan"); ?>/auto_service",
						dataType: "json",
						data: {
							q: request.term
						},
						success: function( data ) {
							response( data );
						}
					});
				},
				minLength: 1,
				select: function( event, ui ) {
					logserv(ui.item.value, ui.item.label, ui.item.harga);
					$("#service").val( '' );
					return false;
				},
				focus: function( event, ui ) {
					$("#service").val( ui.item.label );
					return false;
				},
				open: function() {
					$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
				},
				close: function() {
					$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
				}
			});
			
			$("#customer-name").autocomplete({
				source: function( request, response ) {
					$.ajax({
						url: "<?php echo base_url("penjualan"); ?>/auto_customer",
						dataType: "json",
						data: {
							q: request.term
						},
						success: function( data ) {
							response( data );
						}
					});
				},
				minLength: 1,
				select: function( event, ui ) {
					$('input[name="customer"]').val(ui.item.value);
					var custdetil = '<address><strong>'+ui.item.label+'</strong><br>'+ui.item.alamat+'</address>';
					$("#customer-area").html(custdetil);
					$.get("<?php echo base_url("penjualan"); ?>/auto_motor?q="+ui.item.value, function(data) {
						$("#motor-control").html(data);
					});
					$.get("<?php echo base_url("penjualan"); ?>/auto_hotline?q="+ui.item.value, function(data) {
						$("#hotline-control").html(data);
					});
					$('select[name="kpb"]').removeAttr('disabled');
					return false;
				},
				focus: function( event, ui ) {
					$("#customer-name").val( ui.item.label );
					return false;
				},
			});
			
			$("#mekanik-name").autocomplete({
				source: function( request, response ) {
					$.ajax({
						url: "<?php echo base_url("penjualan"); ?>/auto_mekanik",
						dataType: "json",
						data: {
							q: request.term
						},
						success: function( data ) {
							response( data );
						}
					});
				},
				minLength: 1,
				select: function( event, ui ) {
					$('input[name="mekanik"]').val(ui.item.value);
					var custdetil = '<address><strong>'+ui.item.label+'</strong><br>'+ui.item.alamat+'</address>';
					$("#mekanik-area").html(custdetil);
					return false;
				},
				focus: function( event, ui ) {
					$("#mekanik-name").val( ui.item.label );
					return false;
				},
			});
			
			$("#tanggal").datepicker({
				dateFormat : "yy-mm-dd",
				showButtonPanel : true
			});
		});
	</script>