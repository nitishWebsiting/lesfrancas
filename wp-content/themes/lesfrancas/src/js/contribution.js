$(function () {
	console.log('done');
	//$('.datepicker').datepicker();

    $('#date_start').datetimepicker();
    $('#date_end').datetimepicker({
        useCurrent: false //Important! See issue #1075
    });
    $("#date_start").on("dp.change", function (e) {
        $('#date_end').data("DateTimePicker").minDate(e.date);
    });
    $("#date_end").on("dp.change", function (e) {
        $('#date_start').data("DateTimePicker").maxDate(e.date);
    });
});