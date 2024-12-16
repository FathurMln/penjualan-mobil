<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan mobil bekas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 10px 10px;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card img {
            border-radius: 15px 15px 0 0;
            object-fit: cover;
        }
        .card-title {
            font-size: 20px;
            font-weight: bold;
            color: #343a40;
            text-align: center;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 14px;
            color: #6c757d;
            text-align: center;
        }
        .badge {
            font-size: 12px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #28a745;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-secondary:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Penjualan mobil bekas</h1>
    </div>
    <section class="container py-5">
        <div class="row g-4">
            @forelse ($mobils as $mobil)
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <img src="{{ asset('upload/mobil/' . $mobil->foto) }}" alt="{{ $mobil->model }}" class="card-img-top" style="height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $mobil->merek }} - {{ $mobil->model }}</h5>
                            <div class="mb-3">
                                <span class="badge bg-danger">PLUS DRIVER</span>
                                <span class="badge bg-dark">TIDAK LEPAS KUNCI</span>
                            </div>
                            <p class="card-text">
                                <strong>Tahun pembelian:</strong> {{ $mobil->tahun_pembelian }}<br>
                                <strong>Harga:</strong> {{ $mobil->harga }}<br>
                                <strong>Kelengkapan:</strong> {{ $mobil->kelengkapan }}<br>
                                <strong>Status:</strong> {{ $mobil->ketersediaan }}
                            </p>
                            <div class="d-grid gap-2">
                                <a href="{{ route('customer.transaksi', ['mobil_id' => $mobil->id, 'merek' => $mobil->merek, 'model' => $mobil->model, 'harga' => $mobil->harga]) }}" class="btn btn-primary">
                                    Sewa Sekarang <i class="fas fa-shopping-cart ms-2"></i>
                                </a>
                                <a href="https://wa.me/6285340499916" class="btn btn-secondary">
                                    Hubungi Admin <i class="fas fa-phone ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Tidak ada mobil tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
