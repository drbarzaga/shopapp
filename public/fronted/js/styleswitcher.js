// Styles Switcher
$(document).ready(function(){

	// Show Colors Panel
	$('#show-panel').click(function(){
		if($(this).hasClass('show-panel')) {
			$('.colors-switcher').css({'right': 0});
			$('#show-panel').removeClass('show-panel');
			$('#show-panel').addClass('hide-panel');
		}else if(jQuery(this).hasClass('hide-panel')) {
			$('.colors-switcher').css({'right': '-267px'});
			$('#show-panel').removeClass('hide-panel');
			$('#show-panel').addClass('show-panel');
		}
	});
	
});

$(document).ready(function($) {
  $(window).scroll(function(){
    var yOffset = 160;
    var currYOffSet = $(this).scrollTop();
    console.log(currYOffSet);
    if(yOffset < currYOffSet) {
      $("#navbar").addClass('navbar-fixed-top')
    }
    else {
      $("#navbar").removeClass('navbar-fixed-top')
    }
  })
});


