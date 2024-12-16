@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('mobil.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Form Input untuk data mobil -->
                <div class="mb-3">
                    <label for="merek" class="form-label">Merek Mobil</label>
                    <input type="text" name="merek" id="merek" class="form-control" value="{{ $mobil->merek }}" required>
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" name="model" id="model" class="form-control" value="{{ $mobil->model }}" required>
                </div>

                <div class="mb-3">
                    <label for="tahun_pembelian" class="form-label">Tahun Pembelian</label>
                    <input type="text" name="tahun_pembelian" id="tahun_pembelian" class="form-control" value="{{ $mobil->tahun_pembelian }}" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" value="{{ $mobil->harga }}" required>
                </div>

                <div class="mb-3">
                    <label for="kelengkapan" class="form-label">Kelengkapan</label>
                    <textarea name="kelengkapan" id="kelengkapan" class="form-control" required>{{ $mobil->kelengkapan }}</textarea>
                </div>

                <!-- Foto mobil -->
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Mobil</label>

                    <!-- Pratinjau Foto yang Ada -->
                    @if ($mobil->foto)
                        <div class="mb-2">
                            <label>Foto Saat Ini:</label>
                            <!-- Menampilkan Foto Saat Ini -->
                            <img src="{{ asset('upload/mobil/' . $mobil->foto) }}" class="img-thumbnail" id="current-image" style="width: 150px;">
                        </div>
                    @endif

                    <!-- Input Foto Baru -->
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" onchange="previewImage(event)">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 

                <!-- Pratinjau Foto Baru -->
                <div class="mt-2">
                    <img id="preview-image" src="" alt="Pratinjau Foto" class="img-fluid" style="max-width: 200px; display: none;">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('mobil.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan pratinjau foto baru
    function previewImage(event) {
        const reader = new FileReader();
        const preview = document.getElementById('preview-image');
        const currentImage = document.getElementById('current-image');
        
        reader.onload = function() {
            preview.src = reader.result;
            preview.style.display = 'block'; // Menampilkan pratinjau foto baru
            currentImage.style.display = 'none'; // Menyembunyikan foto yang ada jika ada gambar baru
        };
        
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]); // Membaca gambar yang dipilih
        }
    }
</script>
@endsection
