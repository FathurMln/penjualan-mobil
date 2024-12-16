@extends('layouts.base')

@section('content')
<br>    
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="text-secondary">Daftar Mobil</h4>
    <a href="{{ route('mobil.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-circle"></i> Tambah Mobil
    </a>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped" id="mobilTable">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Merek</th>
                    <th>Model</th>
                    <th>Tahun Pembelian</th>
                    <th>Harga</th>
                    <th>Ketersediaan</th>
                    <th>Kelengkapan</th>
                    <th>Foto</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse ($mobils as $mobil)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $mobil->merek }}</td>
                        <td>{{ $mobil->model }}</td>
                        <td>{{ $mobil->tahun_pembelian }}</td>
                        <td>{{ $mobil->harga }}</td>
                        <td>
                            @if($mobil->ketersediaan == 'Belum terjual')
                                <span class="badge bg-success">{{ $mobil->ketersediaan }}</span>
                            @else
                                <span class="badge bg-danger">{{ $mobil->ketersediaan }}</span>
                            @endif
                        </td>
                        <td>{{ $mobil->kelengkapan }}</td>
                        <td>
                            @if ($mobil->foto)
                                <img src="{{ asset('upload/mobil/' . $mobil->foto) }}" alt="Foto Mobil" class="img-fluid" style="max-width: 100px;">
                            @else
                                <span class="text-muted">Tidak ada foto</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Edit Button -->
                            <a href="{{ route('mobil.edit', $mobil->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit Mobil">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <!-- Delete Form -->
                            <form action="{{ route('mobil.destroy', $mobil->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mb-1" title="Hapus Mobil">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

<!-- Include Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Optional: Table Row Collapse Script (for details in rows) -->
<script>
    // Enable the table collapse feature for each row.
    document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(item => {
        item.addEventListener('click', function () {
            const target = document.getElementById(this.dataset.bsTarget);
            target.classList.toggle('show');
        });
    });
</script>
