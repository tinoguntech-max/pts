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
		self.availableCoa = ko.observableArray(<?php if(isset($m_coa)) echo $m_coa; ?>);
		
		self.purchaseReciptCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_terima_debet1'] ?>');
		self.purchaseReciptCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_terima_debet2'] ?>');
		self.purchaseReciptCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_terima_credit1'] ?>');
		self.purchaseReciptCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_terima_credit2'] ?>');
		self.purchaseReturnCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_retur_debet1'] ?>');
		self.purchaseReturnCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_retur_debet2'] ?>');
		self.purchaseReturnCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_retur_credit1'] ?>');
		self.purchaseReturnCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_retur_credit2'] ?>');
		self.purchasePaymentCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_bayar_debet1'] ?>');
		self.purchasePaymentCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_bayar_debet2'] ?>');
		self.purchasePaymentCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_bayar_credit1'] ?>');
		self.purchasePaymentCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_bayar_credit2'] ?>');
		self.salesDeliveryCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_delivery_debet1'] ?>');
		self.salesDeliveryCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_delivery_debet2'] ?>');
		self.salesDeliveryCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_delivery_credit1'] ?>');
		self.salesDeliveryCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_delivery_credit2'] ?>');
		self.salesReturnCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_retur_debet1'] ?>');
		self.salesReturnCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_retur_debet2'] ?>');
		self.salesReturnCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_retur_credit1'] ?>');
		self.salesReturnCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_retur_credit2'] ?>');
		self.salesPaymentCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_bayar_debet1'] ?>');
		self.salesPaymentCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_bayar_debet2'] ?>');
		self.salesPaymentCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_bayar_credit1'] ?>');
		self.salesPaymentCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_bayar_credit2'] ?>');
		self.motorPurchaseReciptCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_motor_terima_debet1'] ?>');
		self.motorPurchaseReciptCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_motor_terima_debet2'] ?>');
		self.motorPurchaseReciptCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_motor_terima_credit1'] ?>');
		self.motorPurchaseReciptCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_motor_terima_credit2'] ?>');
		self.motorPurchasePaymentCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_motor_bayar_debet1'] ?>');
		self.motorPurchasePaymentCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_motor_bayar_debet2'] ?>');
		self.motorPurchasePaymentCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_motor_bayar_credit1'] ?>');
		self.motorPurchasePaymentCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['beli_motor_bayar_credit2'] ?>');
		self.motorSalesDeliveryCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_motor_delivery_debet1'] ?>');
		self.motorSalesDeliveryCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_motor_delivery_debet2'] ?>');
		self.motorSalesDeliveryCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_motor_delivery_credit1'] ?>');
		self.motorSalesDeliveryCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_motor_delivery_credit2'] ?>');
		self.motorSalesPaymentCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_motor_bayar_debet1'] ?>');
		self.motorSalesPaymentCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_motor_bayar_debet2'] ?>');
		self.motorSalesPaymentCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_motor_bayar_credit1'] ?>');
		self.motorSalesPaymentCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['jual_motor_bayar_credit2'] ?>');
		self.payrollRequestCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['payroll_minta_debet1'] ?>');
		self.payrollRequestCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['payroll_minta_debet2'] ?>');
		self.payrollRequestCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['payroll_minta_credit1'] ?>');
		self.payrollRequestCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['payroll_minta_credit2'] ?>');
		self.payrollPaymentCoaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['payroll_bayar_debet1'] ?>');
		self.payrollPaymentCoaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['payroll_bayar_debet2'] ?>');
		self.payrollPaymentCoaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['payroll_bayar_credit1'] ?>');
		self.payrollPaymentCoaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['payroll_bayar_credit2'] ?>');
	
	
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