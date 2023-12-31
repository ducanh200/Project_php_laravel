@extends("layouts.layout")
@section("main")
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
                        <span>Contact us</span></p>
                    <h1 class="mb-0 bread">Invoice</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-8">

                <div class="card">
                    <div class="text-left logo p-2 px-5">
                        <img src="https://fbcd.co/images/products/75ff08c4edd77315ff923c0a8ac6c413_resize.png" width="150px" >
                        <h2 style="float: right;margin-top: 25px;margin-right: 200px;color: #28a745;font-weight: bold">HEALTHY FOODS</h2>
                    </div>

                    <div class="invoice p-5">

                        <h5>Your order @switch($order->status)
                                @case(0)<span class="text text-dark">Pending</span>@break
                                @case(1)<span class="text text-blue">Confirmed</span>@break
                                @case(2)<span class="text text-warning">Shipping</span>@break
                                @case(3)<span class="text text-warning">Shipped</span>@break
                                @case(4)<span class="text text-success">Completed</span>@break
                                @case(5)<span class="text text-warning">Cancel</span>@break
                            @endswitch!</h5>
                        <span class="font-weight-bold d-block mt-4">Hello, {{$order->firstname}} {{$order->lastname}}</span>
                        <span>You order has been confirmed and will be shipped in next two days!</span>

                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">

                            <table class="table table-borderless">

                                <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2">
                                            <span class="d-block text-muted">Order Date</span>
                                            <span>{{$order->created_at}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="py-2">
                                            <span class="d-block text-muted">Order ID</span>
                                            <span>{{$order->id}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="py-2">
                                            <span class="d-block text-muted">Payment method :{{$order->payment_method}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="py-2">
                                            <span class="d-block text-muted">Shipping Address</span>
                                            <span>{{$order->address}},{{$order->city}}</span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="product border-bottom table-responsive">
                            @foreach($order->products as $item)
                                <table class="table table-borderless" >
                                    <tbody>
                                    <tr>
                                        <td width="5%">
                                            <img src="{{$item->thumbnail}}" width="90">
                                        </td>
                                        <td >
                                            <span class="font-weight-bold">Name: {{$item->name}}</span>
                                            <div class="product-qty">
                                                <span class="d-block">Quantity: {{$item->pivot->buy_qty}}</span>
                                                <span>Discount: {{$item->discount}}%</span>
                                                <br>
                                                <span class="font-weight-bold">Price: <i style="text-decoration: line-through;color: #94969a">${{$item->price}}</i>  <b>${{$item->price-($item->price*$item->discount/100)}}</b></span>
                                            </div>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                                <div class="cart-total mb-3" style="height: auto">
                                    <h3>Cart Totals</h3>
                                    @if($order->total>100)
                                        <p class="d-flex">
                                            <span>Delivery</span>
                                            <span>$0.00</span>
                                        <hr>
                                        <p class="d-flex total-price">
                                            <span>Total</span>
                                            <span>${{$order->total}}</span>
                                        </p>
                                        <p class="d-flex total-price">
                                            <h5 style="text-align: center">
                                            @if($order->is_paid || $order->status==3)
                                                    <b style="color: #2ca02c"><span class="text-success">Paid</span></b>
                                                @else
                                                    <b style="color: #e50606"><span class="text-danger">unPaid</span></b>
                                                @endif
                                        </h5>
                                        </p>
                                    @else
                                        <p class="d-flex">
                                            <span>Delivery</span>
                                            <span>$5.00</span>
                                        </p>
                                        <hr>
                                        <p class="d-flex total-price">
                                            <span>Total</span>
                                            <span>${{$order->total}}</span>

                                        </p>
                                        <p class="d-flex total-price">
                                            <h5 style="text-align: center">
                                            @if($order->is_paid || $order->status==3)
                                                    <b style="color: #2ca02c"><span class="text-success">Paid</span></b>
                                                @else
                                                    <b style="color: #e50606"><span class="text-danger">unPaid</span></b>
                                                @endif
                                        </h5>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<style>
    /*@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');*/
    .card{border:none}
    .logo{background-color: #ffffff
    }
    .totals tr td{font-size: 13px}
    .footer{background-color: #eeeeeea8}
    .footer span{font-size: 12px}
    .product-qty span{font-size: 12px;color: #1c1111
    }
</style>
