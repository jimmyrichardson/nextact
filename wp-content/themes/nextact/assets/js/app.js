jQuery(document).ready(function($){

if(navigator.userAgent.indexOf('Edge') > 1 || navigator.userAgent.indexOf('.NET CLR') > 1){
	document.body.classList.add('microsoft');
}
if(navigator.userAgent.indexOf('.NET CLR') > 1){ document.body.classList.add('ie'); }
	
var li = 100,
    p = window.performance.timing,
    t = -(p.loadEventEnd - p.navigationStart),
    a = parseInt((t/1000)%60)*75;

var PercentageID = $("#progress"),
    start = 0,
    end = 100,
    duration = a;
    
animateValue(PercentageID, start, end, duration);
    
function animateValue(id, start, end, duration){ 
    var range = end - start,
        current = start,
        increment = end > start? 1 : -1,
        stepTime = Math.abs(Math.floor(duration / range)),
        obj = $(id);
    var timer = setInterval(function(){
        current += increment;
        $(obj).text(current);
        if (current == end){ clearInterval(timer); }
    }, stepTime);
}
   
new TimelineMax()
    .to('#loading',1,{ opacity: 0 }, (a / 1000)+0.5 )
    .set('#loading',{visibility:'hidden'});
    
$('.wave-1').wavify({ height: 20, bones: 5, amplitude: 45, speed: .6 });
$('.wave-2').wavify({ height: 22, bones: 5, amplitude: 50, speed: .6 });
$('.wave-3').wavify({ height: 24, bones: 6, amplitude: 55, speed: .6 });
$('.wave-4').wavify({ height: 26, bones: 7, amplitude: 60, speed: .6 });
$('.wave-5').wavify({ height: 28, bones: 8, amplitude: 65, speed: .6 });
    
new TimelineMax()
    .staggerTo('#loading .wave path',1,{ strokeDashoffset: '0%'},'0.15');    
  
$('a[href="#"]').removeAttr('href');

$('.sub-menu').each(function(){
	var siblingText = $(this).siblings('a').text();
	$(this).attr('data-menu-name',siblingText);
});
	
// Menu
	
var toggled = false;
$('#mobile button').click(function(){
	toggled = !toggled;
	if( toggled ){
		new TimelineLite()
			.set('#mobile',{visibility:'visible'})
			.set('#mobile-menu-content',{display:'block'})
			.to($('#swipe-1'),0.6,{ left: '0%', ease: Expo.easeInOut })
			.to($('#swipe-2'),0.6,{ right: '0%', ease: Expo.easeInOut },'-=0.6')
			.staggerFromTo('#mobile-menu-content .menu-item-has-children',0.35,
						   { y: 30, opacity: 0 },{ y: 0, opacity: 1 },'0.075','-=0.15');
	} else {
		new TimelineLite()
			.staggerFromTo('#mobile-menu-content .menu-item-has-children',0.35,
						   { y: 0, opacity: 1 },{ y: -30, opacity: 0 },'0.075')
			.to($('#swipe-1'),0.6,{ left: '-80%', ease: Expo.easeInOut },'-=0.3')
			.to($('#swipe-2'),0.6,{ right: '-20%', ease: Expo.easeInOut },'-=0.6')
			.set('#mobile-menu-content',{display:'none'})
			.set('#mobile',{visibility:'hidden'});
	}
});
	
// Slider

function sliderParallax(){
	if( document.querySelector('.slide') ){
    	document.querySelector('.slide.active .slide-content')
    	    .style.transform = 'translateY('+-(50 + (window.scrollY / 10))+'%)';
    	document.querySelector('.slide.active .slide-content-bg')
    	    .style.top = (window.scrollY / 5)+'px';
    	document.querySelector('.slide.active .slide-content h3')
    	    .style.transform = 'translateY('+-(window.scrollY * 0.1)+'px)';
    	document.querySelector('.slide.active .slide-content .cta')
        	.style.transform = 'translateY('+(window.scrollY / 15)+'px)';
		window.requestAnimationFrame(sliderParallax);
	}
	if( document.getElementById('hero') ){
	   document.getElementById('hero').style.transform = 'translateY('+(window.scrollY/2)+'px)';
	}
};

window.requestAnimationFrame(sliderParallax);

window.addEventListener('scroll',function(){
    window.requestAnimationFrame(sliderParallax);
});

var si = 0,
    totalSlides = document.querySelectorAll('.slide').length,
    totalSlideIndex = totalSlides - 1;

function slideInit(){
	if( document.querySelector('.slide') ){
		document.querySelector('.slide').classList.add('active');
    	new SplitText('.slide-content h2',{type:'words,chars'});
    	new SplitText('.slide-content h3',{type:'words,chars'});
    	document.getElementById('counter-total')
    	    .innerText = ( totalSlides < 10 ? '0'+totalSlides : totalSlides );
    	for( var i = 0; i < totalSlides; i++ ){
    	    document.getElementsByClassName('slide')[i].dataset.index = i;
    	}
    	document.getElementsByClassName('slide')[(totalSlides-1)].dataset.lastSlide = true;
	}
}
slideInit();

function incIndex(){
    si++;
    if(si === totalSlides){ si = 0; }
    document.querySelector('.slide.active').classList.remove('active');
    document.getElementsByClassName('slide')[si].classList.add('active');    
}
function afterInc(){
     new TimelineMax()
        .set('.slide.active h2 div div',{ x: 15, opacity: 0 })
        .set('.slide.active h3 div div',{ x: 15, opacity: 0 })
        .set('.slide.active a',{ x: 15, opacity: 0 })
        .set('.slide.active .slide-content-bg',{ left: '10%', opacity: 0 })
        .staggerTo('.slide.active h3 div div',0.3,{ x: 0, opacity: 1, ease: Sine.easeOut },'-=0.3')
        .staggerTo('.slide.active h2 div div',0.3,{ x: 0, opacity: 1, ease: Sine.easeOut },'0.03','-=0.6')
        .to('.slide.active a',0.3,{ x: 0, opacity: 1, ease: Sine.easeOut },'-=0.6')
        .to('.slide.active .slide-content-bg',1,{ opacity: 1 },'-=0.5')
        .to('.slide.active .slide-content-bg',1.25,{ left: '-10%', ease: Sine.easeOut },'-=1.75');
	
	document.getElementById('counter-current').innerText = '0'+
		(parseInt(document.querySelector('.slide.active').dataset.index)+1);
}
function decIndex(){
    si--;
    if(si < 0){ si = totalSlideIndex; }
    document.querySelector('.slide.active').classList.remove('active');
    document.getElementsByClassName('slide')[si].classList.add('active');
}
function afterDec(){
     new TimelineMax()
        .set('.slide.active h2 div div',{ x: -15, opacity: 0 })
        .set('.slide.active h3 div div',{ x: -15, opacity: 0 })
        .set('.slide.active a',{ x: -15, opacity: 0 })
        .set('.slide.active .slide-content-bg',{ left: '-15%', opacity: 0 })
        .staggerTo('.slide.active h3 div div',0.3,{ x: 0, opacity: 1, ease: Sine.easeOut },'-=0.3')
        .staggerTo('.slide.active h2 div div',0.3,{ x: 0, opacity: 1, ease: Sine.easeOut },'0.03','-=0.6')
        .to('.slide.active a',0.3,{ x: 0, opacity: 1, ease: Sine.easeOut },'-=0.6')
        .to('.slide.active .slide-content-bg',1.25,{ left: '-10%', opacity: 1, ease: Sine.easeOut },'-=1.25');
	
	document.getElementById('counter-current').innerText = '0'+
		(parseInt(document.querySelector('.slide.active').dataset.index)+1);
}

function nextSlide(){
    new TimelineMax()
        .staggerTo('.slide.active h3 div div',0.3,{ x: -15, opacity: 0, ease: Expo.easeIn },'0.03')
        .staggerTo('.slide.active h2 div div',0.1,{ x: -15, opacity: 0, ease: Expo.easeIn },'0.03','-=0.75')
        .to('.slide.active a',0.3,{ x: -15, opacity: 0, ease: Expo.easeIn },'-=0.6')
        .to('.slide.active .slide-content-bg',1.25,{ left: '-15%', opacity: 0, ease: Expo.easeIn },'-=1.25')
        .call(incIndex)
        .call(afterInc);    
};
function prevSlide(){
    new TimelineMax()
        .staggerTo('.slide.active h3 div div',0.3,{ x: 15, opacity: 0, ease: Expo.easeIn },'0.03')
        .staggerTo('.slide.active h2 div div',0.3,{ x: 15, opacity: 0, ease: Expo.easeIn },'0.03','-=0.6')
        .to('.slide.active a',0.3,{ x: 15, opacity: 0, ease: Expo.easeIn },'-=0.6')
        .to('.slide.active .slide-content-bg',1.25,{ left: '15%', opacity: 0, ease: Expo.easeIn },'-=1.25')
        .call(decIndex)
        .call(afterDec);
};

if( document.querySelector('.slide') ){
	document.getElementById('slide-prev').addEventListener('click',prevSlide);
	document.getElementById('slide-next').addEventListener('click',nextSlide);
}
	
new SplitText('.home-event h2',{ type: 'words' });
    
var eventWidth = 0,
    homeEvents = document.querySelectorAll('.home-event');
    
[].forEach.call(homeEvents,function(e){ eventWidth += e.offsetWidth; });
    
var slideWidth = 400,
    slideVelocity = 1;
    
var sliderDrag = Draggable.create(".home-events-slider-inner",{
    allowEventDefault: true,
    type: 'x',
    edgeResistance: 0.75,
    throwProps: true,
    lockAxis: true,
    bounds: '#home-events-slider',
    snap: function(endValue){
        return Math.round(endValue / slideWidth) * slideWidth;
    },
    onDrag: function(sliderDrag,endValue){
        var sliderDrag = this;
        [].forEach.call(
            document.querySelectorAll('.home-event-image-inner'),
            function(e){
                if( sliderDrag.getDirection('velocity') === 'left' ){
                   slideVelocity += 1;
                } else {
                    slideVelocity -= 1;
                }
                e.style.left = (-slideVelocity/3.25)+'%';
            }
        );
    },
    onDragEnd: function(){
        var counter = { decr: slideVelocity };
        new TimelineMax()
            .to( counter, 0.1, {
                decr: 1, onUpdate: function(){
                    slideVelocity = counter.decr;
                }});
        new TimelineMax()
            .to('.home-event-image-inner',0.6,{ left: '0%' });
    }
});
   
document.querySelector('.home-events-slider-inner')
    .style.width = eventWidth+'px';

}); //docready