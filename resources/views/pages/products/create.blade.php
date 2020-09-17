@extends('layouts.default');

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="product_name" class="form-control-label">Nama Barang</label>
                <input type="text" name="product_name" value="{{ old('product_name') }}" class="form-control @error('product_name') is-invalid @enderror" />
            </div>
            @error('product_name')
            <div class="text-muted">{{ $message }}</div>
            @enderror
            
            <div class="form-group">
                <label for="type" class="form-control-label">Tipe</label>
                <input type="text" name="type" value="{{ old('type') }}" class="form-control @error('type') is-invalid @enderror" />
            </div>
            @error('type')
            <div class="text-muted">{{ $message }}</div>
            @enderror
            
            <div class="form-group">
                <label for="description" class="form-control-label">Deskripsi</label>
                <textarea name="description" class="ckeditor form-control @error('description') in-invalid @enderror">{{ old('description') }}</textarea>
            </div>
            @error('description')
            <div class="text-muted">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="price" class="form-control-label">Price</label>
                <input type="text" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" />
            </div>
            @error('price')
            <div class="text-muted">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="quantity" class="form-control-label">Quantity</label>
                <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror" />
            </div>
            @error('quantity')
            <div class="text-muted">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Tambah Barang
                </button>
            </div>
        </form>
    </div>
</div>
@endsection