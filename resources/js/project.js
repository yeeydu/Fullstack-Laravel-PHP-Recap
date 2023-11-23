$(document).ready(function() {

    $('.navDropdown').mouseenter(function() {
      $(this).addClass('show')
      $(this).children('.dropdown-menu-wide').addClass('show');
    });
  
    $('.navDropdown').mouseleave(function() {
      $(this).removeClass('show');
      $(this).children('.dropdown-menu-wide').removeClass('show');
    });
  });