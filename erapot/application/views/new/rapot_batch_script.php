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
	
	function AddOrganizers(no, mapel_i, mapel_nama, nilai1, nilai2, nilai3, nilaiList) {
		var self = this;
		self.nilaiList = ko.observableArray(nilaiList);
		self.no = ko.observable(no);
		self.mapel_i = ko.observable(mapel_i);
		self.mapel_nama = ko.observable(mapel_nama);
		self.selectedNilai1 = ko.observable(nilai1);			
		self.selectedNilai2 = ko.observable(nilai2);			
		self.selectedNilai3 = ko.observable(nilai3);			
	}

	function AddOrganizersiswa(siswa_i, siswa_nama, siswa_nis ,isChecked) {
		var self = this;
		self.siswa_i = ko.observable(siswa_i);
		self.siswa_nama = ko.observable(siswa_nama);
		self.siswa_nis = ko.observable(siswa_nis);		
		self.isChecked = ko.observable(isChecked);		
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
			
		]);

		self.organizersiswa = ko.observableArray([
			
		]);
		
		
		self.removeEntity = function(organizer) { self.organizers.remove(organizer) }
		
		
		$("#supplier_name").autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: "<?php echo base_url("laporan"); ?>/auto_kelas",
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
				self.supplier_i(ui.item.value);
				self.sup_nama(ui.item.label);
				self.organizers([]);
				var i = 0;
				for (var key in ui.item.arymapel) {
					if (!ui.item.arymapel.hasOwnProperty(key)) continue;

					var obj = ui.item.arymapel[key];
					var looping = 0;
					for (var prop in obj) {
						// skip loop if the property is from prototype
						if(!obj.hasOwnProperty(prop)) continue;
						// your code
						if(looping == 0)
							var no = obj[prop];
						if(looping == 1)
							var id = obj[prop]; 
						if(looping == 2)
							var nama = obj[prop];
						if(looping == 3)
							var nilai = obj[prop];
						if(looping > 3)
							break;
						looping++;
					}
					self.organizers.push(new AddOrganizers(no ,id, nama, 0, 0, 0 ,nilai));
				}
				self.organizersiswa([]);
				var i = 0;
				for (var key in ui.item.arysiswa) {
					if (!ui.item.arysiswa.hasOwnProperty(key)) continue;

					var obj = ui.item.arysiswa[key];
					var looping = 0;
					for (var prop in obj) {
						// skip loop if the property is from prototype
						if(!obj.hasOwnProperty(prop)) continue;
						// your code
						if(looping == 0)
							var id = obj[prop];
						if(looping == 1)
							var nama = obj[prop]; 
						if(looping == 2)
							var nis = obj[prop];
						if(looping > 2)
							break;
						looping++;
					}
					self.organizersiswa.push(new AddOrganizersiswa(id, nama, nis, 1));
				}
			
				$("#supplier_name").val( ui.item.label );
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