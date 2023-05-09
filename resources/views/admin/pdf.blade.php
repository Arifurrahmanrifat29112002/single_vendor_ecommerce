<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order pdf download</title>
</head>

<body>
   <h1>Order pdf download</h1>
   <h3>clint Name : {{ $order->name }}</h3>
   <h3>clint Email : {{ $order->email }}</h3>
   <h3>clint Phone : {{ $order->phone }}</h3>
   <h3>clint Address : {{ $order->address }}</h3>
   <h3>Payment Status : {{ $order->payment_status }}</h3>
   <h3>Delivery Status : {{ $order->delivery_status }}</h3>



   <h3>Product Name : {{ $order->product_title }}</h3>
   <h3>Product Quntaty : {{ $order->quentity }}</h3>
   <h3>price : {{ $order->price }} tk</h3>

   <h3>Delivery Charge :85</h3>
   <h3>total :{{ $order->price+85 }} </h3>
</body>
</html>
