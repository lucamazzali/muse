// VIDEO HOME PAGE


var $player = $('#player');
var $parent = $player.parent();
var $win = $(window);
var resizeTimeout = null;
var shouldResize = true;
var shouldPosition = true;
var videoRatio = 4 / 3;
  

var resize = function() {
  if (!shouldResize) { return; }

  var height = $parent.height();
  var width = $parent.width();
  var viewportRatio = width / height;
  var scale = 1;

  if (videoRatio < viewportRatio) {
    // viewport more widescreen than video aspect ratio
    scale = viewportRatio / videoRatio;
  } else if (viewportRatio < videoRatio) {
    // viewport more square than video aspect ratio
    scale = videoRatio / viewportRatio;
  }

  var offset = positionVideo(scale, width, height);
  setVideoTransform(scale, offset);
};

var setVideoTransform = function(scale, offset) {
  offset = $.extend({ x: 0, y: 0 }, offset);
  var transform = 'translate(' + Math.round(offset.x) + 'px,' + Math.round(offset.y) + 'px) scale(' + scale  + ')';
  $player.css({
    '-webkit-transform': transform,
    'transform': transform
  });
};

// accounts for transform origins on scaled video
var positionVideo = function(scale, width, height) {
  if (!shouldPosition) { return false; }

  var x = parseInt($player.data('origin-x'), 10);
  var y = parseInt($player.data('origin-y'), 10);
  setVideoOrigin(x, y);

  var viewportRatio = width / height;
  var scaledHeight = scale * height;
  var scaledWidth = scale * width;
  var percentFromX = (x - 50) / 100;
  var percentFromY = (y - 50) / 100;
  var offset = {};

  if (videoRatio < viewportRatio) {
    offset.x = (scaledWidth - width) * percentFromX;
  } else if (viewportRatio < videoRatio) {
    offset.y = (scaledHeight - height) * percentFromY;
  }

  return offset;
};

var setVideoOrigin = function(x, y) {
  var origin = x + '% ' + y + '%';
  $player.css({
    '-webkit-transform-origin': origin,
    'transform-origin': origin
  });
};

$win.on('resize', function() {
  clearTimeout(resizeTimeout);
  resizeTimeout = setTimeout(resize, 100);
});

resize();


// FOTO HOME
$.fn.resizeToParent = function(opts) {
  var defaults = {
   parent: 'div',
   delay: 100,
   align: 'center'
  }

  var opts = $.extend(defaults, opts);

  function positionImage(obj) {
    // reset image (in case we're calling this a second time, for example on resize)
    obj.css({'width': '', 'height': '', 'margin-left': '', 'margin-top': ''});

    // dimensions of the parent
    var parentWidth = obj.parents(opts.parent).width();
    var parentHeight = obj.parents(opts.parent).height();

    // dimensions of the image
    var imageWidth = obj.width();
    var imageHeight = obj.height();

    // step 1 - calculate the percentage difference between image width and container width
    var diff = imageWidth / parentWidth;

    // step 2 - if height divided by difference is smaller than container height, resize by height. otherwise resize by width
    if ((imageHeight / diff) < parentHeight) {
      // window verticale
     obj.css({'width': 'auto', 'height': parentHeight});

     // set image variables to new dimensions
     imageWidth = imageWidth / (imageHeight / parentHeight);
     imageHeight = parentHeight;
    }
    else {
      // window orizzontale
     obj.css({'height': 'auto', 'width': parentWidth});

     // set image variables to new dimensions
     imageWidth = parentWidth;
     imageHeight = imageHeight / diff;
    }

    // step 3 - center image in container
    switch (opts.align) { 

      case 'top': 
        var leftOffset = (imageWidth - parentWidth) / -2;
        var topOffset = 0;
      break; 

      case 'bottom': 
        var leftOffset = (imageWidth - parentWidth) / -2;
        var topOffset = -(imageHeight - parentHeight);
      break; 

      case 'left': 
        var leftOffset = 0;
        var topOffset = (imageHeight - parentHeight) / -2;
      break;

      case 'right': 
        var leftOffset = -(imageWidth - parentWidth) ;
        var topOffset = (imageHeight - parentHeight) / -2;
      break; 

      default: 
        var leftOffset = (imageWidth - parentWidth) / -2;
        var topOffset = (imageHeight - parentHeight) / -2;

    }

    // var leftOffset = (imageWidth - parentWidth) / -2;
    // var topOffset = (imageHeight - parentHeight) / -2;

    obj.css({'margin-left': leftOffset, 'margin-top': topOffset});
  }

  // run the position function on window resize (to make it responsive)
  var tid;
  var elems = this;

  $(window).on('resize', function() {
    clearTimeout(tid);
    tid = setTimeout(function() {
      elems.each(function() {
        positionImage($(this));
      });
    }, opts.delay);
  });

  return this.each(function() {
    var obj = $(this);

    // hack to force ie to run the load function... ridiculous bug 
    // http://stackoverflow.com/questions/7137737/ie9-problems-with-jquery-load-event-not-firing
    obj.attr("src", obj.attr("src"));

    // bind to load of image
    obj.load(function() {
      positionImage(obj);
    });

    // run the position function if the image is cached
    if (this.complete) {
      positionImage(obj);
    }
  });
}
$('#container figure img').resizeToParent({parent: '#container', delay: 10});




// IE detect
function iedetect(v) {

  var r = RegExp('msie' + (!isNaN(v) ? ('\\s' + v) : ''), 'i');
  return r.test(navigator.userAgent);
    
}

// For mobile screens, just show an image called 'poster.jpg'. Mobile
// screens don't support autoplaying videos, or for IE.
if($(window).width() < 800 || iedetect(8) || iedetect(7) || 'ontouchstart' in window) {

  (adjSize = function() { // Create function called adjSize
    
    $width = $(window).width(); // Width of the screen
    $height = $(window).height(); // Height of the screen
    
    // Resize image accordingly
    $('.container-image').show();
    
    // Hide video
    $('#player').hide();
    
  })(); // Run instantly
  
  // Run on resize too
  $(window).resize(adjSize);
}





// FINE VIDEO HOME PAGE
  
// // LAZY LOAD
// $("img.lazy").lazyload();

// var $heightWin = $(window).height();
// $('.bg, .bg_pic').height($heightWin);

// $(window).resize( function (){
// 	var $heightWin = $(window).height();
// 	$('.bg, .bg_pic').height($heightWin);
// 	menuMobile();
// 	heightBox();
// });

// $('.second-nav li').on('click', function(e){
// 	e.preventDefault();
// 	$sort = $(this).text();
// 	$('.list-brands li').hide();
// 	if( $sort == "all" ) {
// 		$('.list-brands li').show();
// 	} else {
// 		$('.list-brands li.'+$sort+'').show();
// 	}
// });



// // MAPPA
// //Standard google maps function
// function initialize() {
// 	// fornisce latitudine e longitudine
// 	var latlng = new google.maps.LatLng(45.4605025,9.2248994);

// 	// imposta le opzioni di visualizzazione
// 	var options = {
// 		zoom: 13,
// 		center: latlng,
// 		mapTypeId: google.maps.MapTypeId.ROADMAP,
// 		styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
// 	};
	 
// 	// crea l'oggetto mappa
// 	var map = new google.maps.Map(document.getElementById('map-canvas'), options);

//     var marker = new google.maps.Marker({
//     	position: latlng,
//         map: map, 
//         title: 'Questo è un testo di suggerimento'
//     });
// }

// if ( $('#map-canvas').length ) {
// 	initialize();
// }



// $(window).load(function() {
//   $('.foto-brands').flexslider({
//     animation: "slide",
//     slideshow: false,
//     animationLoop: true,
//     controlNav: false,
//     start: function (slider) {
//        // lazy load
//        $(slider).find("img.lazy").slice(0,2).each(function () {
//        var src = $(this).attr("data-src");
//           $(this).attr("src", src).removeAttr("data-src").removeClass("lazy");
//        });
//      },
//     before: function (slider) {
//         // lazy load
//        var slide = $(slider).find('.slides').children().eq(slider.animatingTo+1).find('img');
//        var src = slide.attr("data-src");
//        slide.attr("src", src).removeAttr("data-src").removeClass("lazy");
//     }
//   });
//   $('.foto-about').flexslider({
//     animation: "slide",
//     slideshow: false,
//     animationLoop: true,
//     controlNav: false
//   });
// });


// // MENU MOBILE
// function menuMobile(){
// 	if ( $(window).width() <= 768 ) {
// 		$('#menu').mmenu();
// 	}
// }
// menuMobile();

// // single-box
// function heightBox() {
// 	$( ".single-box" ).each(function() {
// 		$(this).height( $(this).width() );
// 	});
// }
// heightBox();