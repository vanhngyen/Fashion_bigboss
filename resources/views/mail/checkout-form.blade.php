<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>Bạn Vừa Nhận Được Đơn Hàng Từ Fashion BigBoss</p>
@foreach($cart as $c)
    {{$c->__get("product_name")}}
    {{$c->__get("price")}}
    {{$user->__get("name")}}
    {{$user->__get("email")}}
@endforeach
</body>
</html>
