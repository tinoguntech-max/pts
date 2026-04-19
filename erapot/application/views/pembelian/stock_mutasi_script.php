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
 
		var torochan = 0;
		
		function validateForm() {
			$( "#btn-submit" ).prop( "disabled", true );
			$( "#btn-submit" ).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
			var check = true;
			var error = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-info-circle"></i>  <strong>ERROR!</strong><br />';
			// check apakah tanggal sudah terisi
			if ($("#tanggal_buat").val()=='') {
				check = false;
				error += 'Anda harus mengisi tanggal pembuatan<br/>';
			}
			if (torochan != 0) {
				var startDt = $("#tanggal_buat").val();
				if( (new Date(startDt).getTime() > new Date(torochan).getTime())) {
					check = false;
					error += 'Anda tidak diperkenankan melakukan backdate. Tanggal minimum: '+torochan+'<br/>';
				}
			}
			if ($("#tanggal_diperlukan").val()=='') {
				check = false;
				error += 'Anda harus mengisi tanggal diperlukan<br/>';
			}
			// check input spare part
			var rowCount = $('#toro tr').length;
			if (rowCount < 2) {
				check = false;
				error += 'Anda harus mengisi barang apa saja yang diminta, minimal 1 barang';
			}
			// check jumlah sparepart
			for (var i=2;i<=rowCount;i++) {
				if (parseFloat($('input[name="banyak['+(i-2)+']"]').val()) == 0) {
					check = false;
					error += 'Row #'+(i-1)+': Jumlah barang yang akan dimutasi tidak boleh 0';
				}
			}
			error += '</div>';
			if (check == false) {
				$("#error-area").html(error);
				$( "#btn-submit" ).html('<i class="fa fa-hdd-o"></i> Simpan Data');
				$( "#btn-submit" ).prop( "disabled", false );
			}
			return check;
		}
		
		function cabang_selected() {
			if ($('#m_cabang').val() == '') {
				$( "#m_cabang_tujuan" ).prop( "disabled", true );
				$( "#tanggal_buat" ).prop( "disabled", true );
				$( "#tanggal_diperlukan" ).prop( "disabled", true );
				$( "#city" ).prop( "disabled", true );
			}
			else {
				$( "#m_cabang_tujuan" ).prop( "disabled", false );
				$( "#tanggal_buat" ).prop( "disabled", false );
				$( "#tanggal_diperlukan" ).prop( "disabled", false );
				$( "#city" ).prop( "disabled", false );
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
				$('#t5-'+i).attr("id","t5-"+(i-1));
				$('#t6-'+i).attr("id","t6-"+(i-1));
				$('#t7-'+i).attr("id","t7-"+(i-1));
				$('#t10-'+i).html('<a class="btn btn-danger" href="#" onclick="deleted('+(i-1)+');"><i class="fa fa-trash"></i></a>');
				$('#t10-'+i).attr("id","t10-"+(i-1));
				$('input[name="ids['+(i-1)+']"]').attr("name","ids["+(i-2)+"]");
				$('input[name="banyak['+(i-1)+']"]').attr("name","banyak["+(i-2)+"]");
				$('input[name="keterangan['+(i-1)+']"]').attr("name","keterangan["+(i-2)+"]");
				//$('input[name="satuan['+(i-1)+']"]').attr("name","satuan["+(i-2)+"]");
				//$('input[name="harga['+(i-1)+']"]').attr("name","harga["+(i-2)+"]");
				//$('input[name="disc['+(i-1)+']"]').attr("name","disc["+(i-2)+"]");
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
			for (var i=2;i<=rowCount;i++) {
				if (parseFloat($('input[name="banyak['+(i-2)+']"]').val()) < 0.01)
					$('input[name="banyak['+(i-2)+']"]').val(0.01);
				if (parseFloat($('input[name="banyak['+(i-2)+']"]').val()) > parseFloat($('#t8-'+(i-1)+'').html()))
					$('input[name="banyak['+(i-2)+']"]').val(parseFloat($('#t8-'+(i-1)+'').html()));
			}
			//if ($('input[name="ppn"]').val() == '') $('input[name="ppn"]').val(0);
			//if (parseFloat($('input[name="ppn"]').val()) > 100) $('input[name="ppn"]').val(0);
			for (var i=2;i<=rowCount;i++) {
				toros = toros + parseInt($('input[name="banyak['+(i-2)+']"]').val());
				/*diskon = parseFloat(diskon) + parseFloat($('input[name="disc['+(i-2)+']"]').val())/100*parseFloat($('input[name="banyak['+(i-2)+']"]').val())*parseFloat($('input[name="harga['+(i-2)+']"]').val());
				diskon1 = parseFloat($('input[name="disc['+(i-2)+']"]').val())/100*parseFloat($('input[name="banyak['+(i-2)+']"]').val())*parseFloat($('input[name="harga['+(i-2)+']"]').val());
				sub = parseFloat(sub) + parseFloat($('input[name="banyak['+(i-2)+']"]').val())*parseFloat($('input[name="harga['+(i-2)+']"]').val()) - parseFloat(diskon1);
				toro = parseFloat($('input[name="banyak['+(i-2)+']"]').val())*parseFloat($('input[name="harga['+(i-2)+']"]').val())-parseFloat(diskon1);
				total = parseFloat(total) + toro;
				$('#t9-'+(i-1)).html(toro.formatMoney(2));*/
			}
			//ppn = parseFloat($('input[name="ppn"]').val())/100*parseFloat(total);
			//akhir = parseFloat(total)+parseFloat(ppn);
			$('#total-jenis').html(rowCount-1);
			$('#total-part').html(toros);
			//$('#total-harga').html(sub.formatMoney(2));
			//$('#total-diskon').html(diskon.formatMoney(2));
			//$('#total-ppn').html(ppn.formatMoney(2));
			//$('#total-akhir').html(akhir.formatMoney(2));
		}
		
		<?php if (isset($detils)) echo '$("input[type=\'number\']").change(function(){hitung();});hitung();'; ?>
		
		$(function() {
			function log(id,label,satuan,stock_pengirim,stock_tujuan) {
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
						'</td><td id="t1-'+rowCount+'">'+id+
						'</td><td id="t2-'+rowCount+'">'+label+'<input type="hidden" name="ids['+(rowCount-1)+']" value="'+id+
						'"></td><td id="t5-'+rowCount+'"><input class="form-control" type="number" step="0.01" name="banyak['+(rowCount-1)+
						']" value="1"></td><td id="t6-'+rowCount+'">'+satuan+
						'</td><td id="t8-'+rowCount+'">'+stock_pengirim+
						'</td><td id="t9-'+rowCount+'">'+stock_tujuan+
						'</td><td id="t7-'+rowCount+'"><input class="form-control" type="text" name="keterangan['+(rowCount-1)+
						']" value=""></td><td id="t10-'+rowCount+
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
						url: "<?php echo base_url("stock_mutasi"); ?>/auto_barang",
						dataType: "json",
						data: {
							q: request.term, r: $('#m_cabang').val(), s: $('#m_cabang_tujuan').val()
						},
						success: function( data ) {
							response( data );
						}
					});
				},
				minLength: 1,
				select: function( event, ui ) {
					log(ui.item.value, ui.item.label1, ui.item.satuan, ui.item.stock_pengirim, ui.item.stock_tujuan);
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
			
			$("#tanggal_buat").datepicker({
				format : "yyyy-mm-dd",
				autoclose: true,
				todayBtn: "linked",
				clearBtn: true,
				todayHighlight: true,
				pickerPosition: "bottom-left"
			});
			
			$("#tanggal_diperlukan").datepicker({
				format : "yyyy-mm-dd",
				autoclose: true,
				todayBtn: "linked",
				clearBtn: true,
				todayHighlight: true,
				pickerPosition: "bottom-left"
			});
			
			$("#m_cabang").select2({placeholder: 'Pilih Cabang Pengirim'});
			$("#m_cabang").select2('val', '');
			$("#m_cabang_tujuan").select2({placeholder: 'Pilih Cabang Tujuan'});
			$("#m_cabang_tujuan").select2('val', '');
			
			$("body").keypress(function(e) {
				var code = (e.keyCode ? e.keyCode : e.which);
				if(code == 13) { //Enter keycode
					return false;
				}
			});
		});
	</script>