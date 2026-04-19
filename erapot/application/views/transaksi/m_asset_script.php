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

	ko.validation.rules['isUnique'] = {
    validator: function (newVal, options) {
        if (options.predicate && typeof options.predicate !== "function")
            throw new Error("Invalid option for isUnique validator. The 'predicate' option must be a function.");

        var array = options.array || options;
        var count = 0;
        ko.utils.arrayMap(ko.utils.unwrapObservable(array), function(existingVal) {
            if (equalityDelegate()(existingVal, newVal)) count++;
        });
        return count < 2;

        function equalityDelegate() {
            return options.predicate ? options.predicate : function(v1, v2) { return v1 === v2; };
        }
    },
    message: 'This value is a duplicate',
};

	// Class to represent a row in the detail grid
  function AddAssets(nama, jenis_aset, jenis_divisi, tanggal, besar, pemasok, depresiasi, keterangan){
    var self = this;
    self.nama = ko.obsevable(nama);
    self.jenis_aset = ko.obsevable(jenis_aset);
    self.jenis_divisi = ko.obsevable(jenis_divisi);
    self.tanggal = ko.obsevable(tanggal);
    self.besar = ko.obsevable(besar);
    self.pemasok = ko.obsevable(pemasok);
    self.depresiasi = ko.obsevable(depresiasi);
    self.keterangan = ko.obsevable(keterangan);
  }

	// function AddEvents(tanggal, event_type, keterangan) {
	// 	var self = this;
	// 	self.tanggal = ko.observable(tanggal);
	// 	self.selectedEvent = ko.observable(event_type);
	// 	self.keterangan = ko.observable(keterangan);
	// }
  //
	// function AddContacts(salutation, nama, jabatan, telp, email, keterangan) {
	// 	var self = this;
	// 	self.selectedSalutation = ko.observable(salutation);
	// 	self.contact_nama = ko.observable(nama);
	// 	self.selectedJabatan = ko.observable(jabatan);
	// 	self.contact_telp = ko.observable(telp);
	// 	self.contact_email = ko.observable(email);
	// 	self.contact_keterangan = ko.observable(keterangan);
	}

	function OrganizerViewModel() {
		var self = this;

		// Initial data
    self.availableAssetType = ko.observableArray(<?php if(isset($m_asset_type)) echo $m_asset_type; ?>);
    self.availableDivisi = ko.observableArray(<?php if(isset($m_divisi)) echo $m_divisi; ?>);
    self.availableSupplier = ko.observableArray(<?php if(isset($supplier)) echo $supplier; ?>);
    self.availableDepreciationYear = ko.observableArray(<?php if(isset($m_depreciation_year)) echo $m_depreciation_year; ?>);

    self.nama = ko.observable('<?php if(isset($detil)) echo $detil[0]['nama'] ?>');
    self.assetType = ko.observable('<?php if(isset($detil)) echo $detil[0]['asset_type'] ?>');
    self.divisiType = ko.observable('<?php if(isset($detil)) echo $detil[0]['divisi_type'] ?>');
    self.besar = ko.observable('<?php if(isset($detil)) echo $detil[0]['besar'] ?>');
    self.supplier = ko.observable('<?php if(isset($detil)) echo $detil[0]['supplier'] ?>');
    self.depresiasi = ko.observable('<?php if(isset($detil)) echo $detil[0]['depresiasi'] ?>');
    self.keterangan = ko.observable('<?php if(isset($detil)) echo $detil[0]['keterangan'] ?>');

		self.primary = ko.observable('<?php if(isset($primary)) echo base64_encode($primary); ?>');
		self.events = ko.observableArray([
			<?php if (isset($detils)) : ?>
			<?php if (is_array($detils)) : ?>
			<?php foreach ($detils as $toro => $value) : ?>
			<?php $serverDate = DateTime::createFromFormat('Y-m-d', $value['tanggal']); ?>
			new AddEvents("<?= $serverDate->format('m/d/Y') ?>", <?= $value['id_m_crm_event_type'] ?>, "<?= $value['keterangan'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);

		self.contacts = ko.observableArray([

		]);

		// self.provincesBilling.subscribe(function (val) {
		// 	self.availableRegenciesBilling([]);
		// 	$.getJSON("<?= base_url() ?>regencies/dependent_regencies_json/"+val, function (data) {
		// 		self.availableRegenciesBilling(data);
		// 	});
		// });
		// self.provincesShipping.subscribe(function (val) {
		// 	self.availableRegenciesShipping([]);
		// 	$.getJSON("<?= base_url() ?>regencies/dependent_regencies_json/"+val, function (data) {
		// 		self.availableRegenciesShipping(data);
		// 	});
		// });

		/*self.totalItem = ko.computed(function() {
			var total = 0;
			for (var i = 0; i < self.organizers().length; i++)
				total += Number(self.organizers()[i].banyak());
			return total.toFixed(2);
		});*/

    self.addAssets = function() {
			self.assets.push(new AddAssets("", "", ""));
		}

		// self.addEvents = function() {
		// 	self.events.push(new AddEvents("", "", ""));
		// }
    //
		// self.addContacts = function() {
		// 	self.contacts.push(new AddContacts("", "", "", "", "", ""));
		// }

    self.removeAsset = function(asset) { self.assets.remove(asset) }

		// self.removeEntity = function(event) { self.events.remove(event) }
		// self.removeContact = function(contact) { self.contacts.remove(contact) }
	}

	ko.applyBindings(new OrganizerViewModel());

	//$(".select2").select2();

	$(function() {
		$("body").keypress(function(e) {
			var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) {
				return false;
			}
		});
	});

	$('#hotlineForm').parsley();
	$('.wysihtml5').wysihtml5();

	window.Parsley.on('form:submit', function() {
		$(':submit').each(function() {
			$(this).prop( "disabled", true );
			$(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
		});
	});
</script>
