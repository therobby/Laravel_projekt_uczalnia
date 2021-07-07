@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="blured"></div>
                <div class="card-header">Twoje zamówienie:</div>

                <div class="card-body">
                    @foreach ($products as $product)
                        {{$product->product->name}} sztuk: {{$product->count}} <br />
                    @endforeach
                    <br />
                    <h1>PŁATNOŚĆ z API</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection