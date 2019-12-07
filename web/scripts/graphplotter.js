var canvas = document.getElementById('canvasGraph');

var context = canvas.getContext("2d");

context.canvas.width = document.documentElement.clientWidth * 0.7
var HEIGHT_TO_WIDTH_RATIO = 0.5;
context.canvas.height = context.canvas.width * HEIGHT_TO_WIDTH_RATIO;

var WIDTH = canvas.width;
var HEIGHT = canvas.height;

var GRAPH_TOP = 60;
var GRAPH_BOTTOM = HEIGHT-60;
var GRAPH_LEFT = 90;
var GRAPH_RIGHT = WIDTH-60;
var X_COUNT = 5;
var Y_COUNT = 5;
var X_INTERVAL = (GRAPH_RIGHT-GRAPH_LEFT)/X_COUNT;
var Y_INTERVAL = (GRAPH_BOTTOM-GRAPH_TOP)/Y_COUNT;

data = [
  {
    jd: "2458757.18",
    value: 7.31
  },
  {
    jd: "2458762.55",
    value: 7.31
  },
  {
    jd: "2458774.12",
    value: 7.32
  },
  {
    jd: "2458784.12",
    value: 8.32
  }
];


$( document ).ready(function() {
  $('#name').val(localStorage.getItem("name"));
  plotData(data);

})

function plotData(data)
{
  context.clearRect(0,0,WIDTH,HEIGHT);
  Array.prototype.max = function() {
  return Math.max.apply(null, this);
  };

  Array.prototype.min = function() {
    return Math.min.apply(null, this);
  };

  //Determine x-axis
  all_x = [];
  for(var i=0;i<data.length;i++)
  {
    all_x.push(parseFloat(data[i].jd));
  }
  var x_min = all_x.min();
  var x_max = all_x.max();

  //Determine y-axis
  all_y = [];
  for(var i=0;i<data.length;i++)
  {
    all_y.push(parseFloat(data[i].value));
  }
  var y_min = all_y.min();
  var y_max = all_y.max();

  context.font = "20px Arial";
  context.fillStyle = "#333";
  context.textAlign = "center";
  //Write X axis numbers
  for(var i=1;i<=X_COUNT;i++)
  {
    context.fillText(Math.round(100*(x_min+i*(x_max-x_min)/X_COUNT))/100 , (GRAPH_LEFT)+X_INTERVAL*i , GRAPH_BOTTOM+30);
    context.stroke();
  }
  //Write X lines
  for(var i=1;i<X_COUNT;i++)
  {
    context.strokeStyle = "#ddd";
    context.moveTo(GRAPH_LEFT+X_INTERVAL*i,GRAPH_TOP);
    context.lineTo(GRAPH_LEFT+X_INTERVAL*i,GRAPH_BOTTOM);
    context.stroke();
  }
  //Write title
  context.font = "bold 20px Arial";
  context.fillText("Data [JD]",(GRAPH_LEFT)+(GRAPH_RIGHT-GRAPH_LEFT)/2,GRAPH_BOTTOM+55);

  context.font = "20px Arial";
  context.fillStyle = "#333";
  context.textAlign = "center";

  //Write Y axis numbers
  var txtHeight = parseInt(context.font);
  for(var i=0;i<=Y_COUNT;i++)
  {
    context.fillText(Math.round(100*(y_min+i*(y_max-y_min)/X_COUNT))/100 , GRAPH_LEFT - 30 , GRAPH_TOP+ txtHeight/2+Y_INTERVAL*i);
    context.stroke();
  }
  //Write Y lines
  for(var i=1;i<Y_COUNT;i++)
  {
    context.strokeStyle = "#ddd";
    context.moveTo(GRAPH_LEFT,GRAPH_TOP+Y_INTERVAL*i);
    context.lineTo(GRAPH_RIGHT,GRAPH_TOP+Y_INTERVAL*i);
    context.stroke();
  }
  //Write title
  context.save();
  context.translate(WIDTH/2, HEIGHT/2);
  context.rotate(-Math.PI/2);
  context.textAlign = "center";
  context.font = "bold 20px Arial";
  context.fillText("Jasność [magnitudo]",0,-WIDTH/2+20);
  context.restore();

  //plot data
  for(var i=0;i<data.length;i++)
  {
    let jd = data[i].jd;
    let value = data[i].value;

    jd_interval = Math.round(10000*(x_max-x_min)/X_COUNT)/10000;
    let posX = GRAPH_LEFT + ((jd-x_min)*X_INTERVAL)/jd_interval;


    value_interval = Math.round(10000*(y_max-y_min)/Y_COUNT)/10000;
    let posY = GRAPH_TOP + ((value-y_min)*Y_INTERVAL)/value_interval;

    context.strokeStyle = "#546881";
    context.fillStyle = "#546881";
    context.beginPath();
    context.arc(posX, posY, 5, 0, 2 * Math.PI);
    context.fill();
    context.stroke();
  }

  //Draw title
  context.textAlign = "center";
  context.font = "bold 40px Arial";
  context.strokeStyle = "#555";
  context.fillStyle = "#555";
  context.fillText("R Serpentis",WIDTH/2,45);
  context.stroke();

  //Draw border
  context.strokeStyle = "#888";
  context.beginPath();
  context.moveTo(GRAPH_LEFT,GRAPH_BOTTOM);
  context.lineTo(GRAPH_RIGHT,GRAPH_BOTTOM);
  context.lineTo(GRAPH_RIGHT,GRAPH_TOP);
  context.lineTo(GRAPH_LEFT,GRAPH_TOP);
  context.lineTo(GRAPH_LEFT,GRAPH_BOTTOM);
  context.stroke();
}
