$( document ).ready(function() {
    $(document).on("click",".gallery-img",function(data){
      var src = $(data.target).attr('name');
      $('#gallery').find('.image').remove();
      $('#gallery').css("visibility","visible");
      // $('#gallery').find('.arrows').css("opacity","1");
      $('#gallery').css("background-color","rgba(0,0,0,0.7)");
      $('#gallery').prepend("<img class=\"image\" src=\"storage/images/watermarked/"+src+"\" />")
      if(window.innerWidth<window.innerHeight)
      {
        $('#gallery').find('.image').css("width","30vh");
        $('#gallery').find('.image').css("height","auto");
      }
    })

    $('#gallery').click(function(data){
      if($('#gallery').css("visibility") == "visible"){
        $('#gallery').css("background-color","rgba(0,0,0,0)");
        $('#gallery').find('.image').css("visibility","hidden");
        $('#gallery').css("visibility","hidden");

      }

    })
});
