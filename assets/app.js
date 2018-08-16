
$(document).ready(function()
{


	/*
		If there is a modal, we consider it is opened
		by default, as it is a message from the server.
	*/

	$('.modal').modal('toggle');




	/*
		The number of selected ducks is printed in realtime.
		BUG : this should break in mobile, as we use mouse move !
	*/

	$('#howmany').on('mousemove', function(){
		var value = $(this).val();
		console.log(value);
		$('#selected-range').html(value);
	});



	/*
		A datetime picker for the "when" field
	*/
	$('#when').datetimepicker({
		inline: true,
		sideBySide: true,
		format: 'YYYY/MM/DD hh:mm'
	});

});



