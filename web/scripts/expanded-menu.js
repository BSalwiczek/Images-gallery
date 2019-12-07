$( document ).ready(function() {
  $("#expanded-link").click(function(){
    if($(".expand-menu").hasClass("show-menu"))
    {
      $(".expand-menu").removeClass("show-menu");
    }else{
      $(".expand-menu").addClass("show-menu");
    }
  })
})
