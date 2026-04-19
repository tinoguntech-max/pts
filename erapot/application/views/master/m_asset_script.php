<?php if($viewoptions['action'] == 'update') : ?>
<!-- Service Modal -->
<div class="modal fade" id="service-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Service Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="service-form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
					<input type="hidden" value="<?= base64_encode($primary) ?>" name="primary"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-9">
                                <input name="keterangan" placeholder="Description" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a id="btnSaveService" onclick="save_service()" class="btn btn-primary">Save</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End Service Modal -->
<?php endif; ?>

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
	function AddServices(tipe_servis, suplier, service_mulai, service_selesai, status ,keterangan) {
		var self = this;
		self.selectedTipeServis = ko.observable(tipe_servis);
		self.selectedSupplier = ko.observable(suplier);
		self.service_mulai = ko.observable(new Date(service_mulai)).extend({date: true});
		self.service_selesai = ko.observable(new Date(service_selesai)).extend({date: true});
		self.selectedStatus = ko.observable(status);
		self.service_keterangan = ko.observable(keterangan);
	}
	
	// Class to represent a row in the detail grid
	function AddDocuments(document_nama, document_keterangan) {
		var self = this;
		self.document_nama = ko.observable(document_nama);
		self.document_keterangan = ko.observable(document_keterangan);
	}

	function OrganizerViewModel() {
		var self = this;

		// Initial data
		self.availableAssetType = ko.observableArray(<?php if(isset($m_asset_type)) echo $m_asset_type; ?>);
		self.availableDepartment = ko.observableArray(<?php if(isset($m_department)) echo $m_department; ?>);
		self.availableCabang = ko.observableArray(<?php if(isset($m_cabang)) echo $m_cabang; ?>);
		self.availableSupplier = ko.observableArray(<?php if(isset($supplier)) echo $supplier; ?>);
		self.availableDepreciationYear = ko.observableArray(<?php if(isset($m_depreciation_year)) echo $m_depreciation_year; ?>);
		self.availableTipeServis = ko.observableArray([{"id":"S", "nama":"Standart"}, {"id":"R", "nama":"Repair"}, {"id":"O", "nama":"Other"}]);
		self.availableSuppliers = ko.observableArray(<?php if(isset($supplier)) echo $supplier; ?>);
		self.availableStatus = ko.observableArray([{"id":"1", "nama":"Scheduled"}, {"id":"2", "nama":"Planned"}, {"id":"0", "nama":"Finished"}]);
		self.availableAlasan = ko.observableArray([{"id":"Damaged", "nama":"Damaged"}, {"id":"Expired", "nama":"Expired"}, {"id":"Lost", "nama":"Lost"}, 
		{"id":"Stolen", "nama":"Stolen"}, {"id":"Released", "nama":"Released"}, {"id":"Sold", "nama":"Sold"}, {"id":"Gifted", "nama":"Gifted"}, {"id":"Other", "nama":"Other"} ]);
		
		self.primary = ko.observable('<?php if(isset($primary)) echo base64_encode($primary); ?>');
		self.nama = ko.observable('<?php if(isset($detil)) echo $detil[0]['nama'] ?>');
		self.kode = ko.observable('<?php if(isset($detil)) echo $detil[0]['kode'] ?>');
		self.assetType = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_asset_type'] ?>');
		self.cabang = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_cabang'] ?>');
		self.divisi = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_divisi'] ?>');
		self.tanggal = ko.observable('<?php if(isset($detil)) echo $detil[0]['tanggal'] ?>');
		self.besar = ko.observable('<?php if(isset($detil)) echo $detil[0]['besar'] ?>');
		self.supplier = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_supplier'] ?>');
		self.depreciationYear = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_depreciation_year'] ?>');
		
		self.keterangan = ko.observable('<?php if(isset($detil)) echo $detil[0]['keterangan'] ?>');
		self.isActive = ko.observable(<?php if(isset($detil)) {if($detil[0]['status'] == 1) echo "true"; else echo "false";} ?>);
		self.isActiveValue = ko.observable(<?php if(isset($detil)) {if($detil[0]['status'] == 1) echo "true"; else echo "false";} ?>);
		self.salvage_value = ko.observable('<?php if(isset($detil)) echo $detil[0]['salvage_value'] ?>');
		self.tgl_retire = ko.observable('<?php if(isset($detil)) echo $detil[0]['tgl_retire'] ?>');		
		self.alasan = ko.observable('<?php if(isset($detil)) echo $detil[0]['alasan'] ?>');
		self.keterangan_retire = ko.observable('<?php if(isset($detil)) echo $detil[0]['keterangan_retire'] ?>');
		

		
		self.documents = ko.observableArray([
			<?php if (isset($detils_document)) : ?>
			<?php if (is_array($detils_document)) : ?>
			<?php foreach ($detils_document as $toro => $value) : ?>
			//new AddDocuments("<?= $value['nama'] ?>", "<?= $value['keterangan'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);

		/*self.totalItem = ko.computed(function() {
			var total = 0;
			for (var i = 0; i < self.organizers().length; i++)
				total += Number(self.organizers()[i].banyak());
			return total.toFixed(2);
		});*/

		self.addServices = function() {
			self.services.push(new AddServices("", "", new Date(),new Date(), "", ""));
		}
		self.addDocuments = function() {
			self.documents.push(new AddDocuments("", ""));
		}
		
		self.removeService = function(service) { self.services.remove(service) }
		self.removeDocument = function(document) { self.documents.remove(document) }
	}

	ko.applyBindings(new OrganizerViewModel());
	
	<?php if($viewoptions['action'] == 'update') : ?>
	var service;
	var service_save_method;
	$(document).ready(function() {
		//datatables
		service = $('#asset-service-table').DataTable({ 
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?php echo base_url('m_asset/ajax_list_service/'.$primary)?>",
				"type": "POST",
			},
	 
			//Set column definition initialisation properties.
			"columnDefs": [{ 
				"targets": [ -1 ], //last column
				"orderable": false, //set not orderable
			},],
		});
	 
		//set input/textarea/select event when change value, remove class error and remove text help block 
		$("input").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("textarea").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("select").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
	});
	
	function add_service() {
		service_save_method = 'add';
		$('#service-form')[0].reset();
		$('#service-modal .form-group').removeClass('has-error'); // clear error class
		$('#service-modal .help-block').empty(); // clear error string
		$('#service-modal').modal('show'); // show bootstrap modal
		$('#service-modal .modal-title').text('Add Service');
	}
	
	function edit_service(id) {
		save_method = 'update';
		$('#service-form')[0].reset();
		$('#service-form .form-group').removeClass('has-error');
		$('#service-form .help-block').empty();
	 
		//Ajax Load data from ajax
		$.ajax({
			url : "<?php echo site_url('m_asset/ajax_edit_service/')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				$('#service-form [name="id"]').val(data.id);
				$('#service-form [name="keterangan"]').val(data.keterangan);
				$('#service-modal').modal('show');
				$('#service-modal .modal-title').text('Edit Service');
			},
			error: function (jqXHR, textStatus, errorThrown){
				alert('Error get data from ajax');
			}
		});
	}
	
	function service_reload_table() {
		service.ajax.reload(null,false);
	}
 
	function save_service() {
		$('#btnSaveService').text('saving...');
		$('#btnSaveService').attr('disabled',true); 
		var url;
		if(service_save_method == 'add') {
			url = "<?php echo site_url('m_asset/ajax_add_service')?>";
		} else {
			url = "<?php echo site_url('m_asset/ajax_update_service')?>";
		}
	 
		// ajax adding data to database
		$.ajax({
			url : url,
			type: "POST",
			data: $('#service-form').serialize(),
			dataType: "JSON",
			success: function(data) {
				if(data.status) {
					$('#modal_form').modal('hide');
					service_reload_table();
				}
				else {
					for (var i = 0; i < data.inputerror.length; i++) 
					{
						$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
				}
				$('#btnSaveService').text('save');
				$('#btnSaveService').attr('disabled',false);
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSaveService').text('save');
				$('#btnSaveService').attr('disabled',false);
			}
		});
	}
	
	function delete_service(id) {
		if(confirm('Are you sure delete this data?')) {
			$.ajax({
				url : "<?php echo site_url('m_asset/ajax_delete_service')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					//if success reload ajax table
					$('#modal_form').modal('hide');
					service_reload_table();
				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert('Error deleting data');
				}
			});
	 
		}
	}
	<?php endif; ?>
	
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