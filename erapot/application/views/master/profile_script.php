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
	function AddSkills(skill, nilai, keterangan) {
		var self = this;
		self.selectedSkill = ko.observable(skill);
		self.skill_nilai = ko.observable(nilai);
		self.skill_keterangan = ko.observable(keterangan);
	}
	
	function AddLanguages(language, reading , speaking , writing , understanding) {
		var self = this;
		self.selectedLanguage = ko.observable(language);
		self.selectedProficiencyReading = ko.observable(reading);
		self.selectedProficiencySpeaking = ko.observable(speaking);
		self.selectedProficiencyWriting = ko.observable(writing);
		self.selectedProficiencyUnderstanding = ko.observable(understanding);
	}
	
	
	function AddCertifications(certification, institute , granted_on , valid_thru , keterangan) {
		var self = this;
		self.selectedCertification = ko.observable(certification);
		self.certification_institute = ko.observable(institute);
		self.certification_granted_on = ko.observable(new Date(granted_on)).extend({date: true});
		self.certification_valid_thru = ko.observable(new Date(valid_thru)).extend({date: true});		
		self.certification_keterangan = ko.observable(keterangan);
	}
	
	function AddDependents(nama, relationship , tanggal_lahir , id_number) {
		var self = this;
		self.dependent_nama = ko.observable(nama);
		self.selectedRelationship = ko.observable(relationship);
		self.dependent_tanggal_lahir = ko.observable(new Date(tanggal_lahir)).extend({date: true});
		self.dependent_id_number = ko.observable(id_number);
	}
	
	function AddEducations(education, institute , start_date , completed_on , keterangan) {
		var self = this;
		self.selectedEducation = ko.observable(education);
		self.education_institute = ko.observable(institute);
		self.education_start_date = ko.observable(new Date(start_date)).extend({date: true});
		self.education_completed_on = ko.observable(new Date(completed_on)).extend({date: true});		
		self.education_keterangan = ko.observable(keterangan);
	}
	

	function OrganizerViewModel() {
		var self = this;

		// Initial data
		self.availableUserLevel = ko.observableArray(<?php if(isset($access_group)) echo $access_group; ?>);
		self.availableCabang= ko.observableArray(<?php if(isset($m_cabang)) echo $m_cabang; ?>);
		self.availableScreenLanguage = ko.observableArray([{"id":"indonesia", "nama":"Bahasa Indonesia"}, {"id":"english", "nama":"English"}]);
		self.availableSkills = ko.observableArray(<?php if(isset($m_skill)) echo $m_skill; ?>);
		self.availableLanguages = ko.observableArray(<?php if(isset($m_language)) echo $m_language; ?>);
		self.availableProficiencyReading = ko.observableArray(<?php if(isset($m_proficiency)) echo $m_proficiency; ?>);
		self.availableProficiencySpeaking = ko.observableArray(<?php if(isset($m_proficiency)) echo $m_proficiency; ?>);
		self.availableProficiencyWriting = ko.observableArray(<?php if(isset($m_proficiency)) echo $m_proficiency; ?>);
		self.availableProficiencyUnderstanding = ko.observableArray(<?php if(isset($m_proficiency)) echo $m_proficiency; ?>);
		self.availableCertification = ko.observableArray(<?php if(isset($m_certification)) echo $m_certification; ?>);
		self.availableRelationship = ko.observableArray(<?php if(isset($m_relationship)) echo $m_relationship; ?>);
		self.availableEducation = ko.observableArray(<?php if(isset($m_education)) echo $m_education; ?>);
		
		self.availableJenisIdentitas = ko.observableArray(<?php if(isset($m_jenis_identitas)) echo $m_jenis_identitas; ?>);
		self.availableAgama = ko.observableArray(<?php if(isset($m_agama)) echo $m_agama; ?>);
		self.availableGolonganDarah = ko.observableArray(<?php if(isset($m_golongan_darah)) echo $m_golongan_darah; ?>);
		self.availableNationality = ko.observableArray(<?php if(isset($m_nationality)) echo $m_nationality; ?>);
		self.availableStatusPernikahan = ko.observableArray(<?php if(isset($m_status_pernikahan)) echo $m_status_pernikahan; ?>);
		self.availableScreenLanguange = ko.observableArray(<?php if(isset($m_language)) echo $m_language; ?>);
		
		self.user_name = ko.observable('<?php if(isset($detil)) echo $detil[0]['user_name'] ?>');
		self.user_pass = ko.observable('');
		self.userLevel = ko.observable('<?php if(isset($detil)) echo $detil[0]['user_level'] ?>');
		self.nama = ko.observable('<?php if(isset($detil)) echo $detil[0]['nama'] ?>');
		self.cabang = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_cabang'] ?>');
		
		self.jenisIdentitas = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_jenis_identitas'] ?>');
		self.ssn_nric = ko.observable('<?php if(isset($detil)) echo $detil[0]['ssn_nric'] ?>');
		self.alamat = ko.observable('<?php if(isset($detil)) echo $detil[0]['alamat'] ?>');
		self.telp = ko.observable('<?php if(isset($detil)) echo $detil[0]['telp'] ?>');
		self.email = ko.observable('<?php if(isset($detil)) echo $detil[0]['email'] ?>');
		self.agama = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_agama'] ?>');
		self.golonganDarah = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_golongan_darah'] ?>');
		self.nationality = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_nationality'] ?>');
		self.statusPernikahan = ko.observable('<?php if(isset($detil)) echo $detil[0]['id_m_status_pernikahan'] ?>');
		self.screenLanguage = ko.observable('<?php if(isset($detil)) echo $detil[0]['screen_language'] ?>');
		
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
		
		self.skills = ko.observableArray([
			<?php if (isset($detils_skill)) : ?>
			<?php if (is_array($detils_skill)) : ?>
			<?php foreach ($detils_skill as $toro => $value) : ?>
			new AddSkills("<?= $value['id_m_skill'] ?>", <?= $value['nilai'] ?>, "<?= $value['keterangan'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.languages = ko.observableArray([
			<?php if (isset($detils_language)) : ?>
			<?php if (is_array($detils_language)) : ?>
			<?php foreach ($detils_language as $toro => $value) : ?>
			new AddLanguages("<?= $value['id_m_language'] ?>", <?= $value['id_m_proficiency_reading'] ?>,
			<?= $value['id_m_proficiency_speaking'] ?>,<?= $value['id_m_proficiency_writing'] ?>, "<?= $value['id_m_proficiency_understanding'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.certifications = ko.observableArray([
			<?php if (isset($detils_certification)) : ?>
			<?php if (is_array($detils_certification)) : ?>
			<?php foreach ($detils_certification as $toro => $value) : ?>
			<?php $serverDate1 = DateTime::createFromFormat('Y-m-d', $value['granted_on']); ?>
			<?php $serverDate2= DateTime::createFromFormat('Y-m-d', $value['valid_thru']); ?>
			new AddCertifications("<?= $value['id_m_certification'] ?>", "<?= $value['institute'] ?>", "<?= $serverDate1->format('m/d/Y') ?>","<?= $serverDate2->format('m/d/Y') ?>", "<?= $value['keterangan'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.dependents = ko.observableArray([
			<?php if (isset($detils_dependent)) : ?>
			<?php if (is_array($detils_dependent)) : ?>
			<?php foreach ($detils_dependent as $toro => $value) : ?>
			<?php $serverDate3 = DateTime::createFromFormat('Y-m-d', $value['tanggal_lahir']); ?>
			new AddDependents("<?= $value['nama'] ?>", <?= $value['id_m_relationship'] ?>, "<?= $serverDate3->format('m/d/Y') ?>", "<?= $value['id_number'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		self.educations = ko.observableArray([
			<?php if (isset($detils_education)) : ?>
			<?php if (is_array($detils_education)) : ?>
			<?php foreach ($detils_education as $toro => $value) : ?>
			<?php $serverDate4 = DateTime::createFromFormat('Y-m-d', $value['start_date']); ?>
			<?php $serverDate5= DateTime::createFromFormat('Y-m-d', $value['completed_on']); ?>
			new AddEducations("<?= $value['id_m_education'] ?>", "<?= $value['institute'] ?>", "<?= $serverDate4->format('m/d/Y') ?>","<?= $serverDate5->format('m/d/Y') ?>", "<?= $value['keterangan'] ?>"),
			<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
		]);
		
		/*self.provincesBilling.subscribe(function (val) {
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
		});*/
		
		/*self.totalItem = ko.computed(function() {
			var total = 0;
			for (var i = 0; i < self.organizers().length; i++)
				total += Number(self.organizers()[i].banyak());
			return total.toFixed(2);
		});*/
		
		self.addEvents = function() {
			self.events.push(new AddEvents("", "", ""));
		}
		
		self.addSkills = function() {
			self.skills.push(new AddSkills("", ""));
		}
		
		self.addLanguages = function() {
			self.languages.push(new AddLanguages("", "", "", "", ""));
		}
		
		self.addCertifications = function() {
			self.certifications.push(new AddCertifications("", "", new Date(), new Date(), ""));
		}
		
		self.addDependents = function() {
			self.dependents.push(new AddDependents("", "", new Date(), ""));
		}
		
		self.addEducations = function() {
			self.educations.push(new AddEducations("", "", new Date(), new Date(), ""));
		}
		
		self.removeEntity = function(event) { self.events.remove(event) }
		
		self.removeSkill = function(skill) { self.skills.remove(skill) }
		
		self.removeLanguage = function(language) { self.languages.remove(language) }
		
		self.removeCertification = function(certification) { self.certifications.remove(certification) }
		
		self.removeDependent = function(dependent) { self.dependents.remove(dependent) }
		
		self.removeEducation = function(education) { self.educations.remove(education) }
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