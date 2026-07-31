@extends('adminlte::page')

@section('title', 'Tambah Barang Masuk')

@section('content_header')
    <h1 class="mb-0">Tambah Barang Masuk</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-0">Form Tambah Barang Masuk</h3>
        </div>

        <form action="{{ route('barangMasuk.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="id_barang">Nama Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control @error('id_barang') is-invalid @enderror" required>
                        <option value="">Pilih Barang</option>
                        @foreach ($barangs as $item)
                            <option value="{{ $item->id }}" {{ old('id_barang') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jumlah_masuk">Jumlah Masuk</label>
                    <input type="number" name="jumlah_masuk" id="jumlah_masuk" class="form-control @error('jumlah_masuk') is-invalid @enderror" value="{{ old('jumlah_masuk') }}" required>
                    @error('jumlah_masuk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{ old('tanggal_masuk') }}" required>
                    @error('tanggal_masuk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('barangMasuk.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@stop
