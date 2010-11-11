$(function() {
  section = $('.section');
  
  for (var i=0; i < section.length; i++) {
    $($(section)[i]);
    
    $('#curr_img ul').append('<li>'+(i+1)+'</li>');
  };
  
  
  $($('#curr_img ul li')[0]).addClass('current');
  $('#curr_img p').text('/'+section.length);
  
  $(".scrollable").scrollable({ circular: true }).navigator({
      navi: "#curr_img ul",
      naviItem: 'li',
      activeClass: 'current',
      history: true
    });
});