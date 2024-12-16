<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::all();
        return view('mobil.index', compact('mobils'));
    }

    public function item()
    {
        $mobils = Mobil::all();
        return view('customer.daftar', compact('mobils'));
    }

    public function create()
    {
        return view('mobil.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'merek' => 'required|max:255',
        'model' => 'required|max:255',
        'tahun_pembelian' => 'required',
        'harga' => 'required',
        'ketersediaan' => 'nullable|in:Sudah terjual,Belum terjual',
        'kelengkapan' => 'nullable|',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10000',
    ]);

    // Ambil semua data kecuali foto
    $data = $request->except('foto');
    $data['ketersediaan'] = $data['ketersediaan'] ?? 'Belum terjual';

    // Upload foto jika tersedia
    if ($request->hasFile('foto')) {
        // Simpan file langsung di `public/upload/mobil`
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload/mobil'), $filename);

        // Simpan nama file ke database
        $data['foto'] = $filename;
    }

    // Simpan data ke database
    Mobil::create($data);

    // Redirect dengan pesan sukses
    return redirect()->route('mobil.index')->with('success', 'Mobil berhasil ditambahkan.');
}
public function edit($id)
{
    // Retrieve the 'Mobil' object based on the provided ID
    $mobil = Mobil::findOrFail($id);
    return view('mobil.edit', compact('mobil'));
}

public function update(Request $request, $id)
{
    // Validate input data
    $request->validate([
        'merek' => 'required|max:255',
        'model' => 'required|max:255',
        'tahun_pembelian' => 'required', // Ensure the year is 4 digits
        'harga' => 'required', // Ensure price is non-negative
        'ketersediaan' => 'nullable|in:Sudah Terjual,Belum terjual',
        'kelengkapan' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10000', // Max 10MB for image
    ]);

    try {
        $mobil = Mobil::findOrFail($id);
        $data = $request->all(); // Get all input data

        // If a new photo is uploaded, handle the file update
        if ($request->hasFile('foto')) {
            if ($mobil->foto && file_exists(public_path('upload/mobil/' . $mobil->foto))) {
                unlink(public_path('upload/mobil/' . $mobil->foto)); // Delete the old image
            }

            $filename = time() . '_' . $request->foto->getClientOriginalName();
            $request->foto->move(public_path('upload/mobil'), $filename);
            $data['foto'] = $filename; // Update the file name
        }

        // Update the mobil record in the database
        $mobil->update($data);

        return redirect()->route('mobil.index')->with('success', 'Mobil berhasil diperbarui.');
    } catch (\Exception $e) {
        return redirect()->route('mobil.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    public function destroy($id)
    {
        $mobil = Mobil::findOrFail($id);
        $mobil->delete();
        return redirect()->route('mobil.index')->with('success', 'Mobil berhasil dihapus.');
    }
}
