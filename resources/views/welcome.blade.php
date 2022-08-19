@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>top 10 produk paling banyak terjual</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id product</th>
                            <th>Nama Product</th>
                            <th>Total terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($pro as $p)
                                <tr>
                                    <td>{{ $p->id_product }}</td>
                                    <td>{{ $p->nama_product }}</td>
                                    <td>{{ $p->total }}</td>
                                </tr>
                            @endforeach
                    </tbody>

                </table>
                {{-- <td>{{$products}}</td> --}}
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>top 10 customer paling banyak pembelian</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Cusdtomer id</th>
                            <th>Nama Customer</th>
                            <th>Total Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($customor as $p)
                                <tr>
                                    <td>{{ $p->id_customor }}</td>
                                    <td>{{ $p->nama_customor }}</td>
                                    <td>{{ $p->total }}</td>
                                </tr>
                            @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>10 agent paling banyak mendapatkan customer</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($agent as $p)
                                <tr>
                                    <td>{{ $p->id_customor }}</td>
                                    <td>{{ $p->nama_customor }}</td>
                                    <td>{{ $p->total }}</td>
                                </tr>
                            @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div> 
@endsection

