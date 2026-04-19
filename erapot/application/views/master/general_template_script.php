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
	
	<?= get_tinymce_knockout() ?>
	
	function OrganizerViewModel() {
		var self = this;

		// Initial data
		self.beli_minta = ko.observable(`<?php if(isset($detil)) echo $detil[0]['beli_minta'] ?>`);
		self.beli_order = ko.observable(`<?php if(isset($detil)) echo $detil[0]['beli_order'] ?>`);
		self.beli_terima = ko.observable(`<?php if(isset($detil)) echo $detil[0]['beli_terima'] ?>`);
		self.beli_invoice = ko.observable(`<?php if(isset($detil)) echo $detil[0]['beli_invoice'] ?>`);
		self.beli_retur = ko.observable(`<?php if(isset($detil)) echo $detil[0]['beli_retur'] ?>`);
		self.beli_bayar = ko.observable(`<?php if(isset($detil)) echo $detil[0]['beli_bayar'] ?>`);
		self.jual_order = ko.observable(`<?php if(isset($detil)) echo $detil[0]['jual_order'] ?>`);
		self.jual_delivery = ko.observable(`<?php if(isset($detil)) echo $detil[0]['jual_delivery'] ?>`);
		self.jual_invoice = ko.observable(`<?php if(isset($detil)) echo $detil[0]['jual_invoice'] ?>`);
		self.jual_retur = ko.observable(`<?php if(isset($detil)) echo $detil[0]['jual_retur'] ?>`);
		self.jual_bayar = ko.observable(`<?php if(isset($detil)) echo $detil[0]['jual_bayar'] ?>`);
		self.jual_quote = ko.observable(`<?php if(isset($detil)) echo $detil[0]['jual_quote'] ?>`);
		self.beli_quote = ko.observable(`<?php if(isset($detil)) echo $detil[0]['beli_quote'] ?>`);
		self.beli_tender = ko.observable(`<?php if(isset($detil)) echo $detil[0]['beli_tender'] ?>`);
		self.cash_keluar= ko.observable(`<?php if(isset($detil)) echo $detil[0]['cash_keluar'] ?>`);
		self.cash_masuk = ko.observable(`<?php if(isset($detil)) echo $detil[0]['cash_masuk'] ?>`);
		self.beli_manual = ko.observable(`<?php if(isset($detil)) echo $detil[0]['beli_manual'] ?>`);
		self.jual_lazy = ko.observable(`<?php if(isset($detil)) echo $detil[0]['jual_lazy'] ?>`);
		self.beli_lazy = ko.observable(`<?php if(isset($detil)) echo $detil[0]['beli_lazy'] ?>`);
	
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