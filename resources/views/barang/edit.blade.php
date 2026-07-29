@extends('adminlte::page')
@section('title', 'Edit Barang')

@section('content_header')
    <h1 class="mb-0">Edit Barang</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-0">Form Edit Barang</h3>
        </div>

        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                    @error('nama_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_id">Jenis Barang</label>
                    <select name="jenis_id" id="jenis_id" class="form-control @error('jenis_id') is-invalid @enderror" required>
                        <option value="">Pilih Jenis Barang</option>
                        @foreach ($jenis as $item)
                            <option value="{{ $item->id }}" {{ old('jenis_id', $barang->jenis_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->jenis_barang ?? $item->nama_jenis }}
                            </option>
                        @endforeach
                    </select>
                    @error('jenis_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga_barang">Harga Barang</label>
                    <input type="number" name="harga_barang" id="harga_barang" class="form-control @error('harga_barang') is-invalid @enderror" value="{{ old('harga_barang', $barang->harga_barang) }}" required>
                    @error('harga_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stok_barang">Stok Barang</label>
                    <input type="number" name="stok_barang" id="stok_barang" class="form-control @error('stok_barang') is-invalid @enderror" value="{{ old('stok_barang', $barang->stok_barang) }}" required>
                    @error('stok_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@stop