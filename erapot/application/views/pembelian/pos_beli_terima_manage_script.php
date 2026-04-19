<script>

	Number.prototype.formatMoney = function(c, d, t){
	var n = this, 
		c = isNaN(c = Math.abs(c)) ? 2 : c, 
		d = d == undefined ? "." : d, 
		t = t == undefined ? "," : t, 
		s = n < 0 ? "-" : "", 
		i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
		j = (j = i.length) > 3 ? j % 3 : 0;
	   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	 };
	
	function validateForm() {
		$("#btn-submit").prop( "disabled", true );
		$("#btn-submit").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
		var check = true;
		var error = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-info-circle"></i>  <strong>ERROR!</strong><br />';
		error += '</div>';
		if (check == false) {
			$("#error-area").html(error);
			$("#btn-submit").html('<i class="fa fa-hdd-o"></i> Simpan Data');
			$("#btn-submit").prop( "disabled", false );
		}
		return check;
	}
	
	//binding select2
	ko.bindingHandlers.select2 = {
		after: ["options", "value"],
		init: function (el, valueAccessor, allBindingsAccessor, viewModel) {
			$(el).select2(ko.unwrap(valueAccessor()));
			ko.utils.domNodeDisposal.addDisposeCallback(el, function () {
				$(el).select2('destroy');
			});
		},
		update: function (el, valueAccessor, allBindingsAccessor, viewModel) {
			var allBindings = allBindingsAccessor();
			var select2 = $(el).data("select2");
			if ("value" in allBindings) {
				var newValue = "" + ko.unwrap(allBindings.value);
				if ((allBindings.select2.multiple || el.multiple) && newValue.constructor !== Array) {
					select2.val([newValue.split(",")]);
				}
				else {
					select2.val([newValue]);
				}
			}
		}
	};
	
	// Class to represent a row
	
	function AddOrganizers(no, pos_nama, barang_i, bulan , pos_jumlah ,pos_harga, status, isChecked, pos_harga_rp) {
		var self = this;
		self.no = ko.observable(no);
		self.selectedBulan = ko.observable(bulan);
		self.isChecked = ko.observable(isChecked);
		self.pos_nama = ko.observable(pos_nama);
		self.barang_i = ko.observable(barang_i);
		self.pos_harga = ko.observable(pos_harga);	
		self.pos_harga_rp = ko.observable('Rp. '+pos_harga_rp);	
		self.pos_jumlah = ko.observable(pos_jumlah);
		self.status = ko.observable(status);	

		self.real_sub = ko.computed(function() {
			if(self.isChecked() == true)
				var a = parseFloat(self.pos_harga());
			else
				var a = 0;
			return parseFloat(a);
		});
		
		self.sub = ko.computed(function() {
			if(self.isChecked() == true)
				var a = parseFloat(self.pos_harga());
			else
				var a = 0;
			return "IDR " + parseFloat(a).formatMoney(2, '.', ',');
		});

		
	}

	function AddOrganizerslain(nolain, pos_namalain, barang_ilain, bulanlain , pos_jumlahlain ,pos_hargalain, statuslain, isCheckedlain, pos_harga_rplain, URLPath) {
		var self = this;
		self.nolain = ko.observable(nolain);
		self.selectedBulanlain = ko.observable(bulanlain);
		self.isCheckedlain = ko.observable(isCheckedlain);
		self.pos_namalain = ko.observable(pos_namalain);
		self.barang_ilain = ko.observable(barang_ilain);
		self.pos_hargalain = ko.observable(pos_hargalain);
		self.pos_harga_rplain = ko.observable('Rp. '+pos_harga_rplain);	
		self.pos_jumlahlain = ko.observable(pos_jumlahlain);
		self.statuslain = ko.observable(statuslain);
		self.URLPath = ko.observable(URLPath);

		
		self.real_sublain = ko.computed(function() {
			if(self.isCheckedlain() == true)
				var a = parseFloat(self.pos_hargalain());
			else
				var a = 0;
			return parseFloat(a);
		});
		
		self.sub = ko.computed(function() {
			if(self.isCheckedlain() == true)
				var a = parseFloat(self.pos_hargalain());
			else
				var a = 0;
			return "IDR " + parseFloat(a).formatMoney(2, '.', ',');
		});
		
		self.nominal = ko.computed(function() {			
			return "IDR " + parseFloat(self.pos_hargalain()).formatMoney(0, '.', ',');
		});
	}
	<?= get_buttonset_knockout() ?>
	<?= get_tinymce_knockout() ?>

	// Overall viewmodel for this screen, along with initial state
	function OrganizerViewModel() {
		var self = this;
		self.availableCabang = ko.observableArray(<?php if(isset($m_cabang)) echo $m_cabang; ?>);
		self.availablePPNStatus = ko.observableArray([{"id":"0", "nama":"Non PPN"}, {"id":"1", "nama":"Add PPN"}, {"id":"2", "nama":"Include PPN"}]);
		self.availableBulan = ko.observableArray([{"id":"FEBRUARI", "nama":"FEBRUARI"}, {"id":"MARET", "nama":"MARET"}]);

		// Non-editable catalog data

		// Initial data
		self.cabang = ko.observable(`<?= $this->session->userdata('user_cabang') ?>`);
		self.sup_nama = ko.observable('<?php if(isset($nama)) echo $nama ?>');
		self.supplier_i = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_supplier'] ?>');
		self.sup_alamat = ko.observable('<?php if(isset($alamat)) echo $alamat ?>');
		self.sup_nik = ko.observable('<?php if(isset($nik)) echo $nik ?>');
		self.sup_telp = ko.observable('<?php if(isset($telp)) echo $telp ?>');
		self.sup_kelas = ko.observable('<?php if(isset($kelas)) echo $kelas ?>');
		self.sup_kelas_i = ko.observable('<?php if(isset($kelas)) echo $kelas ?>');
		self.tunggakan = ko.observable('');
		self.keterangan = ko.observable(`<?php if(isset($detil)) echo $detil[0]['keterangan'] ?>`);
		self.requestType = ko.observable('<?php if(isset($detil)) echo $detil[0]['type']; else echo "0"; ?>');
		self.supplier_nama = ko.observable('<?php if(isset($detil)) echo $detil[0]['supplier_nama'] ?>');
		self.supplier_telp = ko.observable('<?php if(isset($detil)) echo $detil[0]['supplier_telp'] ?>');
		self.PPNstatus = ko.observable('<?php if(isset($detil)) echo $detil[0]['ppn_status'] ?>');
		self.PPNvalue = ko.observable('<?= get_data('general','id',13,'nilai') ?>');

		
		self.organizers = ko.observableArray([
			<?php if (isset($detils)) : ?>
			<?php if (is_array($detils)) : ?>
			<?php foreach ($detils as $toro => $value) : ?>
			
			new AddOrganizers("<?= get_data('barang','id',$value['id_barang'],'nama') ?>", "<?= $value['id_barang'] ?>", "<?= $value['bulan'] ?>", 1, "<?= $value['harga'] ?>", "<?= $value['tipe_barang'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.organizerslain = ko.observableArray([
			<?php if (isset($detils)) : ?>
			<?php if (is_array($detils)) : ?>
			<?php foreach ($detils as $toro => $value) : ?>
			
			new AddOrganizerslain("<?= get_data('barang','id',$value['id_barang'],'nama') ?>", "<?= $value['id_barang'] ?>", "<?= $value['bulan'] ?>", 1, "<?= $value['harga'] ?>", "<?= $value['tipe_barang'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);

		self.totalSub = ko.computed(function() {
			var total = 0;
			for (var i = 0; i < self.organizers().length; i++)
				total += parseFloat(self.organizers()[i].real_sub());
			return total.formatMoney(2, '.', ',');
		});		
		
		self.totalSublain = ko.computed(function() {
			var total = 0;
			for (var i = 0; i < self.organizerslain().length; i++)
				total += parseFloat(self.organizerslain()[i].real_sublain());
			return total.formatMoney(2, '.', ',');
		});		
		
		
		self.jumlahBarang = ko.computed(function() {
			var total = 0;
			for (var i = 0; i < self.organizers().length; i++)
				total += parseFloat(self.organizers()[i].pos_jumlah());
			return total;
		});
		
		
		self.totalSemua = ko.computed(function() {
			var total = 0;
			total = parseFloat(self.totalSub()) + parseFloat(self.totalSublain());
			return total;
		});
		
		self.removeEntity = function(organizer) { self.organizers.remove(organizer) }
		
		$("#city").autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: "<?php echo base_url("pos_beli_terima_manage"); ?>/auto_barangcabanglist",
					dataType: "json",
					data: {
						q: request.term,
						cabang: <?= $this->session->userdata('user_cabang') ?>
					},
					success: function( data ) {
						response( data );
					}
				});
			},
			minLength: 1,
			select: function( event, ui ) {
				// sebelum dimasukkan coba dicek dulu apakah barang sudah ada atau belum
				var rows = true;
								
				if (rows == true)
					self.organizers.push(new AddOrganizers(ui.item.label, ui.item.value, ui.item.satuan, 1, ui.item.harga, ui.item.tipe));
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
		
		$("#supplier_name").autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: "<?php echo base_url("pos_beli_terima_manage"); ?>/auto_suppliercabang",
					dataType: "json",
					data: {
						q: request.term,
						cabang: <?= $this->session->userdata('user_cabang') ?>
					},
					success: function( data ) {
						response( data );
					}
				});
			},
			minLength: 1,
			select: function( event, ui ) {
				self.supplier_i(ui.item.value);
				self.sup_nama(ui.item.label);
				self.sup_nik(ui.item.nik);
				self.sup_alamat(ui.item.alamat);
				self.sup_kelas(ui.item.kelas_nama);
				self.sup_kelas_i(ui.item.kelas_id);
				self.sup_telp(ui.item.telp);	
				self.tunggakan(ui.item.bulanan);	
				self.organizers([]);
				var i = 0;
				for (var key in ui.item.bulanan) {
					// skip loop if the property is from prototype
					if (!ui.item.bulanan.hasOwnProperty(key)) continue;

					var obj = ui.item.bulanan[key];
					var looping = 0;
					for (var prop in obj) {
						// skip loop if the property is from prototype
						if(!obj.hasOwnProperty(prop)) continue;
						// your code
						if(looping == 0)
							var bulan = obj[prop];
						if(looping == 1)
							var harga = obj[prop]; 
						if(looping == 2)
							var harga_rp = obj[prop];
						if(looping == 3)
							var status = obj[prop];
						if(looping == 4)
							var bayar = obj[prop];
						if(looping == 5)
							var sisa = obj[prop];
						if(looping > 5)
							break;
						looping++;
					}
					i++;
					self.organizers.push(new AddOrganizers(i, bulan, bulan, 0, 0, harga, status, 0, harga_rp));
				}
				self.tunggakan(ui.item.lainlain);	
				self.organizerslain([]);
				var i = 0;
				for (var key in ui.item.lainlain) {
					// skip loop if the property is from prototype
					if (!ui.item.lainlain.hasOwnProperty(key)) continue;

					var obj = ui.item.lainlain[key];
					var looping = 0;
					for (var prop in obj) {
						// skip loop if the property is from prototype
						if(!obj.hasOwnProperty(prop)) continue;
						// your code
						if(looping == 0)
							var nama = obj[prop];
						if(looping == 1)
							var harga = obj[prop]; 
						if(looping == 2)
							var harga_rp = obj[prop];
						if(looping == 3)
							var status = obj[prop];
						if(looping == 4)
							var id = obj[prop];
						if(looping == 5)
							var sisa = obj[prop];
						if(looping > 5)
							break;
						looping++;
					}
					i++;
					self.organizerslain.push(new AddOrganizerslain(i, nama, id, 0, 0, harga, status, 0, harga_rp, "<?php echo base_url("laporan_pos"); ?>/laporan_pos_beli_terima_gabungan/<?= date('Y')?>-01-01/<?= date('Y')?>-12-31/--"+ui.item.kelas_id+"--/0/--"+id+"--/99/" ));
				}
				$("#supplier_name").val( '' );
				return false;
			},
			focus: function( event, ui ) {
				$("#supplier_name").val( ui.item.label );
				return false;
			},
		});
		
	}

	ko.applyBindings(new OrganizerViewModel());
	
	$(function() {
		$("body").keypress(function(e) {
			var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) {
				return false;
			}
		});
	});
	
	$('#hotlineForm').parsley();
	
	window.Parsley.on('form:submit', function() {
		$(':submit').each(function() {
			$(this).prop( "disabled", true );
			$(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
		});
	});
</script>