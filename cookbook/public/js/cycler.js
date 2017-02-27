$(document).ready(function(){
	
  $("#img1").attr("src","img/fondo1.jpg");
  $("#img2").attr("src","img/fondo2.jpg");
  $("#img3").attr("src","img/fondo3.jpg");

  window.setInterval(function(){
    var $active = $('#cycler .active');
    var $next = ($active.next().length > 0) ? $active.next() : $('#cycler img:first');
      $next.css('z-index',2);//move the next image up the pile
      
      $active.fadeOut(1500,function(){//fade out the top image
        $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
        $next.css('z-index',3).addClass('active');//make the next image the top one
      });

    }, 5000);


});