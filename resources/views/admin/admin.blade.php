@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block transparent">
    <div class="blured hard-blur"></div>
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="card-text center-message">{{ $message }}</strong>
</div>
@elseif ($message = Session::get('fail'))
<div class="alert alert-success alert-block transparent">
    <div class="blured hard-blur"></div>
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="card-text center-message" style="color: red;">{{ $message }}</strong>
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="blured"></div>
                <div class="card-header">
                    <div class="blured"></div>
                    <div class="card-text">Witaj w panelu administracyjnym!</div>
                </div>
                <div class="card-body">
                    <div class="flex-row">
                        <div class="card-text">
                            <a href="{{ route('adminUsers') }}" class="btn btn-primary">Przeglądaj użytkowników</a>
                        </div>
                        <div class="separator"></div>
                        <div class="card-text">
                            <a href="{{ route('adminAddProductView') }}" class="btn btn-primary">Dodaj produkt</a>
                        </div>
                        <div class="separator"></div>
                        <div class="card-text">
                            <a href="{{ route('adminNotify') }}" class="btn btn-primary">Powiadom o promocji</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection