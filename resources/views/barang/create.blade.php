@extends('adminlte::page')
@section('title', 'Tambah Barang')

@section('content_header')
    <h1 class="mb-0">Tambah Barang</h1> 
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-0">Form Tambah Barang</h3>
        </div>

        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}" required>
                    @error('nama_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_barang">Jenis Barang</label>
                    <select name="jenis_barang" id="jenis_barang" class="form-control @error('jenis_barang') is-invalid @enderror" required>
                        <option value="">Pilih Jenis Barang</option>
                        @foreach ($jenis_barang as $item)
                            <option value="{{ $item->id }}" {{ old('jenis_barang') == $item->id ? 'selected' : '' }}>{{ $item->jenis_barang }}</option>
                        @endforeach
                    </select>
                    @error('jenis_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga_barang">Harga Barang</label>
                    <input type="number" name="harga_barang" id="harga_barang" class="form-control @error('harga_barang') is-invalid @enderror" value="{{ old('harga_barang') }}" required>
                    @error('harga_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stok_barang">Stok Barang</label>
                    <input type="number" name="stok_barang" id="stok_barang" class="form-control @error('stok_barang') is-invalid @enderror" value="{{ old('stok_barang') }}" required>
                    @error('stok_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@stop