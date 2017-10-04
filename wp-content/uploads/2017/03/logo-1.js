$( document ).ready(function() {
	if(!$('.retina').is(':visible'))
	{
		$('img').remove(".standard");
	}
	else
	{
		$('img').remove(".retina");
	}
});