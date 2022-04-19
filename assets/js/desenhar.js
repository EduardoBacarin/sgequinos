var base_url = $("#base_url").val();

var canvas = new fabric.Canvas('resenha');

var img = new Image();
img.onload = function() {
    var f_img = new fabric.Image(img);
    canvas.setBackgroundImage(f_img);
    canvas.renderAll();
};
img.src = base_url + 'assets/modelos/modelo_animal.png';

canvas.isDrawingMode = true;
canvas.freeDrawingBrush.width = 4;
canvas.freeDrawingBrush.color = "#000000";