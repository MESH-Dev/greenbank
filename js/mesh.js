jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

//Animates the gradient for the background
function newGradient() {
    var c1 = {
        r: Math.floor(Math.random()*255),
        g: Math.floor(Math.random()*255),
        b: Math.floor(Math.random()*255)
    };
    var c2 = {
        r: Math.floor(Math.random()*255),
        g: Math.floor(Math.random()*255),
        b: Math.floor(Math.random()*255)
    };
    var c3 = {
        r: Math.floor(Math.random()*255),
        g: Math.floor(Math.random()*255),
        b: Math.floor(Math.random()*255)
    };
    var c4 = {
        r: Math.floor(Math.random()*255),
        g: Math.floor(Math.random()*255),
        b: Math.floor(Math.random()*255)
    };
    var c5 = {
        r: Math.floor(Math.random()*255),
        g: Math.floor(Math.random()*255),
        b: Math.floor(Math.random()*255)
    };
    var c6 = {
        r: Math.floor(Math.random()*255),
        g: Math.floor(Math.random()*255),
        b: Math.floor(Math.random()*255)
    };
    var c7 = {
        r: Math.floor(Math.random()*255),
        g: Math.floor(Math.random()*255),
        b: Math.floor(Math.random()*255)
    };

    c1.rgb = 'rgba('+c1.r+','+c1.g+','+c1.b+',1)';
    c2.rgb = 'rgba('+c2.r+','+c2.g+','+c2.b+',1)';
    c3.rgb = 'rgba('+c3.r+','+c3.g+','+c3.b+',1)';
    c4.rgb = 'rgba('+c4.r+','+c4.g+','+c4.b+',1)';
    c5.rgb = 'rgba('+c5.r+','+c5.g+','+c5.b+',1)';
    c6.rgb = 'rgba('+c6.r+','+c6.g+','+c6.b+',1)';
    c7.rgb = 'rgba('+c7.r+','+c7.g+','+c7.b+',1)';
    return 'linear-gradient(to bottom, '+c1.rgb+'0%,'+c2.rgb+' 21%,'+c3.rgb+' 33%,'+c4.rgb+' 49%,'+c5.rgb+' 67%,'+c6.rgb+' 92%,'+c7.rgb+' 100%)';
}


//console.log(page_h);

//function gradient() {
$(document).load(function(){
  var page_h = $('#page').height();
  $('.bg').css({"height":page_h});
//}
});

//gradient();

$(window).resize(function(){
  var page_h = $(document).height();
  $('.bg').css({"height":page_h});
});

// setInterval(function(){
//   $('.bg').fadeOut('5000');
//   $('.bg.hidden').fadeIn('5000');
//   },5000);

function rollBg() {
    $('.bg.hidden').css('background', newGradient());
    $('.bg').toggleClass('hidden');

    // $('.hidden').animate({opacity:0},6000);
    // $('.bg').animate({opacity:1},4000);

    
}

$(document).ready(function() {
  //rollBg();
  setInterval(rollBg, 5000);
});

//*********************************************************

//Font gradients for the homepage
//uses /js/pxgradient-1.0.3.js

// $(".intro-text h2").pxgradient({ // any jQuery selector
//   step: 10, 
//   colors: ["#87e442","#a54be3"], // hex (#4fc05a or #333)
//   dir: "y" // direction. x or y
// });

$(".mobile-nav-trigger i").pxgradient({ // any jQuery selector
  step: 10, 
  colors: ["#87e442","#a54be3"], // hex (#4fc05a or #333)
  dir: "y" // direction. x or y
});

$("blockquote.gradient").pxgradient({ // any jQuery selector
  step: 10, 
  colors: ["#87e442","#a54be3"], // hex (#4fc05a or #333)
  dir: "y" // direction. x or y
});

$(window).resize(function(){
  $("blockquote.gradient").pxgradient({ // any jQuery selector
  step: 10, 
  colors: ["#87e442","#a54be3"], // hex (#4fc05a or #333)
  dir: "y" // direction. x or y
});
});


//var TextGradient = require('react-textgradient');

$(function(){
  
  $('.text-gradient').each(function(){
    
    var colorOne = $(this).attr('bottomColor');
    var colorTwoHex = $(this).attr('topColor');
    var colorTwoR = hexToRgb(colorTwoHex).r;
    var colorTwoG = hexToRgb(colorTwoHex).g;
    var colorTwoB = hexToRgb(colorTwoHex).b;
    var colorTwo = "rgba("+colorTwoR+", "+colorTwoG+", "+colorTwoB;
    var thisText = $(this).text();
    
    $(this).addClass('first-text').append('<span class="second-text">'+thisText+'</span><span class="third-text">'+thisText+'</span><span class="before-one">'+thisText+'</span><span class="after-one">'+thisText+'</span><span class="before-two">'+thisText+'</span><span class="after-two">'+thisText+'</span><span class="before-three">'+thisText+'</span><span class="after-three">'+thisText+'</span><span class="before-four">'+thisText+'</span><span class="after-four">'+thisText+'</span>');
    
    $(this).css({
      //margin: "30px auto",
      //fontSize: "45px",
      //display: "inline-block",
      //fontWeight: "bold",
      position: "relative",
      color: colorOne,
      cursor: "text"
    });
    
    $(this).find('span').css({
      position: "absolute",
      display: "block",
      top: 0,
      left: 0,
      overflow: "hidden",
      textShadow: "none",
      width: "100%",
      textShadow: "none",
      WebkitUserSelect: "none",  
      MozUserSelect: "none",    
      MsUserSelect: "none",      
      userSelect: "none"
    });
    
    $(this).find('.second-text').css({
      color: colorTwo+", 0.1)",
      height: "90%"
    });
    
    $(this).find('.third-text').css({
      color: colorTwo+", 0.2)",
      height: "80%"
    });
    
    $(this).find('.before-one').css({
      height: "70%",
      color: colorTwo+", 0.3)"
    });
    
    $(this).find('.after-one').css({
      height: "60%",
      color: colorTwo+", 0.4)"
    });
    
    $(this).find('.before-two').css({
      height: "50%",
      color: colorTwo+", 0.5)"
    });
    
    $(this).find('.after-two').css({
      height: "40%",
      color: colorTwo+", 0.6)"
    });
    
    $(this).find('.before-three').css({
      height: "30%",
      color: colorTwo+", 0.7)"
    });
    
    $(this).find('.after-three').css({
      height: "20%",
      color: colorTwo+", 0.8)"
    });
    
    $(this).find('.before-four').css({
      height: "10%",
      color: colorTwo+", 0.9)"
    });
    
    $(this).find('.after-four').css({
      height: "1%",
      color: colorTwo+", 1)"
    });
    
  });
  
  function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
  }
  
})

//*********************************************************

$(function() {
    $('.four-column.block').matchHeight(
      { byRow: true,
    property: 'height',
    target: null,
    remove: false }
      );
});

$(function() {
    $('.two-column.block').matchHeight(
      { byRow: false,
    property: 'height',
    target: null,
    remove: false }
      );
});

$(function() {
    $('.quoter .q-block').matchHeight(
      { byRow: false,
    property: 'height',
    target: null,
    remove: false }
      );
});

//Sidr

$('.mobile-nav-trigger').sidr({
      name: 'sidr-main',
      source: '.navigation',
      renaming: false,
      side: 'right'
      //displace: false
});

});

// var h = document.getElementById("main").offsetHeight;
//  document.getElementById("bg").style.height = h + "px";
