<script>
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

	/*function AddPembelians(initialSupplier, tanggal, nota, kwitansi, keterangan, ppn, discount, created, created_id, updated_id, internasional) {
		var self = this;
		self.supplier = ko.observable(initialSupplier);
		self.getSupplierDetil = ko.computed(function() {
			return.self.supplier().nama_supplier;
		});
		self.nota = ko.observable(nota);
		self.kwitansi = ko.observable(kwitansi);
		self.keterangan = ko.observable(keterangan);
		self.ppn = ko.observable(ppn);
		self.discount = ko.observable(discount);
	}*/

	function AddPembelianDetils(initialBarang, jumlah) {
		var self = this;
		self.barang = ko.observable(initialBarang);
		self.getKodeBarang = ko.computed(function() {
			return.self.barang().kode_barang;
		});
		self.getNamaBarang = ko.computed(function() {
			return.self.barang().nama_barang;
		});
		self.jumlah = ko.observable(jumlah);
		self.getSatuanBarang = ko.computed(function() {
			return.self.barang().satuan_barang;
		});
		self.getHargaBarang = ko.computed(function() {
			return.self.barang().harga_barang;
		});
		self.getSubTotal = ko.computed(function() {
			var harga = self.barang().harga;
			var jumlah = self.jumlah();
			return harga * jumlah;
		});
	}

	function PembelianViewModel() {
		var self = this;

		self.availableSuppliers = <?= $supplier ?>;
		self.availableBarang = <?= $barang ?>;

		self.pembelians = ko.observableArray([
			<?php if (isset($pembelian)) : ?>
			<?php if (is_array($pembelian)) : ?>
			<?php foreach ($pembelian as $toro => $value) : ?>
			<?php $a = array_search($value['id_supplier'], array_column($supplier_id, 'id')); if ($a == -1 || $a == '') $a = 0; ?>
			new AddPembelians(self.availableSuppliers[<?= $a ?>], "<?= $value['tanggal'] ?>", "<?= $value['nota_no'] ?>", "<?= $value['kwitansi_no'] ?>", "<?= $value['keterangan'] ?>", "<?= $value['ppn_p'] ?>", "<?= $value['jumlah'] ?>", "<?= $value['disc'] ?>", "<?= $value['keterangan'] ?>")
			]);
	}
</script>