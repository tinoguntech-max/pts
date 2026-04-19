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
	function AddEvents(tanggal, event_type, keterangan) {
		var self = this;
		self.tanggal = ko.observable(new Date(tanggal)).extend({date: true});
		self.selectedEvent = ko.observable(event_type);
		self.keterangan = ko.observable(keterangan);
	}
	
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
		self.availableCustomerType = ko.observableArray(<?php if(isset($m_customer_type)) echo $m_customer_type; ?>);
		self.availableProvincesBilling = ko.observableArray(<?php if(isset($provinces)) echo $provinces; ?>);
		self.availableRegenciesBilling = ko.observableArray(<?php if(isset($regencies_billing)) echo $regencies_billing; ?>);
		self.availableRegenciesShipping = ko.observableArray(<?php if(isset($regencies_shipping)) echo $regencies_shipping; ?>);
		self.availableBentukUsaha = ko.observableArray(<?php if(isset($m_bentuk_usaha)) echo $m_bentuk_usaha; ?>);
		self.availableJenisUsaha = ko.observableArray(<?php if(isset($m_jenis_usaha)) echo $m_jenis_usaha; ?>);
		self.availableIndustryType = ko.observableArray(<?php if(isset($m_industry_type)) echo $m_industry_type; ?>);
		self.availableEvents = ko.observableArray(<?php if(isset($m_crm_event_type)) echo $m_crm_event_type; ?>);
		self.availableSalutations = ko.observableArray(<?php if(isset($m_salutation)) echo $m_salutation; ?>);
		self.availableJabatans = ko.observableArray(<?php if(isset($m_jabatan)) echo $m_jabatan; ?>);
		self.availableMembershipType = ko.observableArray(<?php if(isset($m_membership_type)) echo $m_membership_type; ?>);
		
		self.primary = ko.observable('<?php if(isset($primary)) echo base64_encode($primary); ?>');
		self.nama = ko.observable('<?php if(isset($detil)) echo $detil[0]['nama'] ?>');
		self.customerType = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_customer_type'] ?>');
		self.telp = ko.observable('<?php if(isset($detil)) echo $detil[0]['telp'] ?>');
		self.email = ko.observable('<?php if(isset($detil)) echo $detil[0]['email'] ?>');
		self.website = ko.observable('<?php if(isset($detil)) echo $detil[0]['website'] ?>');
		self.membershipType = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_membership_type'] ?>');
		
		self.billing_address = ko.observable('<?php if(isset($detil)) echo $detil[0]['billing_address'] ?>');
		self.provincesBilling = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_provinces_billing'] ?>');
		self.regenciesBilling = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_regencies_billing'] ?>');
		self.postal_code_billing = ko.observable('<?php if(isset($detil)) echo $detil[0]['postal_code_billing'] ?>');
		self.shipping_address = ko.observable('<?php if(isset($detil)) echo $detil[0]['shipping_address'] ?>');
		self.provincesShipping = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_provinces_shipping'] ?>');
		self.regenciesShipping = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_regencies_shipping'] ?>');
		self.postal_code_shipping = ko.observable('<?php if(isset($detil)) echo $detil[0]['postal_code_shipping'] ?>');
		
		self.bentukUsaha = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_bentuk_usaha'] ?>');
		self.jenisUsaha = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_jenis_usaha'] ?>');
		self.industryType = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_industry_type'] ?>');
		self.npwp = ko.observable('<?php if(isset($detil)) echo $detil[0]['npwp'] ?>');
		self.keterangan = ko.observable('<?php if(isset($detil)) echo $detil[0]['keterangan'] ?>');
		self.isActive = ko.observable(<?php if(isset($detil)) {if($detil[0]['status'] == 1) echo "true"; else echo "false";} ?>);
		
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
			<?php if (isset($detils_contact)) : ?>
			<?php if (is_array($detils_contact)) : ?>
			<?php foreach ($detils_contact as $toro => $value) : ?>
			new AddContacts(<?= $value['id_m_salutation'] ?>, "<?= $value['nama'] ?>", <?= $value['id_m_job_title'] ?>, 
				"<?= $value['telp'] ?>", "<?= $value['email'] ?>", "<?= $value['keterangan'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.provincesBilling.subscribe(function (val) {
			self.availableRegenciesBilling([]);
			$.getJSON("<?= base_url() ?>regencies/dependent_regencies_json/"+val, function (data) {
				self.availableRegenciesBilling(data);
			});
		});
		self.provincesShipping.subscribe(function (val) {
			self.availableRegenciesShipping([]);
			$.getJSON("<?= base_url() ?>regencies/dependent_regencies_json/"+val, function (data) {
				self.availableRegenciesShipping(data);
			});
		});
		
		/*self.totalItem = ko.computed(function() {
			var total = 0;
			for (var i = 0; i < self.organizers().length; i++)
				total += Number(self.organizers()[i].banyak());
			return total.toFixed(2);
		});*/
		
		self.addEvents = function() {
			self.events.push(new AddEvents(new Date(), "", ""));
		}
		
		self.addContacts = function() {
			self.contacts.push(new AddContacts("", "", "", "", "", ""));
		}
		
		self.removeEntity = function(event) { self.events.remove(event) }
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
	$('.wysihtml5').wysihtml5();
	
	window.Parsley.on('form:submit', function() {
		$(':submit').each(function() {
			$(this).prop( "disabled", true );
			$(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
		});
	});
</script>