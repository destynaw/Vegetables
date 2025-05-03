@extends('layouts.main')

@section('content')
    <h1>Daftar Sayuran</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Sayuran</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vegetables as $vegetable)
                <tr>
                    <td>{{ $vegetable->name }}</td>
                    <td>Rp{{ number_format($vegetable->price, 0, ',', '.') }}</td>
                    <td>{{ $vegetable->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
