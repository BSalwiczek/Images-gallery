function uploadObservation(e)
{
  e.preventDefault();
  var luminosity = $("#luminosity").val();
  var date = $("#date").val();
  var time = $("#time").val();
  var name = $("#name").val();
  localStorage.setItem("name",name);
  //plot in canvas if star is currently displayed
  Date.prototype.getJulian = function() {
    return (this / 86400000) - (this.getTimezoneOffset() / 1440) + 2440587.5;
  }
  var datatime = new Date(date+" "+time);
  console.log(datatime);
  var julian = datatime.getJulian();
  console.log(julian);
  data.push({
    jd: julian,
    value: luminosity
  });
  plotData(data);
}
