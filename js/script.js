$(document).ready(function() {
	var d = new Date();

	var curr_date = d.getDate();
	var curr_month = d.getMonth();
	curr_month++;
	var curr_year = d.getFullYear();
	var curdate = curr_date + "/" + curr_month + "/" + curr_year;
	$('#event_startdate').attr('value', curdate);

	$('#event_startdate').DatePicker({
		format:'d/m/Y',
		date: curdate,
		current: curdate,
		start: 1,
		position: 'right',
		onBeforeShow: function(){
			$('#event_startdate').DatePickerSetDate($('#event_startdate').val(), true);
		},
		onChange: function(formated, dates){
			$('#event_startdate').val(formated);
			$('#event_startdate').DatePickerHide();

		}
	});
});