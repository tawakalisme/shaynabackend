@extends('layouts.default');

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah Barang</strong>
    <small>{{ $item->product_name }}</small>
    <small>{{ $item->id }}</small>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('products.update', $item->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="product_name" class="form-control-label">Nama Barang</label>
                <input type="text" name="product_name" value="{{ old('product_name') ? old('product_name') : $item->product_name }}" class="form-control @error('product_name') is-invalid @enderror" />
            </div>
            @error('product_name')
            <div class="text-muted">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="type" class="form-control-label">Tipe</label>
                <input type="text" name="type" value="{{ old('type') ? old('type') : $item->type }}" class="form-control @error('type') is-invalid @enderror" />
            </div>
            @error('type')
            <div class="text-muted">{{ $message }}</div>
            @enderror
            
            <div class="form-group">
                <label for="description" class="form-control-label">Deskripsi</label>
                <textarea name="description" class="ckeditor form-control @error('description') in-invalid @enderror">{{ old('description') ? old('description') : $item->description }}</textarea>
            </div>
            @error('description')
            <div class="text-muted">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="price" class="form-control-label">Price</label>
                <input type="text" name="price" value="{{ old('price') ? old('price') : $item->price }}" class="form-control @error('price') is-invalid @enderror" />
            </div>
            @error('price')
            <div class="text-muted">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="quantity" class="form-control-label">Quantity</label>
                <input type="text" name="quantity" value="{{ old('quantity') ? old('quantity') : $item->quantity}}" class="form-control @error('quantity') is-invalid @enderror" />
            </div>
            @error('quantity')
            <div class="text-muted">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Ubah Barang
                </button>
            </div>
        </form>
    </div>
</div>
@endsection