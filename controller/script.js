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
};//userValidation


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


//TRAINING PER POSITION
function trainingRecurrent(){
	var $training = $('#train_num').val();
	var $recurrent = $('#recurrent');
	$.ajax({
	type: 'POST',
	url: "../model/ajax.php", 
	data: {func: 'fname',
			value: $training},
		success: function(result){
	 	   	$recurrent.html(result);
	 	}
	});


};




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

//PAGINATION
	function selectPage_func(page,search){
	var selectedPage = $("select[name='selectedPage']").val();
	window.location.href="?page="+selectedPage+"&per-page=" + page +"&search=" +search+"";
	}


//BACK
function backHistory(url){
	if (!url){
		window.history.back();
	} else {
		window.location.href = url;
	}

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




//REFRESH PAGE
function refreshPage(){
	location.reload();
}


