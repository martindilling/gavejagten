$(document).ready(function() {
	var d = new Date();

	var curr_date = d.getDate();
	var curr_month = d.getMonth();
	curr_month++;
	var curr_year = d.getFullYear();
	var curdate = curr_date + "-" + curr_month + "-" + curr_year;
	
	if (!$('#event_startdate').attr('value')) {
	    $('#event_startdate').attr('value', curdate);
	}
	
	if (!$('#event_enddate').attr('value')) {
	    $('#event_enddate').attr('value', curdate);
	}
	
	

	$('#event_startdate').DatePicker({
		format:'d-m-Y',
		date: curdate,
		current: curdate,
		start: 1,
		position: 'right',
		onBeforeShow: function(){
			$('#event_startdate').DatePickerSetDate($('#event_startdate').val(), true);
		},
		onChange: function(formated, dates){
			$('#event_startdate').val(formated);
//			$('#event_startdate').DatePickerHide();
		}
	});

	$('#event_enddate').DatePicker({
		format:'d-m-Y',
		date: curdate,
		current: curdate,
		start: 1,
		position: 'right',
		onBeforeShow: function(){
			$('#event_enddate').DatePickerSetDate($('#event_enddate').val(), true);
		},
		onChange: function(formated, dates){
			$('#event_enddate').val(formated);
//			$('#event_enddate').DatePickerHide();
		}
	});
});