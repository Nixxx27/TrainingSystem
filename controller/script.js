function userValidation(){
	var msg=$('#msg'),
		username = $('form').find('#username'),
		password = $('form').find('#password');

	msg.hide();
	if (username.val()=='' || password.val()==''){
		msg.fadeIn(500);
		(username.val()=='')? 
			(username.addClass('requireFields'),
			password.removeClass('requireFields'),
			username.animate({height: '+=20'}).delay(500).animate({height: '-=20'}),
			username.focus())
		: 	
			(username.removeClass('requireFields'),
			password.addClass('requireFields'),
			password.animate({height: '+=20'}).delay(500).animate({height: '-=20'}),
			password.focus())
	}else{
		$('#loginForm').submit();
	}
}//userValidation



// TITLE HOVER 
    $('[data-toggle="popover"]').popover({
        trigger: 'hover',
        'placement': 'top'
        });


// Sort function
(function(){
	/*$thId = $('#thId'),
	$thName = $('#thName'),
	$thDept =$('#thDept');

	$thId.on('click',function(){
		$('#orderByIdForm').submit();
	}).on('mouseenter',function(){$thId.removeAttr('style').addClass('blueLink')})
	  .on('mouseleave',function(){$thId.removeClass('blueLink')})

	$thName.on('click',function(){
		$('#orderByNameForm').submit();
	}).on('mouseenter',function(){$thName.removeAttr('style').addClass('blueLink')})
	  .on('mouseleave',function(){$thName.removeClass('blueLink')})

	$thDept.on('click',function(){
		$('#orderByDeptForm').submit();
	}).on('mouseenter',function(){$thDept.removeAttr('style').addClass('blueLink')})
	  .on('mouseleave',function(){$thDept.removeClass('blueLink')})
*/

})();