@extends('adminlte::page')
@section('title', 'Edit Barang Keluar')

@section('content_header')
    <h1 class="mb-0">Edit Barang Keluar</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-0">Form Edit Barang Keluar</h3>
        </div>

        <form action="{{ route('barangKeluar.update', $barangKeluar->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="id_barang">Nama Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control @error('id_barang') is-invalid @enderror" required>
                        <option value="">Pilih Barang</option>
                        @foreach ($barangs as $item)
                            <option value="{{ $item->id }}" {{ old('id_barang', $barangKeluar->id_barang) == $item->id ? 'selected' : '' }}>
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
                    <label for="jumlah_keluar">Jumlah Keluar</label>
                    <input type="number" name="jumlah_keluar" id="jumlah_keluar" class="form-control @error('jumlah_keluar') is-invalid @enderror" value="{{ old('jumlah_keluar', $barangKeluar->jumlah_keluar) }}" required>
                    @error('jumlah_keluar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_keluar">Tanggal Keluar</label>
                    <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control @error('tanggal_keluar') is-invalid @enderror" value="{{ old('tanggal_keluar', $barangKeluar->tanggal_keluar) }}" required>
                    @error('tanggal_keluar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('barangKeluar.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@stop
