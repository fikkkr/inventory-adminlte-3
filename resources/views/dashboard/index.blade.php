@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Inventaris</h1>
@stop

@section('content')
    {{-- BARIS 1: INFO BOXES / STATISTIK --}}
    <div class="row">
        <!-- Box Total Barang -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalBarang }}</h3>
                    <p>Total Item Barang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <a href="{{ route('barang.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Box Total Jenis Barang -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalJenis }}</h3>
                    <p>Jenis / Kategori Barang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>
                <a href="{{ route('jenis.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Box Total Stok Keseluruhan -->
        <div class="col-lg-4 col-12">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ number_format($totalStok) }}</h3>
                    <p>Total Stok Keseluruhan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-warehouse"></i>
                </div>
                <a href="{{ route('barang.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Box Total Barang Masuk -->
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalBarangMasuk }}</h3>
                    <p>Barang Masuk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box-in"></i>
                </div>
                <a href="{{ route('barangMasuk.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Box Total Barang Keluar -->
        <div class="col-lg-4 col-12">
            <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $totalBarangKeluar }}</h3>
                <p>Barang Keluar</p>
            </div>
            <div class="icon">
                <i class="fas fa-box-open"></i>
            </div>
            <a href="{{ route('barangKeluar.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    {{-- BARIS 2: TABEL RINGKASAN DATA TERBARU --}}
    <div class="row">
        <!-- Tabel Barang Terbaru -->
        <div class="col-lg-7">
            <div class="card card-outline card-primary">
                <div class="card-header border-transparent">
                    <h3 class="card-title"><i class="fas fa-box mr-1"></i> Barang Terbaru Dimasukkan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jenis</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($barangTerbaru as $barang)
                                    <tr>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>
                                            <span class="badge badge-info">
                                                {{ $barang->jenis_barang }}
                                            </span>
                                        </td>
                                        <td>{{ $barang->stok_barang }}</td>
                                        <td>Rp {{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Belum ada data barang</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <a href="{{ route('barang.index') }}" class="btn btn-sm btn-secondary float-right">Lihat Semua Barang</a>
                </div>
            </div>
        </div>

        <!-- Tabel Jenis Barang Terbaru -->
        <div class="col-lg-5">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-tags mr-1"></i> Kategori / Jenis Barang</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @forelse($jenisTerbaru as $jenis)
                            <li class="item">
                                <div class="product-info ml-2">
                                    <a href="{{ route('jenis.index') }}" class="product-title">
                                        {{ $jenis->jenis_barang ?? $jenis->nama_jenis ?? $jenis->nama }}
                                    </a>
                                    <span class="product-description">
                                        {{ $jenis->keterangan ?? $jenis->deskripsi ?? 'Kategori terdaftar' }}
                                    </span>
                                </div>
                            </li>
                        @empty
                            <li class="item text-center text-muted py-3">Belum ada jenis barang</li>
                        @endforelse
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('jenis.index') }}" class="uppercase">Kelola Semua Jenis</a>
                </div>
            </div>
        </div>
    </div>
@stop