function submitOpinion(e){
    e.preventDefault();
    $('#opinion').empty();
    sessionStorage.setItem('opinionSet','1');
    $('#opinion').append('<p>Dziękujemy za wysłanie opinii! jeśli chcesz ją zmienić <a href="" onclick="unlockOpinion()">kliknij tutaj</a></p></p>')
}

function unlockOpinion(){
  sessionStorage.removeItem('opinionSet');
}

$( document ).ready(function() {
  if(sessionStorage.getItem('opinionSet'))
  {
    $('#opinion').empty();
      $('#opinion').append('<p>Dziękujemy za wysłanie opinii! jeśli chcesz ją zmienić <a href="" onclick="unlockOpinion()">kliknij tutaj</a></p>')
  }

})
