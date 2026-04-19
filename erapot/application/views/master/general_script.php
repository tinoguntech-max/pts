<script>	
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
	
	function OrganizerViewModel() {
		var self = this;

		// Initial data
		self.availableDriver = ko.observableArray(<?php if(isset($access_group)) echo $access_group; ?>);
		self.availableServiceType = ko.observableArray(<?php if(isset($service_type)) echo $service_type; ?>);
		self.availableCostType = ko.observableArray(<?php if(isset($m_cost_type)) echo $m_cost_type; ?>);
		
		self.driver = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_access_group'] ?>');
		self.serviceType = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_service_type'] ?>');
		self.costType = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_cost_type'] ?>');
		self.nama_lengkap = ko.observable('<?php if(isset($detil)) echo $detil[0]['nama_lengkap'] ?>');
		self.nama_singkat = ko.observable('<?php if(isset($detil)) echo $detil[0]['nama_singkat'] ?>');
		self.alamat_lengkap = ko.observable('<?php if(isset($detil)) echo $detil[0]['alamat_lengkap'] ?>');
		self.alamat_baris1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['alamat_baris1'] ?>');
		self.alamat_baris2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['alamat_baris2'] ?>');
		self.alamat_baris3 = ko.observable('<?php if(isset($detil)) echo $detil[0]['alamat_baris3'] ?>');
		self.contact_lengkap = ko.observable('<?php if(isset($detil)) echo $detil[0]['contact_lengkap'] ?>');
		self.contact_telepon = ko.observable('<?php if(isset($detil)) echo $detil[0]['contact_telepon'] ?>');
		self.tax_pos = ko.observable('<?php if(isset($detil)) echo $detil[0]['tax'] ?>');
		self.disc_pos = ko.observable('<?php if(isset($detil)) echo $detil[0]['discount'] ?>');
	
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