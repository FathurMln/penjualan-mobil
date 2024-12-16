<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Transaksi</title>
    <!-- Link ke Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ikon Font Awesome untuk tombol -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Formulir Transaksi</h2>

        <!-- Success/Error messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('customer.store') }}">
            @csrf
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Telepon" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>

                    <!-- Hidden mobil_id input -->
                    <input type="hidden" id="mobil_id" name="mobil_id" value="{{ $mobil_id }}" required>

                    <!-- Readonly mobil name input -->
                    <div class="mb-3">
                        <label for="merek" class="form-label">Merek dan model</label>
                        <input type="text" id="merek" class="form-control" placeholder="Pilih Mobil" value="{{ $merek }} - {{ $model }}" readonly>
                    </div>

                    <!-- Readonly harga input -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="{{ $harga }}" readonly>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Transaksi</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Gaya umum halaman */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; /* Warna latar belakang halaman */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px; /* Membatasi lebar maksimum form */
            margin: 40px auto; /* Memusatkan form secara horizontal dan vertikal */
            padding: 20px;
            background-color: #ffffff; /* Warna latar belakang form */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Memberikan bayangan */
            border-radius: 10px; /* Membuat sudut membulat */
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            color: #343a40; /* Warna judul */
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #495057; /* Warna label */
            font-weight: 600;
        }

        .form-control {
            height: 45px;
            padding: 10px;
            font-size: 14px;
            border-radius: 8px; /* Membuat sudut input membulat */
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff; /* Warna border saat input aktif */
            box-shadow: 0px 0px 4px rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff; /* Warna tombol */
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 8px; /* Membuat sudut tombol membulat */
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Warna tombol saat hover */
            transform: translateY(-3px); /* Animasi saat hover */
        }

        .btn-primary:active {
            background-color: #004085; /* Warna tombol saat diklik */
            transform: translateY(1px); /* Efek klik */
        }

        .alert {
            font-size: 14px;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda; /* Warna latar sukses */
            color: #155724; /* Warna teks sukses */
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da; /* Warna latar error */
            color: #721c24; /* Warna teks error */
            border: 1px solid #f5c6cb;
        }

        .btn-close {
            background-color: transparent;
            border: none;
            color: #6c757d;
            font-size: 20px;
            line-height: 1;
            padding: 0;
            margin: 0;
            cursor: pointer;
        }

        /* Gaya responsif */
        @media (max-width: 768px) {
            .container {
                margin: 20px auto;
                padding: 15px;
            }

            h2 {
                font-size: 20px;
            }

            .form-control {
                font-size: 13px;
            }

            .btn-primary {
                font-size: 14px;
            }
        }
    </style>
</body>
</html>
