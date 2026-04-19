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
	
	function AddOrganizers(pos_nama, barang_i, satuan, pos_jumlah, pos_harga, pos_discount, pos_tax, satuanList) {
		var self = this;
		self.satuanList = ko.observableArray(satuanList);
		self.pos_nama = ko.observable(pos_nama);
		self.barang_i = ko.observable(barang_i);
		self.selectedSatuanConvert = ko.observable(satuan);
		self.pos_harga = ko.observable(pos_harga);
		self.pos_jumlah = ko.observable(pos_jumlah);
		self.pos_discount = ko.observable(pos_discount);
		self.pos_tax = ko.observable(pos_tax);
		
		self.real_sub = ko.computed(function() {
			var a = parseFloat(self.pos_harga()) * parseFloat(self.pos_jumlah());
			var b = parseFloat(self.pos_discount()) / 100 * parseFloat(a);
			var c = parseFloat(a) - parseFloat(b);
			var d = parseFloat(self.pos_tax()) / 100 * parseFloat(c);
			var e = parseFloat(c) +  parseFloat(d);
			return parseFloat(e);
		});
		
		self.sub = ko.computed(function() {
			var a = parseFloat(self.pos_harga()) * parseFloat(self.pos_jumlah());
			var b = parseFloat(self.pos_discount()) / 100 * parseFloat(a);
			var c = parseFloat(a) - parseFloat(b);
			var d = parseFloat(self.pos_tax()) / 100 * parseFloat(c);
			var e = parseFloat(c) +  parseFloat(d);
			return "IDR " + parseFloat(e).formatMoney(2, '.', ',');
		});		
		
		self.selectedSatuanConvert.subscribe(function (val) {
				var selectedsatuan = [];
				if (self.selectedSatuanConvert() != 0)
					selectedsatuan.push([self.selectedSatuanConvert()])
				else 
					selectedsatuan.push(["0"]);
				
			$.post( "<?= base_url("pos_beli_terima_satuan/harga_convert/") ?>", 
					{ satuan: encodeURIComponent(selectedsatuan), barang: encodeURIComponent(self.barang_i()), harga: parseFloat(self.pos_harga()) }).done(function( data ) {
						self.pos_harga(data) ;
				});
		});
	}
	<?= get_buttonset_knockout() ?>
	<?= get_tinymce_knockout() ?>

	// Overall viewmodel for this screen, along with initial state
	function OrganizerViewModel() {
		var self = this;

		// Non-editable catalog data
		self.availableCabang = ko.observableArray(<?php if(isset($m_cabang)) echo $m_cabang; ?>);
		self.availablePPNStatus = ko.observableArray([{"id":"0", "nama":"Non PPN"}, {"id":"1", "nama":"Add PPN"}, {"id":"2", "nama":"Include PPN"}]);
		
		// Initial data
		self.cabang = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_cabang'] ?>');
		self.sup_nama = ko.observable(`<?php if(isset($nama)) echo $nama ?>`);
		self.supplier_i = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_supplier'] ?>');
		self.sup_alamat = ko.observable(`<?php if(isset($alamat)) echo $alamat ?>`);
		self.sup_telp = ko.observable(`<?php if(isset($telp)) echo $telp ?>`);
		self.keterangan = ko.observable(`<?php if(isset($detil)) echo $detil[0]['keterangan'] ?>`);
		self.requestType = ko.observable('<?php if(isset($detil)) echo $detil[0]['type']; else echo "0"; ?>');
		self.supplier_nama = ko.observable(`<?php if(isset($detil)) echo $detil[0]['supplier_nama'] ?>`);
		self.supplier_telp = ko.observable(`<?php if(isset($detil)) echo $detil[0]['supplier_telp'] ?>`);
		self.PPNstatus = ko.observable('<?php if(isset($detil)) echo $detil[0]['ppn_status'] ?>');
		self.PPNvalue = ko.observable('<?= get_data('general','id',13,'nilai') ?>');
		
		self.organizers = ko.observableArray([
			<?php if (isset($detils)) : ?>
			<?php if (is_array($detils)) : ?>
			<?php foreach ($detils as $toro => $value) : ?>
			new AddOrganizers("<?= get_data('barang','id',$value['id_barang'],'nama') ?> (<?= $value['id_barang'] ?>)", "<?= $value['id_barang'] ?>", 
				"<?= get_data('satuan','id',get_data('barang','id',$value['id_barang'],'id_satuan'),'nama') ?>", 
				 <?= $value['jumlah'] ?>, "<?= get_data('barang','id',$value['id_barang'],'harga') ?>", <?= $value['discount'] ?>, <?= $value['tax'] ?>),
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
		
		self.totalSub1 = ko.computed(function() {
			var total = 0;
			for (var i = 0; i < self.organizers().length; i++)
				total += parseFloat(self.organizers()[i].real_sub());
			return total;
		});
		
		self.jumlahBarang = ko.computed(function() {
			var total = 0;
			for (var i = 0; i < self.organizers().length; i++)
				total += parseFloat(self.organizers()[i].pos_jumlah());
			return total;
		});
		
		self.removeEntity = function(organizer) { self.organizers.remove(organizer) }
		
		$("#supplier_name").autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: "<?php echo base_url("pos_beli_terima_manage"); ?>/auto_supplier",
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
				self.sup_alamat(ui.item.alamat);
				self.sup_telp(ui.item.telp);
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