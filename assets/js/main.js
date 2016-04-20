$(document).ready(function(){

  $('#cajaNoticias').hide();
  $('.comentarios').hide();
  $('#cajaNoticias').fadeIn(500);
  $('.comentarios').slideDown(700);
  $('.parallax').parallax();
  $('select').material_select();

  $('.dropdown-button').dropdown({
    inDuration: 300,
    outDuration: 225,
    constrain_width: false, // Does not change width of dropdown to that of the activator
    hover: false, // Activate on hover
    gutter: 0, // Spacing from edge
    belowOrigin: false, // Displays dropdown below the button
    alignment: 'left' // Displays dropdown with edge aligned to the left of button
  }
);
$('.slider').slider({full_width: false});

$('#myTable2').DataTable();


});
