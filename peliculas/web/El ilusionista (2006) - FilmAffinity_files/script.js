
function initEB() {
    if (!EB.isInitialized()) {
        EB.addEventListener(EBG.EventName.EB_INITIALIZED, startAd);
    } else {
        startAd();
    }
}

function startAd() {
    addEventListeners();
    initBanner();
}

function addEventListeners() {
    document.getElementById("adv").addEventListener("click", clickthrough_general);
}

function clickthrough_general(){
    EB.clickthrough("");
}

function initBanner(){
	setTimeout(function(){
		$('#fondo').css('opacity',1);
	}, 500);
	setTimeout(function(){
		$('#logo').css({'opacity':1, 'bottom':10});
	}, 750);
	setTimeout(function(){
		bubbles();
	}, 950);
}

function bubbles(){
    $('.coche1').animate({opacity:'1'},300);
    setTimeout(function(){
        $('.coche2').animate({opacity:'1'},300);
    },100);
    setTimeout(function(){
        $('.coche3').animate({opacity:'1'},250);
    },180);
    setTimeout(function(){
       animateLetters(); 
    },400);
}

function animateLetters(){
	$('.anim').each(function(index) {
	  	$(this).delay(20 * index).animate({'opacity':1, 'margin-top':0},250);
	}).promise().done(function () { 
	    setTimeout(function(){
			hideText();
		}, 2000);
	});
}

function hideText(){
	$('#t1').animate({'margin-top':25, 'opacity':0},300).fadeOut(0, function(){
        $('.coche1, .coche2, .coche3').css({opacity:'0'});
        showCierre(); 
    });
}


function showCierre(){
	$('#cierre').fadeIn(350);
//	$('#cierre').delay(5000).fadeOut(350, function(){
//		bubbles();
//	});
}

