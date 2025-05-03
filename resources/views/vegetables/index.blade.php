@extends('layouts.main')

@section('content')
<h1 class="text-center mb-4">Daftar Sayuran</h1>
<div class="row row-cols-2 row-cols-sm-3 row-cols-lg-6 g-3">
    @foreach ($vegetables as $vegetable)
    <div class="col">
        <div class="veg-card">
            <!-- Gambar Sayuran -->
            <div class="veg-image-wrapper">
                @if ($vegetable->photo)
                <img src="{{ url('photo/' . $vegetable->photo) }}" alt="{{ $vegetable->name }}" class="veg-image">
                @else
                <img src="{{ asset('assets/no-image.png') }}" alt="No Image" class="veg-image">
                @endif
            </div>
            <!-- Nama Sayuran -->
            <div class="veg-name text-center mt-2">{{ $vegetable->name }}</div>
            <!-- Info Sayuran -->
            <div class="veg-info mt-2">
                <p>Rp{{ number_format($vegetable->price, 0, ',', '.') }}</p>
                <p>Stok: {{ $vegetable->stock }}</p>
                <p>{{ $vegetable->description }}</p>
                <p>Kategori: <strong>{{ $vegetable->category->name ?? '-' }}</strong></p>
                <p>Supplier: <strong>{{ $vegetable->supplier->name ?? '-' }}</strong></p>
            </div>

            <!-- Tombol Edit dan Hapus di bawah -->
            <div class="veg-actions text-center mt-2">
                <a href="{{ route('vegetables.edit', $vegetable->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('vegetables.destroy', $vegetable->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection