$( document ).ready(function() {
    $(".my-img").click(function(data){
      var src = $(data.target).attr('src');
      $('#gallery').find('.image').remove();
      $('#gallery').css("visibility","visible");
      // $('#gallery').find('.arrows').css("opacity","1");
      $('#gallery').css("background-color","rgba(0,0,0,0.7)");
      $('#gallery').prepend("<img class=\"image\" src=\""+src+"\" />")
      if(window.innerWidth<window.innerHeight)
      {
        $('#gallery').find('.image').css("width","40vh");
        $('#gallery').find('.image').css("height","auto");
      }
    })

    $('#gallery').click(function(data){
      if($('#gallery').css("visibility") == "visible"){
        $('#gallery').css("background-color","rgba(0,0,0,0)");
        $('#gallery').find('.image').css("visibility","hidden");
        $('#gallery').css("visibility","hidden");
        // $('#gallery').find('.arrows').css("opacity","0");

      }

    })
});
