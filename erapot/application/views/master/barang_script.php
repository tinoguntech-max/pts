<script>
	// binding the datepicker
	ko.bindingHandlers.datepicker = {
		init: function(element, valueAccessor, allBindingsAccessor) {
			var $el = $(element);
			var options = allBindingsAccessor().datepickerOptions || {};
			$el.datepicker(options);

			ko.utils.registerEventHandler(element, "change", function() {
				var observable = valueAccessor();
				observable($el.datepicker("getDate"));
			});

			ko.utils.domNodeDisposal.addDisposeCallback(element, function() {
				$el.datepicker("destroy");
			});

		},
		update: function(element, valueAccessor) {
			var value = ko.utils.unwrapObservable(valueAccessor()),
				$el = $(element),
				current = $el.datepicker("getDate");
			
			if (value - current !== 0) {
				$el.datepicker("setDate", value);   
			}
		}
	};
	
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
	
	<?= get_tinymce_knockout() ?>
	
	// Class to represent a row in the detail grid
	function AddKits(id, nama, kuantitas, satuan, price_ratio, keterangan) {
		var self = this;
		self.kit_id = ko.observable(id);
		self.kit_nama = ko.observable(nama);
		self.kit_kuantitas = ko.observable(kuantitas);
		self.kit_satuan = ko.observable(satuan);
		self.kit_price_ratio = ko.observable(price_ratio);
		self.kit_keterangan = ko.observable(keterangan);
	}
	
	function AddBoughts(cabang, harga) {
		var self = this;
		self.selectedCabang = ko.observable(cabang);
		self.bought_harga = ko.observable(harga);
	}
	
	function AddSolds(cabang, harga) {
		var self = this;
		self.selectedCabang = ko.observable(cabang);
		self.sold_harga = ko.observable(harga);
	}
	
	function AddGrosirs(membership, minimum, harga) {
		var self = this;
		self.selectedMembershipType = ko.observable(membership);
		self.grosir_minimum = ko.observable(minimum);
		self.grosir_harga = ko.observable(harga);
	}
	
	function AddSatuans(satuan_convert, base, value_convert, hasil_convert, satuan_master) {
		var self = this;
		self.selectedSatuanConvert = ko.observable(satuan_convert);
		self.selectedBase = ko.observable(base);
		self.value_convert = ko.observable(value_convert);
		self.hasil_convert = ko.observable(hasil_convert);
		self.satuan_master = ko.observable(satuan_master);
		
		self.selectedSatuanConvert.subscribe(function (val) {
			self.hasil_convert([]);
			$.getJSON("<?= base_url() ?>barang/value_convert_json/"+val+"/"+self.selectedBase()+"/"+self.value_convert()+"/"+self.satuan_master(), function (data) {
				self.hasil_convert(data);
			});
		});
		
		self.selectedBase.subscribe(function (val) {
			self.hasil_convert([]);
			$.getJSON("<?= base_url() ?>barang/value_convert_json/"+self.selectedSatuanConvert()+"/"+val+"/"+self.value_convert()+"/"+self.satuan_master(), function (data) {
				self.hasil_convert(data);
			});
			
		});
		self.value_convert.subscribe(function (val) {
			self.hasil_convert([]);
			$.getJSON("<?= base_url() ?>barang/value_convert_json/"+self.selectedSatuanConvert()+"/"+self.selectedBase()+"/"+val+"/"+self.satuan_master(), function (data) {
				self.hasil_convert(data);
			});
		});
	}

	function OrganizerViewModel() {
		var self = this;

		// Initial data
		self.availableJenisBarang = ko.observableArray(<?php if(isset($m_jenis_barang)) echo $m_jenis_barang; ?>);
		self.availableTipeBarang= ko.observableArray([{"id":"1", "nama":"Mounthly"}, {"id":"2", "nama":"Annual"}]);
		self.availableMerk = ko.observableArray(<?php if(isset($merk)) echo $merk; ?>);
		self.availableSatuan = ko.observableArray(<?php if(isset($satuan)) echo $satuan; ?>);
		self.availableBesarConvert = ko.observableArray([{"id":"0", "nama":"Tidak"}, {"id":"1", "nama":"Ya"}]);
		self.availableMembershipType = ko.observableArray(<?php if(isset($m_membership_type)) echo $m_membership_type; ?>);
		self.availableCabang = ko.observableArray(<?php if(isset($m_kelas)) echo $m_kelas; ?>);
		self.availableBase = ko.observableArray([{"id":"1", "nama":"Satuan Utama"}, {"id":"2", "nama":"Satuan Convert"}]);
		
		self.id = ko.observable('<?php if(isset($detil)) echo $detil[0]['id'] ?>');
		self.nama = ko.observable('<?php if(isset($detil)) echo $detil[0]['nama'] ?>');
		self.jenisBarang = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_jenis_barang'] ?>');
		self.tipeBarang = ko.observable('<?php if(isset($detil)) echo $detil[0]['tipe_barang'] ?>');
		self.merk = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_merk'] ?>');
		self.satuan = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_satuan'] ?>');
		self.satuanConvert = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_satuan_convert'] ?>');
		self.besar_convert = ko.observable('<?php if(isset($detil)) echo $detil[0]['besar_convert'] ?>');
		self.harga_beli = ko.observable('<?php if(isset($detil)) echo $detil[0]['harga_beli'] ?>');
		self.harga = ko.observable('<?php if(isset($detil)) echo $detil[0]['harga'] ?>');
		self.lokasi = ko.observable('<?php if(isset($detil)) echo $detil[0]['lokasi'] ?>');
		self.keterangan = ko.observable(`<?php if(isset($detil)) echo $detil[0]['keterangan'] ?>`);		
		self.isActive = ko.observable(<?php if(isset($detil)) {if($detil[0]['status'] == 1) echo "true"; else echo "false";} ?>);
		
		self.kits = ko.observableArray([
			<?php if (isset($detils)) : ?>
			<?php if (is_array($detils)) : ?>
			<?php foreach ($detils as $toro => $value) : ?>
			new AddKits("<?= $value['id_barang_detil'] ?>", "<?= get_barang($value['id_barang_detil']) ?>", 
				"<?= $value['kuantitas'] ?>", "<?= get_barang_satuan($value['id_barang_detil']) ?>", "<?= $value['price_ratio'] ?>", "<?= $value['keterangan'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.boughts = ko.observableArray([
			<?php if (isset($detils_harga_beli)) : ?>
			<?php if (is_array($detils_harga_beli)) : ?>
			<?php foreach ($detils_harga_beli as $toro => $value) : ?>
			new AddBoughts(<?= $value['id_m_cabang'] ?>, <?= $value['harga'] ?>),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.solds = ko.observableArray([
			<?php if (isset($detils_harga_jual)) : ?>
			<?php if (is_array($detils_harga_jual)) : ?>
			<?php foreach ($detils_harga_jual as $toro => $value) : ?>
			new AddSolds(<?= $value['id_m_kelas'] ?>, <?= $value['harga'] ?>),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.grosirs = ko.observableArray([
			<?php if (isset($detils_grosir)) : ?>
			<?php if (is_array($detils_grosir)) : ?>
			<?php foreach ($detils_grosir as $toro => $value) : ?>
			new AddGrosirs(<?= $value['id_m_membership_type'] ?>, "<?= $value['minimum'] ?>", <?= $value['harga'] ?>),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.satuans = ko.observableArray([
			<?php if (isset($detils_satuan)) : ?>
			<?php if (is_array($detils_satuan)) : ?>
			<?php foreach ($detils_satuan as $toro => $value) : ?>
			new AddSatuans(<?= $value['id_satuan2'] ?>, "<?= $value['base'] ?>", <?= $value['conversion'] ?>, "","<?= $value['id_satuan1'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.addKits = function() {
			self.kits.push(new AddKits("", "", ""));
		}
		self.removeEntity = function(kit) { self.kits.remove(kit) }
		
		self.addBoughts = function() {
			self.boughts.push(new AddBoughts("", 0));
		}
		self.removeBought = function(bought) { self.boughts.remove(bought) }
		
		self.addSolds = function() {
			self.solds.push(new AddSolds("", 0));
		}
		self.removeSold = function(sold) { self.solds.remove(sold) }
		
		self.addGrosirs = function() {
			self.grosirs.push(new AddGrosirs("", "", ""));
		}
		self.removeGrosir = function(grosir) { self.grosirs.remove(grosir) }
		
		self.addSatuans = function() {
			self.satuans.push(new AddSatuans("", "", 1, "", parseFloat(self.satuan())));
		}
		self.removeSatuan = function(satuan) { self.satuans.remove(satuan) }
		
		$("#city").autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: "<?php echo base_url("barang"); ?>/auto_barang",
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
				// sebelum dimasukkan coba dicek dulu apakah barang sudah ada atau belum
				var rows = true;
				for (var i = 0; i < self.kits().length; i++) {
					if (self.kits()[i].kit_id() == ui.item.value) {
						self.kits()[i].kit_kuantitas(self.kits()[i].kit_kuantitas() + 1);
						rows = false;
					}
				}					
				if (rows == true)
					self.kits.push(new AddKits(ui.item.value, ui.item.label1, 1, ui.item.satuan, ""));
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