$(document).ready(function() {

/**
***************************************************************
* =PAGE LOAD
***************************************************************
**/

	// Находим ширину экрана
	var screenWidth = $(document).width() + scrollWidth();

	$('.slider').slick({
		infinite: true,
		speed: 1000,
		fade: true,
		autoplaySpeed: 4000,
		autoplay: true,
		slidesToShow: 1,
		adaptiveHeight: true
	});

	// Карточка товара Slideshow
	$('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.slider-nav'
	});

	$('.slider-nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  centerMode: true,
	  focusOnSelect: true,
	  responsive: [
	      {
	        breakpoint: 1200,
	        settings: {
	          slidesToShow: 2,
	          slidesToScroll: 1,
	        }
	      },
	      {
	      	breakpoint: 991,
	      	settings: {
	      	  slidesToShow: 1,
	      	  slidesToScroll: 1,
	      	}
	      },
	      {
	      	breakpoint: 761,
	      	settings: {
	      	  slidesToShow: 2,
	      	  slidesToScroll: 1,
	      	}
	      },
	  ]
	});

	// Magnific Popup for slideshow
	$('.slider-for__link').magnificPopup({
		type:'image',
		gallery:{
		    enabled:true
		},
		zoom: {
		    enabled: true, // By default it's false, so don't forget to enable it
		    duration: 300, // duration of the effect, in milliseconds
		    easing: 'ease-in-out', // CSS transition easing function
		    opener: function(openerElement) {
		    return openerElement.is('img') ? openerElement : openerElement.find('img');
		    }
		  }
	});

	// Mask for callback phone
	$('.callback-form__tel').inputmask("+7 (999) 999-99-99");

/**
***************************************************************
* =USABILLITY
***************************************************************
**/

/*------------------------------------*\
    Menu dropdown
\*------------------------------------*/

$('#menu-main li.menu-item-has-children > a').on('click', function(event) {
	if(screenWidth < 768) {
		event.preventDefault();
		$(this).siblings('ul').slideToggle(400);

	}
});

/*------------------------------------*\
    Order trigger
\*------------------------------------*/

$('.order-trigger').on('click', function() {
	event.preventDefault();
	var orderName = $(this).parent().children('.product-email-name').text();
	$('#hidden-order-field').val(orderName);
	$('.callback-form__order-name').text(orderName);
	$('#order-form').modal('show');
});

/*------------------------------------*\
    Faq
\*------------------------------------*/
$('.faq__name').on('click', function(event) {
	event.preventDefault();
	var $this = $(this);
	if($this.hasClass('faq__name--active')) {
		$this.removeClass('faq__name--active');
	} else {
		$this.addClass('faq__name--active')
			.siblings('.faq__name')
			.removeClass('faq__name--active');
		console.log('no');
	}

	$this.next('.faq__content')
		.slideToggle()
		.siblings('.faq__content')
		.slideUp();
});



/**
***************************************************************
* =FUNCTIONS
***************************************************************
**/

// Функция определения плосы прокрутки
	    function scrollWidth() {
	    var div = $('<div>').css({
	        position: "absolute",
	        top: "0px",
	        left: "0px",
	        width: "100px",
	        height: "100px",
	        visibility: "hidden",
	        overflow: "scroll"
	    });

	    $('body').eq(0).append(div);

	    var width = div.get(0).offsetWidth - div.get(0).clientWidth;

	    div.remove();

	    return width;
	}
});