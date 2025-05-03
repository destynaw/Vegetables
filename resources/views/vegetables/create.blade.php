@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="form-wrapper">
            <h1>Tambah Sayuran</h1>
            <form action="{{ route('vegetables.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Sayuran</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama sayuran">
                    @error('name') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" placeholder="Masukkan deskripsi sayuran">{{ old('description') }}</textarea>
                    @error('description') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" required placeholder="Masukkan harga sayuran">
                    @error('price') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stock">Stok</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}" required placeholder="Masukkan jumlah stok sayuran">
                    @error('stock') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo">Foto Sayuran</label>
                    <input type="file" id="photo" name="photo" required>
                    @error('photo') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="supplier_id">Pemasok</label>
                    <select name="supplier_id" id="supplier_id" required>
                        <option value="">Pilih Pemasok</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('supplier_id') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                <button type="submit">Tambah Sayuran</button>
            </form>
        </div>
    </div>
@endsection
