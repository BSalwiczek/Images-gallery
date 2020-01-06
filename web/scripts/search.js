$( document ).ready(function() {
  $("#search").keyup(function(){
    var val = $("#search").val();

    $.post("/wyszukaj",{search_text: val},function(data, status){
      if(status == 'success')
      {
        $(".images-gallery").empty();
        var data_json = JSON.parse(data);
        if(Object.keys(data_json).length === 0)
        {
          var item = "<div style='text-align:center'>Brak wyników</div>";
          $(".images-gallery").append(item);
        }
        else{
          for(var index in data_json)
          {
            if(data_json[index].private == true){
              var item = '<div class="image-gallery-container private"><img class="gallery-img" id="'+data_json[index]._id.$oid+'" name="'+data_json[index].url+'" src="storage/images/thumbnail/'+data_json[index].url+'"/><div class="image-description"><div><h3>'+data_json[index].title+'</h3><em>Autor: '+data_json[index].author+'</em></div></div>';
            }
            else{
              var item = '<div class="image-gallery-container"><img class="gallery-img" id="'+data_json[index]._id.$oid+'" name="'+data_json[index].url+'" src="storage/images/thumbnail/'+data_json[index].url+'"/><div class="image-description"><div><h3>'+data_json[index].title+'</h3><em>Autor: '+data_json[index].author+'</em></div></div>';
            }
            $(".images-gallery").append(item);
          }
        }
      }
    });
  })

});
