@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block transparent">
    <div class="blured hard-blur"></div>
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="card-text center-message">{{ $message }}</strong>
</div>
@endif

<div class="alert justify-content-center">
    <div class="blured"></div>
    <div class="flex-row flex-center">
        <div class="card-text p4-lr"> 
            <select class="custom-select" id="shop-cat" onchange="categoryChange()">
                <option value="0">Wszystko</option>
            @foreach($cats as $cat)
                <option value="{{$cat}}">{{$cat->name}}</option>
            @endforeach
            </select>
        </div>
        
        <div class="card-text p4-lr">
            <button class="btn btn-primary" onclick="showCart()">Koszyk (<span id="cart-size">0</span>)</button>
        </div>
    </div>
</div>

<div id="shopping-cart"></div>

<div class="container">
    <div class="row justify-content-center">
        <div id="shop-products" class="col-md-8">
            @foreach($products as $product)
            <div class="card" name="{{$product['category']}}">
                <div class="blured"></div>
                <div class="card-header">
                    <div class="blured"></div>
                    <div class="flex-row">
                        <div class="card-text">{{$product['name']}}</div>
                        @if (Auth::user() != null && Auth::user()->isAdmin())
                        <form method="POST" class="card-text flex-bottom-right" action="{{route('adminDeleteProduct',$product['id'])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" onclick="deleteConfirm(event)" class="btn btn-danger" value="Usuń" />
                        </form>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="flex-row">
                        <div class="card-text">
                            <img src="{{URL::to('/')}}/images/{{$product['photo']}}" height="100" width="150" />
                        </div>
                        <div class="product-desc">
                            <div class="card-text">
                                {{$product['description']}}
                            </div>
                            <div class="bottom-price">
                                <button class="btn btn-success" onclick="addToCart(`{{$product['id']}}`, `{{$product['name']}}`, `{{$product['price']}}`)">{{$product['price']}} zł</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

@endsection