$(document).ready(function(){
	$('#getCode').click(function () {
		$(this).attr('src', verify + '&' + Math.random());
	});
});


