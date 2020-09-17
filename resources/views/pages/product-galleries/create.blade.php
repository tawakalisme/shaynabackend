@extends('layouts.default');

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Foto Barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data"> {{-- enctype untuk upload gambar--}}
            @csrf
            {{-- Product Name --}}
            <div class="form-group">
                <label for="product_name" class="form-control-label">Nama Barang</label>
                <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </div>
            @error('product_name')
            <div class="text-muted">{{ $message }}</div>
            @enderror
            {{-- Foto --}}
            <div class="form-group">
                <label for="photo" class="form-control-label">Foto Barang</label>
                <input type="file" name="photo" value="{{ old('photo') }}" class="form-control @error('photo') is-invalid @enderror" accept="image/*" />
            </div>
            @error('photo')
            <div class="text-muted">{{ $message }}</div>
            @enderror
            {{-- isDefault --}}
            <div class="form- ">
                <label for="is_default" class="form-control-label">Jadikan Default</label>
                <br>
                <div class="form-check">
                    <input type="radio" name="is_default" value="1" class="form-check-input @error('is_default') is-invalid @enderror" />
                    <label class="form-check-label">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="is_default" value="0" class="form-check-input @error('is_default') is-invalid @enderror" />
                    <label class="form-check-label">
                        Tidak
                    </label>
                </div>
            </div>
            @error('is_default')
            <div class="text-muted">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Tambah Foto Barang
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
