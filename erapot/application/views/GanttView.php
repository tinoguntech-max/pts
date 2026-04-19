<script src="<?= base_url() ?>static/lib/dhtmlxGantt/codebase/dhtmlxgantt.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?= base_url() ?>static/lib/dhtmlxGantt/codebase/dhtmlxgantt.css" type="text/css" media="screen" title="no title" charset="utf-8">

<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div id="grocery">
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-light">
							<div class="panel-body">
								<div id="gantt_here" style='width:100%; height:500px;'></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
    gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
    gantt.config.scale_unit = "month";
	gantt.config.step = 1;
	gantt.config.date_scale = "%F, %Y";
	gantt.config.min_column_width = 50;
	gantt.config.scale_height = 90;
	var weekScaleTemplate = function(date){
		var dateToStr = gantt.date.date_to_str("%d %M");
		var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
		return dateToStr(date) + " - " + dateToStr(endDate);
	};
	gantt.config.subscales = [
		{unit:"week", step:1, template:weekScaleTemplate},
		{unit:"day", step:1, date:"%D" }
	];
	
	gantt.templates.progress_text = function(start, end, task){
		return "<span style='text-align:left;'>"+Math.round(task.progress*100)+ "% </span>";
	};

	gantt.config.lightbox.sections = [
		{name:"description", height:50, map_to:"text", type:"textarea", focus:true},
		{name:"project", map_to:"id_project", type:"select", options: [
			{key:<?= $primary ?>, label: "<?= $detil[0]['nama'] ?>"},
		]},
		{name:"priority", map_to:"priority", type:"select", options: [
			{key:1, label: "High"},
			{key:2, label: "Normal"},
			{key:3, label: "Low"}
		 ]},
		{name:"time", type:"duration", map_to:"auto"}
	];
	gantt.locale.labels.section_priority = "Priority";
	gantt.locale.labels.section_project = "Project";
	gantt.config.buttons_left=["dhx_save_btn","dhx_cancel_btn","complete_button"];
	gantt.locale.labels["complete_button"] = '<i class="fa fa-check-square-o"></i> Complete';
	gantt.attachEvent("onLightboxButton", function(button_id, node, e){
		if(button_id == "complete_button"){
			var id = gantt.getState().lightbox;
			gantt.getTask(id).progress = 1;
			gantt.updateTask(id);
			gantt.hideLightbox();
		}
	});
	<?php
		$start = DateTime::createFromFormat('Y-m-d', $detil[0]['date_start_contract']);
		$end = DateTime::createFromFormat('Y-m-d', $detil[0]['date_end_contract']);
	?>
    gantt.init("gantt_here", new Date(<?= $start->format('Y') ?>, <?= $start->format('m') ?>, <?= $start->format('d') ?>), 
		new Date(<?= $end->format('Y') ?>, <?= $end->format('m') ?>, <?= $end->format('d') ?>));
    gantt.load("<?= base_url() ?>project/data/<?= $primary ?>", "xml");

    var dp = new gantt.dataProcessor("<?= base_url() ?>project/data");
    dp.init(gantt);
</script>