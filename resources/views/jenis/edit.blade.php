@extends('adminlte::page')

@section('title', 'Edit Jenis Barang')

@section('content_header')
    <h1 class="mb-0">Edit Jenis Barang</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title mb-0">Form Edit Jenis Barang</h3>
                </div>

                {{-- Sesuaikan route ke jenis.update dan pakai variabel $jenis --}}
                <form action="{{ route('jenis.update', $jenis->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="jenis_barang">Nama Jenis Barang</label>
                            <input type="text" 
                                   name="jenis_barang" 
                                   id="jenis_barang" 
                                   class="form-control @error('jenis_barang') is-invalid @enderror" 
                                   value="{{ old('jenis_barang', $jenis->jenis_barang) }}" 
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