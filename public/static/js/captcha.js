window.onload = function(){
	getCaptcha();
}
function getCaptcha(){
	var times = new Date().getTime();
	$.get('/api/captcha?' + times, function(res){
		$('.captcha-img').attr('src', res['img']);
		$.cookie('captcha', res['key']);
		$('#captcha-key').attr('value', res['key']);
	});
}