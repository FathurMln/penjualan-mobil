@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Data transaksi</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Merek dan model</th>
                    <th>Status</th>
                    <th>Harga</th>                
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $customer->nama }}</td>
            <td>{{ $customer->no_hp }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->merek }} - {{ $customer->model }}</td>
            <td>
                <span class="badge 
                @if($customer->mobil && $customer->mobil->ketersediaan == 'Tersedia') 
                    bg-success 
                @elseif($customer->mobil && $customer->mobil->ketersediaan == 'Sedang Digunakan') 
                    bg-warning 
                @else 
                    bg-secondary 
                @endif">
                    {{ $customer->mobil->ketersediaan ?? 'Tidak Diketahui' }}
                </span>
            </td>
            <td>{{ $customer->harga }}</td>
            <td>
                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $customer->id }}">Hapus</button>
            </td>
        </tr>
    @endforeach
</tbody>
        </table>
    </div>
</div>

<script>
    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var customerId = this.getAttribute('data-id');
            if (confirm('Apakah Anda yakin ingin menghapus reservasi ini?')) {
                fetch(`/customer/${customerId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();  // Reload halaman setelah berhasil dihapus
                    } else {
                        alert('Gagal menghapus data.');
                    }
                });
            }
        });
    });
</script>

@endsection
