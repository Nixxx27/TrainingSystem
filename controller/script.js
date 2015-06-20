//INDEX =====================
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


//NEW EMPLOYEE ==========================
(function(){
	var $searchButton=$('#searchByForm').find('#searchButton'),
		$searchInputBox =$('#searchByForm').find('#searchInputBox');
	
	$searchButton.on('click',function(){
		if($searchInputBox.val()==''){
			$searchInputBox.attr('placeholder','Required...').focus();
			return false;
		}
	})
})();



//DASHBOARD ======================
(function(){
	var $panel= $('.panel');
		
	$panel.animate({marginRight:'0'},'slow');
	
	$panel.on('mouseenter',function(){
		$(this).addClass('squareStyle');
		})
		.on('mouseleave',function(){
		$(this).removeClass('squareStyle');
		})
})();

function skyGroupName(){
	 $(".element").typed({
        strings: ["SkyGroup Training Management System"],
        typeSpeed: 20
      });
};



//BACK
function backHistory(){
	$(this).on('click',function(){
		window.history.back();
	})
};

// TITLE HOVER 
    $('[data-toggle="popover"]').popover({
        trigger: 'hover',
        'placement': 'top'
        });



var count = 1;

function transition() {

    if(count == 1) {
        $('#test').css({height: $(window).height(),width: $(window).width(),backgroundImage : 'url(Skylogisticsslider0.jpg)'})
        count +=1;

    } else if(count == 2) {
         $('#test').css({height: $(window).height(),width: $(window).width(),backgroundImage : 'url(Skylogisticsslider1.jpg)'})
         count +=1;

    } else if(count == 3) {
         $('#test').css({height: $(window).height(),width: $(window).width(),backgroundImage : 'url(Skylogisticsslider2.jpg)'})
        count = 1;
    }

}
setInterval(transition, 3000);

//SYSTEM TITLE

(function(){
	 $(".element").text('SkyGroup Training Management System');
})();
