(function($) {
$('#hoy-menunav').click(function(){

  $('#hoy-menu').show(function(){
    document.body.addEventListener('click', boxCloser, false);
  });

});

function boxCloser(e){
  if(e.target.id != 'hoy-menu'){
     document.body.removeEventListener('click', boxCloser, false);
     $('#hoy-menu').hide();
  }
}
})(jQuery);