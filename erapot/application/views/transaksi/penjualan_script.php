<script>

		Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
 
		var torochan = <?php if(isset($aftereffect)) echo $aftereffect; else echo '0'; ?>;
		if (torochan > 0) window.open("<?php echo base_url("hotline"); ?>/print_faktur/"+torochan);
		function validateForm() {
			var check = true;
			var error = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-info-circle"></i>  <strong>ERROR!</strong><br />';
			// check apakah tanggal sudah terisi
			if ($("#tanggal").val()=='') {
				check = false;
				error += 'Anda harus mengisi tanggal Purchase Order<br/>';
			}
			// check apakah customer terisi
			if ($("#customer").val()=='') {
				check = false;
				error += 'Anda harus mengisi customer yang melakukan penjualan<br/>';
			}
			// check input spare part
			var rowCount = $('#toro tr').length;
			if (rowCount < 2) {
				check = false;
				error += 'Anda harus mengisi spare part apa saja yang dijual, minimal 1 part';
			}
			error += '</div>';
			if (check == false) $("#error-area").html(error);
			return check;
		}
		
		function motor_selected() {
			if ($('#customer-motor').val() == '') $('#motor-area').html('');
			else {
				$.get("<?php echo base_url("hotline"); ?>/auto_motor_selected?q="+$('#customer-motor').val(), function(data) {
					$("#motor-area").html(data);
				});
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
				$('#t6-'+i).attr("id","t6-"+(i-1));
				$('#t7-'+i).attr("id","t7-"+(i-1));
				$('#t8-'+i).attr("id","t8-"+(i-1));
				$('#t9-'+i).attr("id","t9-"+(i-1));
				$('#t10-'+i).html('<a class="btn btn-danger" href="#" onclick="deleted('+(i-1)+');"><i class="fa fa-trash"></i></a>');
				$('#t10-'+i).attr("id","t10-"+(i-1));
				$('input[name="ids['+(i-1)+']"]').attr("name","ids["+(i-2)+"]");
				$('input[name="banyak['+(i-1)+']"]').attr("name","banyak["+(i-2)+"]");
				$('input[name="po_id['+(i-1)+']"]').attr("name","po_id["+(i-2)+"]");
				$('input[name="po_nama['+(i-1)+']"]').attr("name","po_nama["+(i-2)+"]");
				$('input[name="satuan['+(i-1)+']"]').attr("name","satuan["+(i-2)+"]");
				$('input[name="harga['+(i-1)+']"]').attr("name","harga["+(i-2)+"]");
				$('input[name="disc['+(i-1)+']"]').attr("name","disc["+(i-2)+"]");
				//$('input[name="sub['+(i-1)+']"]').attr("name","sub["+(i-2)+"]");
			}
			hitung();
		}
		
		function hitung() {
			var rowCount = $('#toro tr').length;
			var rowCount1 = $('#toroserv tr').length;
			var toros = 0;
			var toro = 0; var toro1 = 0;
			var sub = 0; var sub1 = 0;
			var diskon = 0; var diskon1 = 0;
			var total = 0; var total1 = 0;
			var ppn = 0;
			var akhir = 0;
			if ($('input[name="ppn"]').val() == '') $('input[name="ppn"]').val(0);
			if (parseFloat($('input[name="ppn"]').val()) > 100) $('input[name="ppn"]').val(0);
			for (var i=2;i<=rowCount;i++) {
				toros = toros + parseInt($('input[name="banyak['+(i-2)+']"]').val());
				diskon = parseFloat(diskon) + parseFloat($('input[name="disc['+(i-2)+']"]').val())/100*parseFloat($('input[name="banyak['+(i-2)+']"]').val())*parseFloat($('input[name="harga['+(i-2)+']"]').val());
				diskon1 = parseFloat($('input[name="disc['+(i-2)+']"]').val())/100*parseFloat($('input[name="banyak['+(i-2)+']"]').val())*parseFloat($('input[name="harga['+(i-2)+']"]').val());
				sub = parseFloat(sub) + parseFloat($('input[name="banyak['+(i-2)+']"]').val())*parseFloat($('input[name="harga['+(i-2)+']"]').val()) - parseFloat(diskon1);
				toro = parseFloat($('input[name="banyak['+(i-2)+']"]').val())*parseFloat($('input[name="harga['+(i-2)+']"]').val())-parseFloat(diskon1);
				total = parseFloat(total) + toro;
				$('#t9-'+(i-1)).html(toro.formatMoney(2));
			}
			ppn = parseFloat($('input[name="ppn"]').val())/100*parseFloat(total);
			akhir = parseFloat(total)+parseFloat(ppn);
			$('#total-jenis').html(rowCount-1);
			$('#total-part').html(toros);
			$('#total-harga').html(sub.formatMoney(2));
			$('#total-diskon').html(diskon.formatMoney(2));
			$('#total-ppn').html(ppn.formatMoney(2));
			$('#total-akhir').html(akhir.formatMoney(2));
		}
		
		<?php if (isset($detils)) echo '$("input[type=\'number\']").change(function(){hitung();});hitung();'; ?>
		
		$(function() {
			function log(id,label) {
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
				var optionsValue="";
				<?php if (isset($satuan)) : $a = 0; ?>
				<?php foreach ($satuan as $key => $value) : $a++; ?>
				<?php if ($a == 1) : ?>
				optionsValue = optionsValue + '<option value="<?= $value['id'] ?>" selected><?= $value['nama'] ?></option>';
				<?php else : ?>
				optionsValue = optionsValue + '<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>';
				<?php endif; ?>
				<?php endforeach; ?>
				<?php endif; ?>
				if (temu == 0) {
					$('#toro-body').append('<tr id="t-'+rowCount+'"><td id="t0-'+rowCount+'">'+rowCount+
						'</td><td id="t1-'+rowCount+'">'+id+
						'</td><td id="t2-'+rowCount+'">'+label+'<input type="hidden" name="ids['+(rowCount-1)+']" value="'+id+
						'"></td><td id="t3-'+rowCount+'"><input class="form-control" type="text" name="po_id['+(rowCount-1)+
						'"></td><td id="t4-'+rowCount+'"><input class="form-control" type="text" name="po_nama['+(rowCount-1)+
						'"></td><td id="t5-'+rowCount+'"><input class="form-control" type="number" name="banyak['+(rowCount-1)+
						']" value="1"></td><td id="t6-'+rowCount+'" width="100"><select class="form-control" name="satuan['+(rowCount-1)+
						']">'+optionsValue+'</select></td><td id="t7-'+rowCount+'"><input class="form-control" type="number" name="harga['+(rowCount-1)+
						']" value="0"></td><td id="t8-'+rowCount+'"><input class="form-control" type="number" name="disc['+(rowCount-1)+
						']" value="0"></td><td id="t9-'+rowCount+'">'+'0'+'<input type="hidden" name="sub['+(rowCount-1)+']" value="'+'0'+
						'"></td><td id="t10-'+rowCount+
						'"><a class="btn btn-danger" href="#" onclick="deleted('+rowCount+');"><i class="fa fa-trash"></i></a></td></tr>');
				}
				$("input[type='number']").change(function(){
					hitung();
				});
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
					log(ui.item.value, ui.item.label1);
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
					var custdetil = '<address><strong>'+ui.item.label+'</strong><br>'+ui.item.alamat+
						'<br><abbr title="Phone">P:</abbr> '+ui.item.telp+'</address>';
					$("#customer-area").html(custdetil);
					return false;
				},
				focus: function( event, ui ) {
					$("#customer-name").val( ui.item.label );
					return false;
				},
			});
			
			$("#tanggal").datepicker({
				dateFormat : "yy-mm-dd",
				showButtonPanel : true
			});
		});
	</script>