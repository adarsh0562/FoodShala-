/*
 jQuery;
 */

"use strict";


jQuery(document).ready(function ($) {

	$(window).load(function () {
		$(".loaded").fadeOut();
		$(".preloader").delay(1000).fadeOut("slow");
	});




	jQuery('.scrollup').click(function () {
		$("html, body").animate({scrollTop: 0}, 2000);
		return false;
	});

	jQuery('.nav a').bind('click', function () {
		$('html , body').stop().animate({
			scrollTop: $($(this).attr('href')).offset().top - 80
		}, 1500, 'easeInOutExpo');
		event.preventDefault();
	});
	
	
	jQuery(window).scroll(function () {
	  var top = jQuery(document).scrollTop();
		var height = 300;
	  //alert(batas);
	  
	  if (top > height) {
		jQuery('.navbar-fixed-top').addClass('menu-scroll');
	  } else {
	   jQuery('.navbar-fixed-top').removeClass('menu-scroll');
	  }
	});	
 // Scroll up 

    $(window).scroll(function(){
        if ($(this).scrollTop() > 600) {
            $('.scrollup').fadeIn('slow');
        } else {
            $('.scrollup').fadeOut('slow');
        }
    });
    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
    }); 
 
 new WOW().init();

});

/* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 15.00; 
var fadeTime = 300;


/* Assign actions */
$('.product-quantity input').change( function() {
  updateQuantity(this);
});

$('.product-removal button').click( function() {
  removeItem(this);
});


// order Page

function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  var amount = document.getElementById('price').innerHTML;

  value = isNaN(value) ? 0 : value;
  if(value <= 4){
  	value++;
  document.getElementById('amount').innerHTML = amount*value;
  var gst = (amount*value) + ((amount*value)*(18/100));
  document.getElementById('totalAmount').innerHTML = gst;


  document.getElementById('number').value = value;
  document.getElementById('inputQty').value = value;
  document.getElementById('inputTotal').value = gst;
}
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  var amount = document.getElementById('price').innerHTML;
  value = isNaN(value) ? 0 : value;
  if(value > 1){
  value--;
  document.getElementById('amount').innerHTML = amount*value;
  var gst = (amount*value) + ((amount*value)*(18/100));
  document.getElementById('totalAmount').innerHTML = gst;


  document.getElementById('number').value = value;
  document.getElementById('inputQty').value = value;
  document.getElementById('inputTotal').value = gst;
document.getElementById('number').value = value;
}
}

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
