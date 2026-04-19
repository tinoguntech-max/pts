<script>
		 // binding the datepicker
	ko.bindingHandlers.datepicker = {
		init: function(element, valueAccessor, allBindingsAccessor) {
			var $el = $(element);
			var options = allBindingsAccessor().datepickerOptions || {
				format : "mm/dd/yyyy",
				autoclose: true,
				todayBtn: "linked",
				clearBtn: true,
				todayHighlight: true,
				pickerPosition: "bottom-left"
			};
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
	
	<?= get_tinymce_knockout() ?>
	// Class to represent a row
	 
	// Overall viewmodel for this screen, along with initial state
	function OrganizerViewModel() {
		var self = this;
		
		self.availableCoa = ko.observableArray(<?php if(isset($m_coa)) echo $m_coa; ?>);
		
		<?php if (isset($detil)) $serverDate = DateTime::createFromFormat('Y-m-d', $detil[0]['tanggal']); ?>
		self.tanggal = ko.observable('<?php if(isset($detil) && $serverDate) {if ($detil[0]['tanggal'] != '0000-00-00')echo $serverDate->format('m/d/Y');} ?>');
		self.tanggal_format = ko.computed(function() {
			var a = moment(self.tanggal(), "MMM Do YYYY hA");
			return a.format('YYYY-MM-DD');
		}, this);
		self.coaDebet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_coa_debet1'] ?>');
		self.besar_debet1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['besar_debet1']; else echo 0; ?>');
		self.coaDebet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_coa_debet2'] ?>');
		self.besar_debet2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['besar_debet2']; else echo 0; ?>');
		self.coaDebet3 = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_coa_debet3'] ?>');
		self.besar_debet3 = ko.observable('<?php if(isset($detil)) echo $detil[0]['besar_debet1']; else echo 0; ?>');
		self.coaCredit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_coa_credit1'] ?>');
		self.besar_credit1 = ko.observable('<?php if(isset($detil)) echo $detil[0]['besar_credit1']; else echo 0; ?>');
		self.coaCredit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_coa_credit2'] ?>');
		self.besar_credit2 = ko.observable('<?php if(isset($detil)) echo $detil[0]['besar_credit2']; else echo 0; ?>');
		self.coaCredit3 = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_coa_credit3'] ?>');
		self.besar_credit3 = ko.observable('<?php if(isset($detil)) echo $detil[0]['besar_credit3']; else echo 0; ?>');
		self.keterangan = ko.observable(`<?php if(isset($detil)) echo $detil[0]['keterangan'] ?>`);
		self.totalDebet = ko.computed(function() {
			if (parseFloat(self.besar_debet1()) < 0) self.besar_debet1(0);
			if (parseFloat(self.besar_debet2()) < 0) self.besar_debet1(0);
			if (parseFloat(self.besar_debet3()) < 0) self.besar_debet1(0);
			return (parseFloat(self.besar_debet1()) + parseFloat(self.besar_debet2()) + parseFloat(self.besar_debet3())).formatMoney(2);
		}, this);
		self.totalCredit = ko.computed(function() {
			if (parseFloat(self.besar_credit1()) < 0) self.besar_credit1(0);
			if (parseFloat(self.besar_credit2()) < 0) self.besar_credit2(0);
			if (parseFloat(self.besar_credit3()) < 0) self.besar_credit3(0);
			return (parseFloat(self.besar_credit1()) + parseFloat(self.besar_credit2()) + parseFloat(self.besar_credit3())).formatMoney(2);
		}, this);
		self.balance = ko.computed(function() {
			if ((parseFloat(self.besar_debet1()) + parseFloat(self.besar_debet2()) + parseFloat(self.besar_debet3())) == (parseFloat(self.besar_credit1()) + parseFloat(self.besar_credit2()) + parseFloat(self.besar_credit3()))) {
				$(':submit').each(function() {
					$(this).prop( "disabled", false );
				});
			}
			else {
				$(':submit').each(function() {
					$(this).prop( "disabled", true );
				});
			}
		}, this);
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
	
	
	window.Parsley.on('form:submit', function() {
		$(':submit').each(function() {
			$(this).prop( "disabled", true );
			$(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');
		});
	});
</script>