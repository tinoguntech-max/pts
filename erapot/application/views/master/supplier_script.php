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
	
	function AddContacts(salutation, nama, jabatan, telp, email, keterangan) {
		var self = this;
		self.selectedSalutation = ko.observable(salutation);
		self.contact_nama = ko.observable(nama);
		self.selectedJabatan = ko.observable(jabatan);
		self.contact_telp = ko.observable(telp);
		self.contact_email = ko.observable(email);
		self.contact_keterangan = ko.observable(keterangan);
	}

	function OrganizerViewModel() {
		var self = this;

		// Initial data
		self.availableProvinces = ko.observableArray(<?php if(isset($provinces)) echo $provinces; ?>);
		self.availableRegencies = ko.observableArray(<?php if(isset($regencies)) echo $regencies; ?>);
		self.availableCabangs = ko.observableArray(<?php if(isset($m_kelas)) echo $m_kelas; ?>);
		self.availableSalutations = ko.observableArray(<?php if(isset($m_salutation)) echo $m_salutation; ?>);
		self.availableJabatans = ko.observableArray(<?php if(isset($m_jabatan)) echo $m_jabatan; ?>);
		
		self.primary = ko.observable('<?php if(isset($primary)) echo base64_encode($primary); ?>');
		self.nama = ko.observable('<?php if(isset($detil)) echo $detil[0]['nama'] ?>');
		self.telp = ko.observable('<?php if(isset($detil)) echo $detil[0]['telp'] ?>');
		
		self.alamat = ko.observable('<?php if(isset($detil)) echo $detil[0]['alamat'] ?>');
		self.nama_wali = ko.observable('<?php if(isset($detil)) echo $detil[0]['nama_wali'] ?>');
		self.telp_wali = ko.observable('<?php if(isset($detil)) echo $detil[0]['telp_wali'] ?>');
		self.alamat_wali = ko.observable('<?php if(isset($detil)) echo $detil[0]['alamat_wali'] ?>');
		self.provinces = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_provinces'] ?>');
		self.regencies = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_regencies'] ?>');
		self.nik = ko.observable('<?php if(isset($detil)) echo $detil[0]['nik'] ?>');
		self.email = ko.observable('<?php if(isset($detil)) echo $detil[0]['email'] ?>');
		self.fax = ko.observable('<?php if(isset($detil)) echo $detil[0]['fax'] ?>');
		self.kelas = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_kelas'] ?>');
		self.cabang = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_cabang'] ?>');
		self.keterangan = ko.observable(`<?php if(isset($detil)) echo $detil[0]['keterangan'] ?>`);		
		self.isActive = ko.observable(<?php if(isset($detil)) {if($detil[0]['status'] == 1) echo "true"; else echo "false";} ?>);
		
		self.contacts = ko.observableArray([
			<?php if (isset($detils_contact)) : ?>
			<?php if (is_array($detils_contact)) : ?>
			<?php foreach ($detils_contact as $toro => $value) : ?>
			new AddContacts(<?= $value['id_m_salutation'] ?>, "<?= $value['nama'] ?>", <?= $value['id_m_job_title'] ?>, "<?= $value['telp'] ?>", "<?= $value['email'] ?>", "<?= $value['keterangan'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.provinces.subscribe(function (val) {
			self.availableRegencies([]);
			$.getJSON("<?= base_url() ?>regencies/dependent_regencies_json/"+val, function (data) {
				self.availableRegencies(data);
			});
		});
		
		/*self.totalItem = ko.computed(function() {
			var total = 0;
			for (var i = 0; i < self.organizers().length; i++)
				total += Number(self.organizers()[i].banyak());
			return total.toFixed(2);
		});*/
		
		self.addContacts = function() {
			self.contacts.push(new AddContacts("", "", "", "", "", ""));
		}
		
	
		self.removeContact = function(contact) { self.contacts.remove(contact) }
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
	
	window.Parsley.on('form:submit', function() {
		$(':submit').each(function() {
			$(this).prop( "disabled", true );
			$(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
		});
	});
</script>