<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
    </script>
</head>
<body>
<ul>
    <li>{{$data['a_id']}}</li>
    <li>{{$data['a_title']}}</li>
    <li>{{$data['t_name']}}</li>
    <li>{{$data['click']}}</li>
    <li>{{$data['update_at']}}</li>
    <li class="big" ><button>点击变大</button></li>
    <li class="small"><button>点击变小</button></li>
</ul>
</body>
</html>
<script>
    var size=16;
    $(".big").click(function (){
        size+=5;
        var font=size+'px';
        $("li").css('font-size',font);
    })
</script>
