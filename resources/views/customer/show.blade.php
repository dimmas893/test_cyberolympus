@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <td>email = admin@cyberolympus.com</td>
                <br>
                <td>password = cyberadmin</td>
                <br>
                <td><a href="{{ route('home') }}" class="btn btn-primary"> kembali</a></td>
            </div>
        </div>
    </div>
@endsection