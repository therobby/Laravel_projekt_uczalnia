@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block transparent">
    <div class="blured hard-blur"></div>
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="card-text center-message">{{ $message }}</strong>
</div>
@endif


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="blured"></div>
                <div class="card-header">
                    <div class="blured"></div>
                    <div class="flex-row">
                        <div class="card-text">Użytkownicy</div>
                        <div class="flex-bottom-right"><a class="btn btn-primary card-text " href="{{route('admin')}}">Wróć</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="flex-row">
                        <div class="card-text">
                            <table>
                                <thead>
                                    <th>Nazwa</th>
                                    <th>Email</th>
                                    <th>Ban</th>
                                    <th>Data utworzenia</th>
                                    <th></th>
                                </thead>
                                @foreach ($users as $user)
                                <tbody>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <form method="post" action="{{route('adminBanUser')}}">
                                            @csrf
                                            <input type="hidden" value="{{$user->id}}" name="id"></input>
                                            @if($user->banned == 0)
                                            <input type="hidden" value="0" name="banned"></input>
                                            <input type="submit" class="btn btn-danger" value="Zbanuj"></input>
                                            @else
                                            <input type="hidden" value="1" name="banned"></input>
                                            <input type="submit" class="btn btn-success" value="Odbanuj"></input>
                                            @endif
                                        </form>
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <form method="post" action="{{route('delUser')}}">
                                            @csrf
                                            <input type="hidden" value="{{$user->id}}" name="id"></input>
                                            <input type="submit" class="btn btn-danger" value="Usuń"></input>
                                        </form>
                                    </td>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection