<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Page</title>
    <style type="text/css">
        body{
            margin: 0px;
            padding: 0px;
        }
        canvas{
            background-color: palegreen;
        }
    </style>
</head>
<body>
<canvas width="1000" height="800" id="canvas"></canvas>

<img src="ccc.png" id="imagen" style="display: none;">

<script type="text/javascript">
    var canvas = document.getElementById('canvas'); 
    var ctx=canvas.getContext('2d');
    var color ='red';
    var fig='arc';

    //grandiante linear
    var grd = ctx.createLinearGradient(0,0,200,0);
    grd.addColorStop(0,"yellow");
    grd.addColorStop(0.5,"blue");
    grd.addColorStop(1,"red");

    ctx.fillStyle = grd;
    ctx.fillRect(10, 400, 200, 80);

    //grandiante circular
    grd = ctx.createRadialGradient(110,90,30, 100,100,70);
    grd.addColorStop(0,"yellow");
    grd.addColorStop(0.5,"blue");
    grd.addColorStop(1,"red");

    ctx.fillStyle = grd;
    ctx.fillRect(20, 20, 160, 160);


    //imagen
    var img = document.getElementById('imagen');
    ctx.drawImage(img,500,500,200,200);

    canvas.addEventListener('click',function(e){
        console.log(e);
        ctx.fillStyle=color;


        if(fig=='rec'){
            ctx.fillRect(e.offsetX-20,e.offsetY-20,40,40);
            ctx.strokeRect(e.offsetX-20,e.offsetY-20,40,40);
        }else{
            ctx.beginPath();
            ctx.arc(e.offsetX-20,e.offsetY-20, 30, 0, 2 * Math.PI);
            ctx.fill();
            ctx.stroke();
        }
    });
    

    canvas.addEventListener('mouseover',function(e){
        color=random_rgba();
    });
    canvas.addEventListener('mouseout',function(e){
        fig=(fig=='arc')?'rec':'arc';
    });

    function random_rgba() {
        var o = Math.round, r = Math.random, s = 255;
        return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
    }

</script>
</body>
</html>