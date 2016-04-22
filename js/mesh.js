jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

  //Let's do something awesome!

  var _window = $(window).width();
  var grid_4h = _window / 4;

  function four_by_size(){
  $('.grid .four-column.block').css({'height':grid_4h});
	}

 four_by_size();	
  $(window).resize(four_by_size);

  var grid_2h = _window / 2;

  function two_by_size(){
  	$('.grid .two-column.block').css({'height':grid_2h});
	}
  

  two_by_size();
  $(window).resize(two_by_size);

});
