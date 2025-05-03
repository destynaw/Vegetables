@extends('layouts.main')

@section('content')
    <h1 class="text-center mb-4">Edit Sayuran</h1>
    <div class="container">
        <form action="{{ route('vegetables.update', $vegetable->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Sayuran -->
            <div class="form-group mb-3">
                <label for="name">Nama Sayuran</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $vegetable->name) }}" required>
            </div>

            <!-- Harga Sayuran -->
            <div class="form-group mb-3">
                <label for="price">Harga</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $vegetable->price) }}" required>
            </div>

            <!-- Stok Sayuran -->
            <div class="form-group mb-3">
                <label for="stock">Stok</label>
                <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $vegetable->stock) }}" required>
            </div>

            <!-- Deskripsi Sayuran -->
            <div class="form-group mb-3">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description" class="form-control">{{ old('description', $vegetable->description) }}</textarea>
            </div>

            <!-- Foto Sayuran -->
            <div class="form-group mb-3">
                <label for="photo">Foto Sayuran</label>
                <input type="file" id="photo" name="photo" class="form-control">
                @if ($vegetable->photo)
                    <img src="{{ url('photo/' . $vegetable->photo) }}" alt="Foto Sayuran" class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            <!-- Tombol Submit -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Sayuran</button>
            </div>
        </form>
    </div>
@endsection
