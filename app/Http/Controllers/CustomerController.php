<?php 

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mobil;
use Illuminate\Http\Request;

class CustomerController extends Controller
{ 
    // Menampilkan semua customer dan mobil
    public function index()
    {
        $customers = Customer::all();  // Ambil semua data customer
        $mobils = Mobil::all();        // Ambil semua data mobil (kamar) yang tersedia
        return view('customer.index', compact('customers', 'mobils'));
    }

    public function create(Request $request)
    {
        $mobil_id = $request->query('mobil_id');
        $merek = $request->query('merek');
        $harga = $request->query('harga');
        $model = $request->query('model');
    
        return view('customer.transaksi', compact('mobil_id', 'merek', 'harga', 'model'));
    }
    
    // Menyimpan data customer baru
    public function store(Request $request)
{
    // Validasi data dari form
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'no_hp' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'mobil_id' => 'required|exists:mobils,id',
        'harga' => 'required|string',
    ]);

    // Cari mobil berdasarkan mobil_id
    $mobil = Mobil::find($validatedData['mobil_id']);
    
    if ($mobil && $mobil->ketersediaan == 'Sudah terjual') {
        return redirect()->back()->with('error', 'Mobil yang anda pilih sudah terjual.');
    }

    // Tambahkan merek dan model ke data yang akan disimpan
    $validatedData['merek'] = $mobil->merek; // Asumsikan tabel `mobils` memiliki kolom `merek`
    $validatedData['model'] = $mobil->model; // Asumsikan tabel `mobils` memiliki kolom `model`

    // Tambahkan user_id jika user login
    if (auth()->check()) {
        $validatedData['user_id'] = auth()->id();
    }

    // Simpan customer baru
    $customer = Customer::create($validatedData);

    // Ubah status ketersediaan mobil
    if ($mobil) {
        $mobil->ketersediaan = 'Sudah terjual';
        $mobil->save();
    }

    return redirect()->route('customer.daftar');
}

    // Menghapus data customer dan mengembalikan status mobil ke "Tersedia"
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $mobil = Mobil::find($customer->mobil_id);

        // Kembalikan ketersediaan mobil menjadi "Tersedia" jika mobil ditemukan
        if ($mobil) {
            $mobil->ketersediaan = 'Belum terjual';
            $mobil->save();
        }

        // Hapus data customer
        $customer->delete();
        
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
    }
}
