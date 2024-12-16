@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">

        <div class="card-body">
            <form action="{{ route('mobil.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="merek" class="form-label">Merek Mobil</label>
                    <input type="text" name="merek" id="merek" class="form-control" placeholder="Masukkan merek mobil"  required>
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" name="model" id="model" class="form-control" placeholder="Masukkan model mobil"  required>
                </div>
                <div class="mb-3">
                    <label for="tahun_pembelian" class="form-label">Tahun Pembelian</label>
                    <input type="text" name="tahun_pembelian" id="tahun_pembelian" class="form-control" placeholder="Masukkan tahun pembelian"  required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" placeholder="Masukkan harga mobil" required>
                </div>
                <div class="mb-3">
                    <label for="kelengkapan" class="form-label">Kelengkapan</label>
                    <textarea name="kelengkapan" id="kelengkapan" class="form-control" placeholder="Masukkan kelengkapan mobil"></textarea>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Mobil</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                
                <!-- Tombol Kembali -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('mobil.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- Include Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
