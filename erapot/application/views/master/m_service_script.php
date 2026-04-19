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
	
	// Class to represent a row in the detail grid
	function AddBarangs(id, nama, kuantitas, satuan, keterangan) {
		var self = this;
		self.barang_id = ko.observable(id);
		self.barang_nama = ko.observable(nama);
		self.barang_kuantitas = ko.observable(kuantitas);
		self.barang_satuan = ko.observable(satuan);		
		self.barang_keterangan = ko.observable(keterangan);
	}
	
	function AddGrosirs(membership, minimum, harga) {
		var self = this;
		self.selectedMembershipType = ko.observable(membership);
		self.grosir_minimum = ko.observable(minimum);
		self.grosir_harga = ko.observable(harga);
	}
	
	<?= get_tinymce_knockout() ?>
	
	function OrganizerViewModel() {
		var self = this;

		// Initial data	
		self.availableServiceType = ko.observableArray(<?php if(isset($m_service_type)) echo $m_service_type; ?>);
		
		self.availableMembershipType = ko.observableArray(<?php if(isset($m_membership_type)) echo $m_membership_type; ?>);
		
		self.serviceType = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_jenis_service'] ?>');
		self.id = ko.observable('<?php if(isset($detil)) echo $detil[0]['id'] ?>');
		self.nama = ko.observable('<?php if(isset($detil)) echo $detil[0]['nama'] ?>');
		self.harga = ko.observable('<?php if(isset($detil)) echo $detil[0]['harga'] ?>');
		self.keterangan = ko.observable('<?php if(isset($detil)) echo $detil[0]['keterangan'] ?>');
		self.isActive = ko.observable(<?php if(isset($detil)) {if($detil[0]['status'] == 1) echo "true"; else echo "false";} ?>);
		
		self.barangs = ko.observableArray([
			<?php if (isset($detils)) : ?>
			<?php if (is_array($detils)) : ?>
			<?php foreach ($detils as $toro => $value) : ?>
			new AddBarangs("<?= $value['id_barang'] ?>", "<?= get_barang($value['id_barang']) ?>", 
				"<?= $value['kuantitas'] ?>", "<?= get_barang_satuan($value['id_barang']) ?>", "<?= $value['keterangan'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.grosirs = ko.observableArray([
			<?php if (isset($detils_grosir)) : ?>
			<?php if (is_array($detils_grosir)) : ?>
			<?php foreach ($detils_grosir as $toro => $value) : ?>
			new AddGrosirs(<?= $value['id_m_membership_type'] ?>, "<?= $value['minimum'] ?>", <?= $value['harga'] ?>),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.addBarangs = function() {
			self.barangs.push(new AddBarangs("", "", "", ""));
		}
		
		self.addGrosirs = function() {
			self.grosirs.push(new AddGrosirs("", "", ""));
		}
		
		self.removeEntity = function(barang) { self.barangs.remove(barang) }
		
		self.removeGrosir = function(grosir) { self.grosirs.remove(grosir) }
		
		$("#city").autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: "<?php echo base_url("m_service"); ?>/auto_barang",
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
				// sebelum dimasukkan coba dicek dulu apakah barang sudah ada atau belum
				var rows = true;
				for (var i = 0; i < self.barangs().length; i++) {
					if (self.barangs()[i].barang_id() == ui.item.value) {
						self.barangs()[i].barang_kuantitas(self.barangs()[i].barang_kuantitas() + 1);
						rows = false;
					}
				}					
				if (rows == true)
					self.barangs.push(new AddBarangs(ui.item.value, ui.item.label1, 1, ui.item.satuan, ""));
				$("#city").val( '' );
				return false;
			},
			
			focus: function( event, ui ) {
				$("#city").val( ui.item.label );
				return false;
			},
			open: function() {
				$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
			},
			close: function() {
				$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
			}
		});
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