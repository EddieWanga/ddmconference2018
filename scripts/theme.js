$(document).ready(function() {
"use strict";

  // Single Speakers
  $('.single').hover(function() {
 
    $(this).find('div').slideToggle(150);

  });

  // Tabs
  $('.tabs').tabs();

  // Contact Form
  $('.open-contact-form').click(function(e) {
    $('.overlay').fadeIn('fast');

    e.preventDefault();
  });

  $('.close-contact-form').click(function(e) {
    $('.overlay').hide();

    e.preventDefault();
  });

  // Menu Scroll
  $('.menu a').click(function(event) {
    $('.menu a').removeClass('active');
    $(this).addClass('active');
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top }, 2000);
    event.preventDefault();
  });

  // Program Price select
  /*
  var $pricebox = $('.price div');

  $pricebox.click(function(event) {
    $pricebox.removeClass('active');
    $(this).addClass('active');

    $('.registration input[name="program"]').val($(this).find('h4').text() + ' ' + $(this).find('.amount').text());

  });
*/

// price1, 2, 3
  var $pricebox1 = $('#price1');
  var $pricebox2 = $('#price2');
  var $pricebox3 = $('#price3');
  var $program1 = $('input:hidden[name=program1]');
  var $program2 = $('input:hidden[name=program2]');
  var $program3 = $('input:hidden[name=program3]');


  $pricebox1.click(function(event) {
     // alert($program1.val());
    if($program1.val()=='Y')
    {
      $pricebox1.removeClass('active');
      $pricebox1.refrsh();
      $program1.val('N');
    }
    else
    {
      $pricebox1.addClass('active');
      $program1.val('Y');
    }

    var str_program = '';
    str_program += ($program1.val()=='Y') ? 'Day1 ' : '';
    str_program += ($program2.val()=='Y') ? 'Day2 ' : '';
    str_program += ($program3.val()=='Y') ? 'Day3 ' : '';
    $('.registration input[name="AttendDate"]').val(str_program);
  });


  $pricebox2.click(function(event) {
    if($program2.val()=='Y')
    {
      $pricebox2.removeClass('active');
      $program2.val('N');
    }
    else
    {
      $pricebox2.addClass('active');
      $program2.val('Y');
    }

    var str_program = '';
    str_program += ($program1.val()=='Y') ? 'Day1 ' : '';
    str_program += ($program2.val()=='Y') ? 'Day2 ' : '';
    str_program += ($program3.val()=='Y') ? 'Day3 ' : '';
    $('.registration input[name="AttendDate"]').val(str_program);
  });


  $pricebox3.click(function(event) {
     // alert($program1.val());
    if($program3.val()=='Y')
    {
      $pricebox3.removeClass('active');
      $program3.val('N');
    }
    else
    {
      $pricebox3.addClass('active');
      $program3.val('Y');
    }

    var str_program = '';
    str_program += ($program1.val()=='Y') ? 'Day1 ' : '';
    str_program += ($program2.val()=='Y') ? 'Day2 ' : '';
    str_program += ($program3.val()=='Y') ? 'Day3 ' : '';
    $('.registration input[name="AttendDate"]').val(str_program);
  });




  // Register Scroll
  $('.register-now a').click(function(event) {
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top }, 3000);
    event.preventDefault();
  });

  // Back to Top
  $('a[href=#top]').click(function(event) {
    $("html,body").animate({ scrollTop: 0 }, 2000);
    event.preventDefault();
  });

  // Parallax effect
  //$('.header').parallax("50%", 0.2);

  // Schedule
  $('.event-info p:not(.speaker)').hide();
  $('.event.extend span').html('<i class="fa fa-angle-down"></i>');

  // Extend on click
  $('.event.extend span').click(function(e) {

    var $span = $(this);
    var $event = $span.parent().parent();

    if ($span.html() == '<i class="fa fa-angle-up"></i>') {

      $span.html('<i class="fa fa-angle-down"></i>');
    } else {

      $span.html('<i class="fa fa-angle-up"></i>');
    };

    $event.find('.event-info p:not(.speaker)').toggle();

  });

  // FlexSlider
  $('.testimonials').flexslider({
    animation: 'slide',
    selector: '.slides blockquote',
    controlNav: false,
    directionNav: true,
    slideshowSpeed: 3600,
    animationSpeed: 1200,
    prevText: '<i class="fa fa-chevron-left"></i>',
    nextText: '<i class="fa fa-chevron-right"></i>'
  });

  $('.sponsors .container .slides').flexslider({
    animation: 'slide',
    selector: 'ul li',
    controlNav: false,
    directionNav: true,
    itemWidth: 311,
    prevText: '<i class="fa fa-chevron-left"></i>',
    nextText: '<i class="fa fa-chevron-right"></i>'
  });

  // InView
  var $fadeInDown = $('.menu, .header h1, .header .subtitle, .topics h3, .topics div i, .speakers .single h3');
  var $fadeInLeft = $('.when, .where, .speakers h2, .speakers .featured h3, .schedule h2, .bullets h3, .registration h2, .registration .form, .sponsors h2, .location h2, .maps .images, .maps #map_canvas, .social h2');
  var $fadeInRight = $('.register-now, .speakers .subtitle, .schedule .subtitle, .registration .subtitle, .registration .price, .sponsors .subtitle, .location .subtitle, .location .address, .social .subtitle');

  $fadeInDown.css('opacity', 0);
  $fadeInLeft.css('opacity', 0);
  $fadeInRight.css('opacity', 0);

  // InView - fadeInDown
  $fadeInDown.one('inview', function(event, visible) {
    if (visible) { $(this).addClass('animated fadeInDown'); }
  });

  // InView - fadeInLeft
  $fadeInLeft.one('inview', function(event, visible) {
    if (visible) { $(this).addClass('animated fadeInLeft'); }
  });

  // InView - fadeInRight
  $fadeInRight.one('inview', function(event, visible) {
    if (visible) { $(this).addClass('animated fadeInRight'); }
  });

});