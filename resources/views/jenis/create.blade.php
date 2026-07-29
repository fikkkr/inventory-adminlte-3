@extends('adminlte::page')

@section('title', 'Tambah Jenis Barang')

@section('content_header')
    <h1>Tambah Jenis Barang</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Jenis Barang</h3>
                </div>

                <form action="{{ route('jenis.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        {{-- Input Nama Jenis Barang --}}
                        <div class="form-group">
                            <label for="jenis_barang">Nama Jenis Barang</label>
                            <input type="text" 
                                name="jenis_barang" 
                                id="jenis_barang" 
                                class="form-control @error('jenis_barang') is-invalid @enderror" 
                                value="{{ old('jenis_barang') }}" 
                                placeholder="Contoh: Elektronik, Pakaian, Makanan" 
                                required>
                                
                            @error('jenis_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('jenis.index') }}" class="btn btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop