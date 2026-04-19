<script>
	function OrganizerViewModel() {
		var self = this;

		// Initial data
		self.user_pass = ko.observable('');
		self.new_user_pass = ko.observable('');
		self.renew_user_pass = ko.observable('');

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